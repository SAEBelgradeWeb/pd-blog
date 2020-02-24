<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>

<nav>
    NAVIGATION
</nav>

@yield('content')

<footer>
    <div class="container"> <p>Copyright {{env('APP_NAME')}} &copy; {{ date('Y') }} </p></div>
</footer>

</body>
</html>
