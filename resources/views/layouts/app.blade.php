<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Thankyou-board</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/all.css') }}">
</head>
<body>
    <div class="container bg-white py-5">
        @yield('content')
    </div>

    <!-- google login -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>