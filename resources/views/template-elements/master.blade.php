<!DOCTYPE html>
<html lang="en">

<head>
    @include('template-elements.head')
</head>
<body>
    @include('template-elements.header')
    <div class="container">
        @yield('body')
    </div>
    @include('template-elements.footer')
    @include('template-elements.main_js')
    @yield('jquery')
</body>


</html>