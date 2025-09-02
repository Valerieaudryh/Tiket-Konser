@extends('template-user.master')

@section('title', 'MVG - Produk')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Produk</button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        <th>Atur Variasi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="viewDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDataLabel">Loading ...</h5>
                    <p class="text-danger d-none" id="error_info">Maaf terdapat kesalahan, silakan coba lagi.</p>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body d-none" id="viewDataForm">
                    <form id="update_produk">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            @csrf
                            <input type="hidden" name="id_produk" id="id_produk">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori">
                        </div>
                        <div class="form-group">
                            <label for="foto_sampel">Foto Sampel</label>
                            <input type="file" class="form-control-file" id="foto_sampel" name="foto_sampel" accept=".png" aria-describedby="foto_sampel_help">
                            <small id="foto_sampel_help" class="form-text text-muted">Foto yang digunakan pada detail produk.</small>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="button_simpan" onclick="kirimData();">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data Produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="viewDataForm">
                    <form id="tambah_produk">
                        <div class="form-group">
                            <label for="nama_produk_tambah">Nama Produk</label>
                            @csrf
                            <input type="text" class="form-control" id="nama_produk_tambah" name="nama_produk_tambah">
                        </div>
                        <div class="form-group">
                            <label for="kategori_tambah">Kategori</label>
                            <input type="text" class="form-control" id="kategori_tambah" name="kategori_tambah">
                        </div>
                        <div class="form-group">
                            <label for="foto_sampel_tambah">Foto Sampel</label>
                            <input type="file" class="form-control-file" id="foto_sampel_tambah" accept=".png" name="foto_sampel_tambah" aria-describedby="foto_sampel_tambah_help">
                            <small id="foto_sampel_tambah_help" class="form-text text-muted">Foto yang digunakan pada detail produk.</small>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_tambah">Keterangan</label>
                            <textarea name="keterangan_tambah" class="form-control" id="keterangan_tambah" cols="30" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="button_simpan_tambah" onclick="tambahData();">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('jquery')
<script>

    function hapusProduk(IdProduk,Produk){
        Swal.fire({
            title: "Apakah anda yakin ingin menghapus produk "+Produk+" ?",
            showDenyButton: true,
            confirmButtonText: "Hapus",
            denyButtonText: `Tidak`
        }).then((result) => {
            if (result.isConfirmed) {
                    $.ajax({
                        url : "{{route('hapusproduk')}}",
                        type : "GET",
                        data : 'id='+ IdProduk,
                        processData : false,
                        contentType : false,
                        cache : false,
                        dataType: "json",
                        success : function(res){
                        if (res.status != 200){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: true,              
                            });
                            Toast.fire({
                                icon: 'error',
                                title: res.message
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
                                title: res.message
                            })
                        }
                        $('#example').DataTable().ajax.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                        }
                    })
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
    }

    function kirimData() {
        let id = document.getElementById('id_produk').value;
        let nama = document.getElementById('nama_produk').value;
        let kategori = document.getElementById('kategori').value;
        let keterangan = document.getElementById('keterangan').value;
        let uploadedFile = document.getElementById('foto_sampel').files[0];

        if (id === '' || nama === '' || kategori === '' || keterangan === '') {
            Swal.fire("Harap lengkapi semua kolom dan unggah foto produk.", "", "info");
            return;
        }

        if (uploadedFile){
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|)$/i;
            if (!allowedExtensions.exec(uploadedFile.name)) {
                Swal.fire("Format file tidak didukung. Silakan pilih file gambar (jpg, jpeg, png, pdf).", "", "info");
                return;
            }
        }

        var formData = new FormData();

        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('keterangan', keterangan);
        if (uploadedFile){
            formData.append('foto_sampel', uploadedFile);
        }

        $.ajax({
            url: "{{ route('saveeditproduk') }}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $('#button_simpan').prop('disabled', true);
            },
            success : function(res){
                $('#button_simpan').prop('disabled', false);
                // console.log(res);
                if (res.status != '200'){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: true,              
                });
                Toast.fire({
                    icon: 'error',
                    title: res.message
                })
                $('#example').DataTable().ajax.reload();
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
                    title: res.message
                })
                $('#example').DataTable().ajax.reload();
                }
                $('.modal-backdrop').remove();
                $('#exampleModal').modal('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#button_simpan').prop('disabled', false);
            }
        })
    }

    function tambahData() {
        let nama = document.getElementById('nama_produk_tambah').value;
        let kategori = document.getElementById('kategori_tambah').value;
        let keterangan = document.getElementById('keterangan_tambah').value;
        let uploadedFile = document.getElementById('foto_sampel_tambah').files[0];

        if (nama === '' || kategori === '' || keterangan === '' || !uploadedFile) {
            Swal.fire("Harap lengkapi semua kolom dan unggah foto produk.", "", "info");
            return;
        }

        let allowedExtensions = /(\.jpg|\.jpeg|\.png|)$/i;
        if (!allowedExtensions.exec(uploadedFile.name)) {
            Swal.fire("Format file tidak didukung. Silakan pilih file gambar (jpg, jpeg, png, pdf).", "", "info");
            return;
        }
        

        var formData = new FormData();

        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('keterangan', keterangan);
        formData.append('foto_sampel', uploadedFile);

        $.ajax({
            url: "{{ route('savetambahproduk') }}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                $('#button_simpan_tambah').prop('disabled', true);
            },
            success : function(res){
                $('#button_simpan_tambah').prop('disabled', false);
                // console.log(res);
                if (res.status != '200'){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: true,              
                });
                Toast.fire({
                    icon: 'error',
                    title: res.message
                })
                $('#example').DataTable().ajax.reload();
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
                    title: res.message
                })
                $('#example').DataTable().ajax.reload();
                }
                $('.modal-backdrop').remove();
                $('#tambahModal').modal('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#button_simpan_tambah').prop('disabled', false);
            }
        })
    }

    $(document).ready(function() {

        $('#example').DataTable({
            "processing": true,
            "serverSide": false,
            ajax: {
                url: "{{route('dataproduk')}}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                dataType: "json",
                cache: false,
            },
            columns: [
                { "data": "Nama" },
                { "data": "Kategori"},
                { "data": "Keterangan" },
                { 
                    data: 'Id',
                    "render": function(data, type, row, meta) {
                        return `
                        <button type="button" class="btn btn-success" data-toggle="modal" data-id="`+data+`" data-target="#exampleModal"><i class="fas fa-pen"></i></button>
                        <a class="btn btn-danger text-white" onclick="hapusProduk(`+data+`,'`+row.Nama+`')"><i class="fas fa-window-close"></i></a>
                        `
                    },
                },
                { 
                    data: 'Slug',
                    "render": function(data, type, row, meta) {
                        return `
                            <a href="{{url('/atur/variasi/${data}')}}" target="_blank" class="btn btn-success"><i class="fas fa-file-import"></i></a>
                        `
                    },
                },
            ],
        });

        $('#exampleModal').on('shown.bs.modal', function (e) {
            // $('#error_info').addClass('d-none');
            var id = $(e.relatedTarget).data('id');
            // alert(id);
            if(! id){
                $('#id_produk').val('');
                $('#nama_produk').val('');
                $('#kategori').val('');
                $('#keterangan').val('');
            }else{
                $.ajax({
                type : 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url : "{{route('getdetailproduk')}}",
                data :  'id='+ id,
                beforeSend: function(){
                    $('#viewDataForm').hide();
                    $('#viewDataLabel').html('Loading ...');
                },
                success : function(res){            
                    $('#viewDataForm').show();
                    $('#viewDataForm').removeClass('d-none');
                    $('#viewDataLabel').html('Edit Data Produk');
                    // var obj = JSON.parse(res);
                    if (res.length != 0){
                        $('#id_produk').val(res.data[0].Id);
                        $('#nama_produk').val(res.data[0].Nama);
                        $('#kategori').val(res.data[0].Kategori);
                        $('#keterangan').val(res.data[0].Keterangan);
                    } else {
                        $('#error_info').removeClass('d-none');
                        $('#viewDataForm').hide();
                    }
                }
                });
            }
        });

        $('#exampleModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            $('#viewDataForm').addClass('d-none');
            $('#error_info').addClass('d-none');
            $('#viewDataLabel').html('Loading ...');
        })

        $('#tambahModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
        })
    });
</script>
@endsection