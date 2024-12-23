@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 text-primary"><span class="text-muted fw-light">Page/</span> Schedule Messages</h4>

        <!-- Tambah Schedule Button & Filter -->
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addScheduleModal">Tambah
                    Schedule</button>

                <!-- Filter Schedule -->
                <form id="filter-form" action="{{ route('schedule-message.index') }}" method="GET"
                    class="d-flex align-items-center">
                    <label for="filter_status" class="form-label me-2 mb-0 text-secondary">Filter:</label>
                    <select name="filter_status" id="filter_status" class="form-control form-control-sm"
                        onchange="this.form.submit()">
                        <option value="">-- All Status --</option>
                        <option value="pending" {{ request('filter_status') === 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="sent" {{ request('filter_status') === 'sent' ? 'selected' : '' }}>Sent</option>
                        <option value="failed" {{ request('filter_status') === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Schedule List -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered border-1 table-hover" style="border-color: #ddd; border-radius: 8px;">
                    <thead class="table-light text-center text-dark"
                        style="font-family: 'Arial', sans-serif; font-size: 14px; font-weight: bold; color: #333; background-color: #f0f8ff;">
                        <tr style="border-bottom: 1px solid #ddd;">
                            <th>No</th>
                            <th>Schedule Type</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Start In</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody style="font-family: 'Verdana', sans-serif; font-size: 12px;">
                        @php
                            use Carbon\Carbon;
                        @endphp
                        @forelse ($scheduledMessages as $message)
                            <tr style="border-bottom: 1px dashed #ddd;">
                                <td class="text-center" style="color: #000; font-weight: bold;">{{ $loop->iteration }}</td>
                                <td class="text-justify text-uppercase" style="color: #007bff;">
                                    {{ $message->schedule_type }}</td>
                                <td class="text-justify" style="color: #333;">{{ $message->number }}</td>
                                <td class="text-justify" style="color: #555; font-style: italic;">
                                    {{ $message->message ?? 'N/A' }}</td>
                                <td class="text-justify" style="color: #000; font-weight: bold;">
                                    {{ optional(Carbon::parse($message->start_in))->format('Y-m-d H:i:s') }}
                                </td>
                                <td class="text-center">
                                    @if ($message->status === 'pending')
                                        <span class="badge bg-warning text-dark" style="font-size: 12px;">Pending</span>
                                    @elseif ($message->status === 'sent')
                                        <span class="badge bg-success" style="font-size: 12px;">Sent</span>
                                    @else
                                        <span class="badge bg-danger" style="font-size: 12px;">Failed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger fw-bold"
                                    style="font-family: 'Courier New', monospace; font-size: 14px;">No scheduled messages
                                    found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal for Adding Schedule -->
        <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('schedule-message.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="addScheduleModalLabel">TAMBAH SCHEDULE MESSAGES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Type -->
                            {{-- <div class="mb-3">
                            <label for="schedule_type" class="form-label">Type Message</label>
                            <select name="schedule_type" id="schedule_type" class="form-control" required>
                                <option value="">-- Select Type --</option>
                                <option value="text">Text</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                <option value="document">Document</option>
                            </select>
                        </div> --}}

                            {{-- <!-- Input File (Dinamis) -->
                        <div class="mb-3" id="file_upload_section" style="display: none;">
                            <label class="form-label" for="file_upload">Upload File</label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload" accept="">
                        </div> --}}

                            <!-- Number -->
                            <div class="mb-3">
                                <label for="data_number" class="form-label">Number</label>
                                <select class="form-control" id="data_number" name="number" multiple="multiple">
                                    <option value="">-- Select Number --</option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->phone }}">{{ $contact->name }} -
                                            {{ $contact->phone }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Start In -->
                            <div class="mb-3">
                                <label for="start_in" class="form-label">Start In</label>
                                <input type="datetime-local" name="start_in" id="start_in" class="form-control" required>
                            </div>

                            <!-- Message -->
                            <div class="mb-3" id="message-group">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="3" placeholder="Enter your message" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2
                $('#data_number').select2({
                    placeholder: "Select or input numbers",
                    tags: true,
                    tokenSeparators: [',', ' ']
                });

                // Checkbox All Phone
                $('#all_phone').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#data_number').prop('disabled', true).val(null).trigger('change');
                    } else {
                        $('#data_number').prop('disabled', false);
                    }
                });

                // Default: Tampilkan pesan
                $('#input_message').show();
            });
            // Handle filter change event
            document.getElementById('filter_status').addEventListener('change', function() {
                const filterForm = document.getElementById('filter-form');
                filterForm.submit(); // Submit the form automatically when filter is changed
            });

            // Handle schedule type change
            document.getElementById('schedule_type').addEventListener('change', function() {
                const fileGroup = document.getElementById('file-upload-group');
                const messageGroup = document.getElementById('message-group');
                const fileInput = document.getElementById('file_upload');

                if (this.value === 'image') {
                    fileGroup.style.display = 'block';
                    messageGroup.style.display = 'none';
                    fileInput.setAttribute('accept', 'image/*');
                } else if (this.value === 'video') {
                    fileGroup.style.display = 'block';
                    messageGroup.style.display = 'none';
                    fileInput.setAttribute('accept', 'video/*');
                } else if (this.value === 'document') {
                    fileGroup.style.display = 'block';
                    messageGroup.style.display = 'none';
                    fileInput.setAttribute('accept', '.pdf,.doc,.docx,.txt');
                } else {
                    fileGroup.style.display = 'none';
                    messageGroup.style.display = 'block';
                    fileInput.removeAttribute('accept');
                }
            });
        </script>
    @endsection
