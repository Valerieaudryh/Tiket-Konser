@extends('template-user.master')

@section('title', 'MVG - Variasi')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Variasi</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Variasi</button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Variasi</h6>
        </div>
        <div class="card-body">
            <form>
                @if(isset($item) && $item)
                    <input type="hidden" name="id_produk" id="id_produk" value="{{ $item->Id }}">
                @endif
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Jumlah Pax</th>
                        <th>Detail</th>
                        <th>Harga</th>
                        <th>Aksi</th>
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
                            <label for="jumlah_pax">Jumlah Pax</label>
                            @csrf
                            <input type="hidden" name="id_variasi" id="id_variasi">
                            <input type="text" class="form-control" id="jumlah_pax" name="jumlah_pax">
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <input type="text" class="form-control" id="detail" name="detail">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
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
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data Variasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="viewDataForm">
                    <form id="tambah_produk">
                        <div class="form-group">
                            <label for="jumlah_pax_tambah">Jumlah Pax</label>
                            @csrf
                            <input type="text" class="form-control" id="jumlah_pax_tambah" name="jumlah_pax_tambah">
                        </div>
                        <div class="form-group">
                            <label for="detail_tambah">Detail</label>
                            <input type="text" class="form-control" id="detail_tambah" name="detail_tambah">
                        </div>
                        <div class="form-group">
                            <label for="harga_tambah">Harga</label>
                            <input type="text" class="form-control" id="harga_tambah" name="harga_tambah">
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
    var id_produk = $('#id_produk').val();

    function hapusVariasi(IdVariasi,Variasi){
        Swal.fire({
            title: "Apakah anda yakin ingin menghapus varian "+Variasi+" ?",
            showDenyButton: true,
            confirmButtonText: "Hapus",
            denyButtonText: `Tidak`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{route('hapusvariasi')}}",
                    type : "GET",
                    data : 'id='+ IdVariasi,
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
        let id = document.getElementById('id_variasi').value;
        let jumlah_pax = document.getElementById('jumlah_pax').value;
        let detail = document.getElementById('detail').value;
        let harga = document.getElementById('harga').value;

        if (id === '' || jumlah_pax === '' || detail === '' || harga === '') {
            Swal.fire("Harap lengkapi semua kolom.", "", "info");
            return;
        }

        var formData = new FormData();

        formData.append('id', id);
        formData.append('jumlah_pax', jumlah_pax);
        formData.append('detail', detail);
        formData.append('harga', harga);

        $.ajax({
            url: "{{ route('saveeditvariasi') }}",
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
        let jumlah_pax = document.getElementById('jumlah_pax_tambah').value;
        let detail = document.getElementById('detail_tambah').value;
        let harga = document.getElementById('harga_tambah').value;

        if (jumlah_pax === '' || detail === '' || harga === '') {
            Swal.fire("Harap lengkapi semua kolom.", "", "info");
            return;
        }

        var formData = new FormData();

        formData.append('id_item', id_produk);
        formData.append('jumlah_pax', jumlah_pax);
        formData.append('detail', detail);
        formData.append('harga', harga);

        $.ajax({
            url: "{{ route('savetambahvariasi') }}",
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
                url: "{{route('datavariasi')}}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                "data": function(d) {
                    d.id = id_produk;
                },
                dataType: "json",
                cache: false,
            },
            columns: [
                { "data": "Tag" },
                { "data": "Detail"},
                { 
                    "data": "Harga",
                    "render": function(data, type, row, meta) {
                        // Mengonversi harga ke format Rupiah
                        let formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data);
                        return formattedPrice;
                    },
                },
                { 
                    data: 'Id',
                    "render": function(data, type, row, meta) {
                        return `
                        <button type="button" class="btn btn-success" data-toggle="modal" data-id="`+data+`" data-target="#exampleModal"><i class="fas fa-pen"></i></button>
                        <a class="btn btn-danger text-white" onclick="hapusVariasi(`+data+`,'`+row.Tag+`')"><i class="fas fa-window-close"></i></a>
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
                $('#id_variasi').val('');
                $('#jumlah_pax').val('');
                $('#detail').val('');
                $('#harga').val('');
            }else{
                $.ajax({
                type : 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url : "{{route('getdetailvariasi')}}",
                data :  'id='+ id,
                beforeSend: function(){
                    $('#viewDataForm').hide();
                    $('#viewDataLabel').html('Loading ...');
                },
                success : function(res){            
                    $('#viewDataForm').show();
                    $('#viewDataForm').removeClass('d-none');
                    $('#viewDataLabel').html('Edit Data Variasi');
                    // var obj = JSON.parse(res);
                    if (res.length != 0){
                        $('#id_variasi').val(res.data[0].Id);
                        $('#jumlah_pax').val(res.data[0].Tag);
                        $('#detail').val(res.data[0].Detail);
                        $('#harga').val(res.data[0].Harga);
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