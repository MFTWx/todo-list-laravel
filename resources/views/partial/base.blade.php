<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- tailwind --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-custom2">

    @include('partial.header')

    @yield('content')

    @include('partial.footer')

    {{-- Custom Javascript --}}
    @yield('script')
</body>

</html>