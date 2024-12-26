<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SISNAF SI PAYUNG</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fc;
        }
        .container {
            display: flex;
            width: 900px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }
        .illustration {
            flex: 1;
            background: #eef2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .illustration img {
            max-width: 100%;
            height: auto;
        }
        .login-form {
            flex: 1;
            padding: 40px;
        }
        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .login-form input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .login-form button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .text-center {
            text-align: center;
            margin-top: 10px;
        }
        .text-center a {
            color: #007bff;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .copyright {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
            background-color: #f8f9fc;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="/assets/img/illustrations/2.png" alt="Illustration">
        </div>
        <div class="login-form">
            <h2>Login - SISNAF SI PAYUNG</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
            <div class="text-center">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
    <div class="copyright">
        © 2024 Made With ❤️ by SI PAYUNG
    </div>
</body>
</html>
