<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="{{ asset('/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/css/error.css') }}">
    @livewireStyles
</head>
<body>
    <h1>An error occurred during login</h1>
    <a href="{{route('home')}}" class="btn btn-outline-primary authbutton me-2">Back to Home Page</a>
</body>
</html>