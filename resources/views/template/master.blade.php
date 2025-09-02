<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>
<body>
    @include('template.header')
    @yield('body')
    @include('template.footer')
    @include('template.main_js')
    @yield('jquery')
</body>


</html>