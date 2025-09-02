<!DOCTYPE html>
<html lang="en">

<head>
    @include('template-auth.head')
</head>
<body>
    @include('template-auth.header')
    @yield('body')
    @include('template-auth.footer')
    @include('template-auth.main_js')
    @yield('jquery')
</body>


</html>