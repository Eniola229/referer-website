<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfricTv Promoter Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: darkgreen;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: darkgreen;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Our Brand Promotion Program!</h1>
        </div>
        <div class="content">
            <p>Dear <strong>{{$user->name}}</strong>,</p>

            <p>We are excited to have you join our brand as a promoter! Your role is essential in spreading the word and helping us grow. Below are your details and your unique referral code:</p>

            <ul>
                <li><strong>Email:</strong> {{$user->email}}</li>
                <li><strong>Referral Code:</strong> {{$user->unique_id}}</li>
            </ul>

            <p>Share this referral code with your friends, family, and followers. For every successful sign-up using your referral code, you will earn N30.</p>

            <p>To get started, click the link below to log in and access your dashboard:</p>

            <p><a href="https://africicl.web.app/" class="btn">Login to Your Dashboard</a></p>

            <p>We can't wait to see you succeed!</p>

            <p>Best regards,<br>The AfricTv Team</p>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to reply to this email or contact us at africteam@bgmail.com.</p>
        </div>
    </div>
</body>
</html>
