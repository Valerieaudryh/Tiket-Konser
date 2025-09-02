@extends('template-user.master')

@section('title', 'MVG - Transaksi Belum Dibayar')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Belum Dibayar</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Belum Dibayar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Nama Event</th>
                        <th>Total Pax</th>
                        <th>Harga</th>
                        {{-- <th>Metode Pembayaran</th> --}}
                        <th>Venue</th>
                        <th>Waktu Mulai Acara</th>
                        {{-- <th>Waktu Selesai Acara</th> --}}
                        <th>Status</th>
                        {{-- <th></th> --}}
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@section('jquery')
<script>

    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true,
            "serverSide": false,
            ajax: {
                url: "{{route('datatransaksi')}}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                "data": function(d) {
                    d.id_user = '{{Session::get('userdata')->id}}';
                },
                dataType: "json",
                cache: false,
            },
            columns: [
                { "data": "NamaPaket" },
                { "data": "JumlahPax"},
                { 
                    "data": "Harga",
                    "render": function(data, type, row, meta) {
                        // Mengonversi harga ke format Rupiah
                        let formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data);
                        return formattedPrice;
                    },
                },
                // { "data": "MetodePembayaran" },
                { "data": "Venue" },
                { "data": "WaktuMulai" },
                // { "data": "WaktuSelesai" },
                { "data": "Status" },
                // { 
                //     data: 'Id',
                //     "render": function(data, type, row, meta) {
                //         return `
                //         <button type="button" class="btn btn-success" data-toggle="modal" data-id="`+data+`" data-target="#exampleModal"><i class="fas fa-file-import"></i></button>
                //         <a class="btn btn-danger text-white" onclick="batalTransaksi(`+data+`,'`+row.NamaPaket+`')"><i class="fas fa-window-close"></i></a>
                //         `
                //     },
                // },
            ],
        });
    });
</script>
@endsection