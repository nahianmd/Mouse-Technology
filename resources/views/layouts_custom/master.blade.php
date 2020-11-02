<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'RoomChaai') }} - @yield('title')</title>
    <link rel="icon" href="">
    @include('layouts_custom.header')
    @yield('head')
    @include('include.navbar')

</head>
<body>
    @yield('content')
    @include('layouts_custom.footer')
    @yield('foot')

</body>
</html>
