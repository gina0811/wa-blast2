<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            width: 120px; /* Ukuran gambar diperbesar */
            height: 120px; /* Ukuran gambar diperbesar */
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e3e3e3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>User Profile</h1>
        <div class="row">
            <div class="col-md-4">
                <!-- Foto Profil -->
                <div class="text-center">
                    <img src="{{ asset('storage/profile/' . $user->profile_picture) }}" alt="Profile Picture" class="profile-picture">
                    <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3 mt-3">
                            <input type="file" name="profile_picture" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Photo</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Informasi Akun -->
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
