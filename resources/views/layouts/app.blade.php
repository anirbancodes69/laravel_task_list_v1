<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List App</title>
    <style>
        #success-message {
            color: green;
        }

        #error-message {
            color: red;
        }
    </style>
</head>

<body>
    <h1>@yield('heading')</h1>
    @if (session()->has('success'))
    <div id="success-message">{{session('success')}}</div>
    @endif
    <div>@yield('content')</div>
</body>

</html>