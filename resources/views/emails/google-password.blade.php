<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Created</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        padding: 30px;
    }
    .header {
        text-align: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .header img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    h1 {
        font-size: 22px;
        color: #333;
        margin: 10px 0 0 0;
    }
    p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        margin: 10px 0;
    }
    .password-box {
        background-color: #f0f4ff;
        color: #1a73e8;
        font-weight: bold;
        padding: 15px;
        text-align: center;
        font-size: 20px;
        border-radius: 8px;
        margin: 20px 0;
    }
    .footer {
        text-align: center;
        font-size: 14px;
        color: #999;
        margin-top: 30px;
    }
    .btn {
        display: inline-block;
        padding: 12px 25px;
        background-color: #1a73e8;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        margin-top: 20px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <!-- Base64 image -->
        <img src="{{ asset('assets/img/fav3.png') }}" alt="Tawana Logo">
        <h1>Tawana Technology Exam Center</h1>
    </div>

    <p>Hello,</p>
    <p>Your account has been successfully created using <strong>Google login</strong>.</p>

    <p><strong>Your temporary password:</strong></p>
    <div class="password-box">{{ $password }}</div>

    <p>For your account's security, please log in and change your password immediately.</p>

    <a href="https://exam.tawanatechnology.com/forgot-password" class="btn">Change Password</a>

    <div class="footer">
        &mdash; Securely sent by the Tawana Technology Team
    </div>
</div>
</body>
</html>
