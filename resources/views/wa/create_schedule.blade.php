@extends('layouts.app')

@section('title', 'Create Schedule')

@section('content')
<div class="container">
    <h2>Tambah Schedule</h2>
    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Schedule Type</label>
            <input type="text" name="schedule_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Number</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label>Start In</label>
            <input type="datetime-local" name="start_in" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Caption</label>
            <input type="text" name="caption" class="form-control">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_blast" value="1" class="form-check-input">
            <label class="form-check-label">Is Blast?</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
