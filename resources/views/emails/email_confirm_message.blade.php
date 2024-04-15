<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h4>{{config('app.name')}}</h4>
    <p>Click on the link below to confirm sending the message</p>
    <p><a href="{{route('main_confirm', ['purl' => $purl_code])}}">Confirm message</a></p>
</body>
</html>