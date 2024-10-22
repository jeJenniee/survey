<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://naramizaru.github.io/awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Survey | @yield('title')</title>
</head>

<body style="background-color: white; margin: 0; padding: 0; max-width: 100%; overflow-x: hidden;"> <!-- margin dan padding dihilangkan -->
    
    @yield('content')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
</body>

<style>
    .rounded-background {
        background-color: #ffc108;
        color: white;
        padding: 3px 8px;
        border-radius: 5px;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
    }
</style>

</html>
