<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h4>{{config('app.name')}}</h4>
    <p>The message recipient (<strong>{{$recipient_email}}</strong>) read your message.</p>
    <p>The message was readed at: <strong>{{$datetime_readed}}</strong></p>
</body>
</html>