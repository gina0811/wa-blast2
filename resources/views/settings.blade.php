<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page / </span> Settings</h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-item">
                    
                    <!-- Pengaturan -->

                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
                        <div class="card-body">
                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                              src="../assets/img/avatars/1.png"
                              alt="user-avatar"
                              class="d-block rounded"
                              height="100"
                              width="100"
                              id="uploadedAvatar"
                            />
                            {{-- <div class="button-wrapper">
                              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input
                                  type="file"
                                  id="upload"
                                  class="account-file-input"
                                  hidden
                                  accept="image/png, image/jpeg"
                                />
                              </label>
                              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                              </button>
              
                              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div> --}}
                          </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
              
                          @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                               {{$error}}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                          @endif
              
                          @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{Session::get('success')}}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          @endif
                          <form method="POST" action="{{route('post.settings')}}">
                            @csrf
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Whatsapp number connection</label>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text">ID (+62)</span>
                                  <input
                                    type="number"
                                    id="phoneNumber"
                                    name="number"
                                    class="form-control"
                                    value="{{str_replace('62', '', $setting_number->value)}}"
                                    placeholder="contoh: 896764464678"
                                  />
                                </div>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">URL server</label>
                                <input class="form-control" value="{{$setting_url->value}}" type="text" name="url" id="url" placeholder="contoh: http://localhost:3000" />
                              </div>
                              
                              
                            </div>
                            <div class="mt-2">
                              <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                          </form>
                        </div>
                        <!-- /Account -->
    </div>
</body>
</html>
