<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message From Portfolio!!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .letter {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            margin: 0 auto;
        }

        .letter p {
            margin: 10px 0;
        }

        .message {
            background-color: #f9f9f9;
            border-radius: 14px;
            padding: 20px;
            font-style: italic;
        }

        .salutation {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 20px;
            text-align: right;
            font-style: italic;
            font-family: cursive;
        }
    </style>
</head>
<body>
    <div class="letter">
        <p class="salutation">Message From Portfolio Website:</p>
        <div class="message">
            <p>{{ $mailData['message'] }}</p>
        </div>
        <div class="signature">
            <p>From,</p>
            <p>{{ $mailData['name'] }}</p>
            <p>{{ $mailData['email'] }}</p>
        </div>
    </div>
</body>
</html>
