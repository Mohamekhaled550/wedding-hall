<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - Hayat Halls</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Tajawal', sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #3a1c1c, #000);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem;
            border-radius: 16px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .login-container img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 1rem;
            color: #f5f5f5;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 0.5rem 0;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: #c9aa62;
            color: #000;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 1rem;
        }

        .login-container button:hover {
            background: #b89952;
        }

        .login-container .footer {
            margin-top: 1rem;
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="login-container">
<img alt="Hayat Logo" src="{{ asset('dashboard/assets/media/logos/logo-hayat-40px.png')}}" class="h-40px" />
        <h1>Welcome to HAYAT System Halls</h1>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" placeholder="E-mail " required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login </button>
        </form>
        <div class="footer">
            <a href="{{ route('reset-password') }}" style="color: #f5f5f5; text-decoration: underline;"> Forget Password? </a>
        </div>
    </div>
</body>
</html>
