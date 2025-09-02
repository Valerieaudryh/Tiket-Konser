@extends('template-user.master')

@section('title', 'MVG - Edit Profil')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<div class="container-fluid">
    @if ($errors->any())
        <div class="card">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        @if(isset($customers))
            @foreach($customers as $customer)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <!-- Gambar Profil di sebelah kiri -->
                            <div class="text-center profile-image">
                                <p>Foto Profil Saat Ini</p>
                                @if(isset($customer->foto))
                                    <img src="{{ asset('storage/' . $customer->foto) }}" class="rounded-circle" alt="Foto Profil" width="150">
                                @else
                                    <img src="https://via.placeholder.com/250" class="rounded-circle" alt="Foto Profil" width="150">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center profile-image">
                                <p>Preview Foto</p>
                                <img src="https://via.placeholder.com/250" id="preview" class="rounded-circle" alt="Preview Foto" width="150">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                <!-- Informasi Profil di sebelah kanan -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Edit Profil</h2>
                            <hr>
                            <form action="{{ route('user.update', ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$customer->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option value="L" {{ $customer->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="P" {{ $customer->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto_profil">Foto Profil</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_profil" name="foto_profil" accept=".png" value="{{$customer->foto}}" onchange="previewImage(event)" aria-describedby="foto_hint">
                                        <label class="custom-file-label" for="foto_profil">Choose file...</label>
                                        <small id="foto_hint" class="form-text text-muted">Foto dengan format png.</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{$customer->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$customer->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}">
                                </div>
                                <hr>
                                <p>Manajemen Password</p>
                                <div class="form-group">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="password" class="form-control" id="password_lama" name="password_lama" aria-describedby="pw_help">
                                    <small id="pw_help" class="form-text text-muted">Hanya Di Isi Apabila Ingin Mengubah Password.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" class="form-control" id="password_baru" name="password_baru" aria-describedby="pw_help">
                                    <small id="pw_help" class="form-text text-muted">Hanya Di Isi Apabila Ingin Mengubah Password.</small>
                                </div>
                                <div class="form-group">
                                    <label for="verifikasi_password">Verifikasi Password</label>
                                    <input type="password" class="form-control" id="verifikasi_password" name="verifikasi_password" aria-describedby="pw_help">
                                    <small id="pw_help" class="form-text text-muted">Hanya Di Isi Apabila Ingin Mengubah Password.</small>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
@section('jquery')
<script>
    var success = @json(session('success'));
    var error = @json(session('error'));

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    if (success){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,              
        });
        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}',
        })
    }

    if (error){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,              
        });
        Toast.fire({
            icon: 'error',
            title: '{{session('error')}}',
        })
    }
</script>
@endsection