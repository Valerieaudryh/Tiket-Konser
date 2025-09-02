<!-- header section starts  -->

<header class="header">

    <a href="#home" class="logo"><span>e</span>vent Organizer</a>

    <nav class="navbar">
        <a href="{{url('/')}}#home">home</a>
        <a href="{{url('/')}}#service">service</a>
        <a href="{{url('/')}}#about">about</a>
        <a href="{{url('/')}}#gallery">gallery</a>
        <a href="{{url('/')}}#price">price</a>
        <a href="{{url('/')}}#review">review</a>
        <a href="{{url('/team')}}">our team</a>
        @if (Session::get('userdata') != null)
            @if(Session::get('userdata')->level == 1)
                <a href="{{url('/user')}}">Manajemen</a>
            @else
                <a href="{{url('/user')}}">Profile</a>
            @endif
        @else
            <a href="{{url('/login')}}">Login</a>
        @endif
    </nav>

    <div id="menu-bars" class="fas fa-bars"></div>

</header>

<!-- header section ends -->