@extends('template-auth.master')

@section('title', 'MVG - Login')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
<div class="container" id="container">
    <div class="form-container sign-in">
        <form action="{{url('/login')}}" method="POST">
            <h1>Sign In</h1>
            <span>gunakan email dan password yang terdaftar</span>
            @csrf
            <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="password" placeholder="Password" name="password" id="password" required autocomplete="current-password">
            @error('password')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            {{-- <a href="#">Forget Your Password?</a> --}}
            <button type="submit">Login</button>
            <a href="{{url('/')}}">Back To Home</a>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Sudah punya akun?</h1>
                <p>Masukan data terdaftar untuk melakukan transaksi</p>
                <a href="{{url('/login')}}" class="newacon" style="color: white !important;" id="login">Login</a>
                <a href="{{url('/')}}" style="color: white">Back To Home</a>
                {{-- <button class="hidden" id="login">Login</button> --}}
            </div>
            <div class="toggle-panel toggle-right active">
                <h1>Belum memiliki akun?</h1>
                <p>Daftar sekarang untuk dapat melakukan transaksi</p>
                <a href="{{url('/register')}}" class="newacon" style="color: white !important;" id="register">Register</a>
                {{-- <button class="hidden" id="register">Daftar</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('jquery')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
<script>
    var message = @json(session('success'));
        if (message) {
            if (message.status != '200'){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,              
            });
            Toast.fire({
                icon: 'error',
                title: message.message
            })
            } else {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'success',
                title: message.message
            })
            }
        }
</script>
@endsection
