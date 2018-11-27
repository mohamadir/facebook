<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>

</head>
<body>
    <h1>HOME</h1>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>