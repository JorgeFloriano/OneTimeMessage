<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('assets/css/boodstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">

                <h1 class="text-center my-5">{{config('app.name')}}</h1>

                @yield('content')

                <div class="text-center my-3">
                    <small>Created by Jorge Luis &copy; {{date('Y')}}</small>
                </div>

            </div>
        </div>
    </div>
</body>
</html>