<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Biobanque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .reset-link {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            margin-bottom: 30px;
            display: inline-block;
        }

        .reset-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 40px;
            color: #777;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Biobanque</h1>
    </header>
    <div class="container">
        <h2>Password Reset</h2>
        <p>Please click the link below to reset your password:</p>
        <a class="reset-link" href="{{ $resetLink }}">Reset Password</a>
        <p class="footer">If you didn't request this password reset, you can safely ignore this email.</p>
    </div>
    <footer>
        <p>&copy; 2024 Biobanque. All rights reserved.</p>
    </footer>
</body>
</html>
