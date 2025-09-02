@extends('template-user.master')

@section('title', 'MVG - Transaksi Belum Dibayar')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<div class="container-fluid">
    <div class="row">
        @if(isset($customers))
            @foreach($customers as $customer)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <!-- Gambar Profil di sebelah kiri -->
                            <div class="text-center profile-image">
                                <img src="{{ asset('storage/' . $customer->foto) }}" class="rounded-circle" alt="Foto Profil" width="250">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Informasi Profil di sebelah kanan -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Profil Pengguna</h2>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nama:</strong> {{ $customer->nama }}</p>
                                    <p><strong>Email:</strong> {{ $customer->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Telepon:</strong> {{ $customer->no_hp }}</p>
                                    <p><strong>Gender:</strong> {{ $customer->jenis_kelamin }}</p>
                                </div>
                                <div class="col-md-12">
                                    <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{url('/profile/edit')}}" class="btn btn-primary">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
@section('jquery')
@endsection