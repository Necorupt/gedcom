<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
    <div class="flex p-4">
        <a class="text-xl" href="{{route('index')}}">Main page</a>
    </div>
    @yield('content')
</body>
</html>
