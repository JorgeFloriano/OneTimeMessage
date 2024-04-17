<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h4>{{config('app.name')}}</h4>
    <p>Do you have a message to read in {{config('app.name')}}</p>
    <p>IMPORTANT: You will only be able to read the message once!</p>
    <p><a href="{{route('main_read', ['purl' => $purl_code])}}">Read message</a></p>
</body>
</html>