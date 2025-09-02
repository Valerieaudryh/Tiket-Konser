@extends('template-auth.master')

@section('title', 'MVG - Login')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<div class="container active" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="{{url('/register')}}">
            <h1>Create Account</h1>
            <span>gunakan email dan password</span>
            @csrf
            <input type="text" placeholder="Nama" name="nama" id="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="text" placeholder="Nomor HP" name="no_hp">
            @error('no_hp')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <select name="jenis_kelamin" id="jenis_kelamin" required aria-placeholder="Jenis Kelamin">
                <option value="" disabled selected>Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <textarea name="alamat" placeholder="Alamat" cols="1" rows="2"></textarea>
            @error('alamat')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="password" placeholder="Password (Minimal 8 Karakter)" name="password" id="password" required>
            @error('password')
                <span role="alert" style="color: red;">{{ $message }}</span>
            @enderror
            <button type="submit">Sign Up</button>
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
            <div class="toggle-panel toggle-right">
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
@endsection
