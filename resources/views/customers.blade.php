@extends('template-user.master')

@section('title', 'MVG - Dashboard')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>
  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_transaksi"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Sudah Dibayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="paid"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::get('userdata')->level == 1)
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Sudah Diverifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="unpaid"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @else
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Belum Dibayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="unpaid"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endif
  </div>
  <!-- Content Row -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Butuh Penanganan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Nama Event</th>
                      {{-- <th>Total Pax</th> --}}
                      @if (Session::get('userdata')->level == 1)
                        <th>Bukti Pembayaran</th>
                      @else
                        <th>Harga</th>
                      @endif
                      {{-- <th>Metode Pembayaran</th> --}}
                      <th>Venue</th>
                      <th>Waktu Mulai Acara</th>
                      {{-- <th>Waktu Selesai Acara</th> --}}
                      <th>Status</th>
                      <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
  </div>
  @if (Session::get('userdata')->level == 1)
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Transaksi Diverifikasi</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Nama Event</th>
                        {{-- <th>Total Pax</th> --}}
                        <th>Bukti Pembayaran</th>
                        {{-- <th>Metode Pembayaran</th> --}}
                        <th>Venue</th>
                        <th>Waktu Mulai Acara</th>
                        {{-- <th>Waktu Selesai Acara</th> --}}
                        <th>Status</th>
                      </tr>
                  </thead>
              </table>
          </div>
      </div>
    </div>
  @endif

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
                <form id="upload_bukti">
                  <div class="form-group">
                    <label for="nama_event">Nama Event</label>
                    @csrf
                    <input type="hidden" name="id_transaksi" id="id_transaksi">
                    <input type="text" class="form-control" id="nama_event" name="nama_event" readonly>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama_bank">Nama Bank Transfer</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" aria-describedby="nama_bank_help">
                    <small id="nama_bank_help" class="form-text text-muted">Ketik nama bank yang digunakan untuk transfer pembayaran, cth : Mandiri.</small>
                  </div>
                  <div class="form-group">
                    <label for="bukti_bayar">Upload Bukti</label>
                    <input type="file" class="form-control-file" id="bukti_bayar" name="bukti_bayar" accept=".jpg, .jpeg, .png" aria-describedby="bukti_bayar_help">
                    <small id="bukti_bayar_help" class="form-text text-muted">Upload file dengan format jpg / png , ukuran maksimal 2mb.</small>
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

</div>
@endsection
@section('jquery')
<script>
    function batalTransaksi(IdTransaksi,Strategi){
      Swal.fire({
        title: "Apakah anda yakin ingin membatalkan acara "+Strategi+" ?",
        showDenyButton: true,
        confirmButtonText: "Batalkan",
        denyButtonText: `Tidak`
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url : "{{route('batalTransaksi')}}",
            type : "GET",
            data : 'id='+ IdTransaksi,
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
                  title: 'Transaksi Berhasil Dihapus'
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

    function setujuiTransaksi(IdTransaksi,Strategi){
      Swal.fire({
        title: "Apakah anda yakin ingin menyetujui transaksi "+Strategi+" ?",
        showDenyButton: true,
        confirmButtonText: "Setujui",
        denyButtonText: `Tidak`
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url : "{{route('setujuitransaksi')}}",
            type : "GET",
            data : 'id='+ IdTransaksi,
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
                  title: res.message,
                })
              }
              $('#example').DataTable().ajax.reload();
              $('#example2').DataTable().ajax.reload();
              refreshWidget();
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
          })
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    }

    function downloadFile(NamaFile){
      window.location.href = '/downloadBuktiBayar?nama_file=' + NamaFile;
    }

    function refreshWidget(){
      $.ajax({
        url: "{{ route('refreshwidget') }}",
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': '{{csrf_token()}}'
        },
        processData: false,
        contentType: false,
        cache: false,
        success : function(res){
          $('#total_transaksi').html(res.data.total);
          $('#paid').html(res.data.paid);
          $('#unpaid').html(res.data.unpaid);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          
        }
      })
    }

    function kirimData() {
      let idTransaksi = document.getElementById('id_transaksi').value;
      let namaEvent = document.getElementById('nama_event').value;
      let harga = document.getElementById('harga').value;
      let namaBank = document.getElementById('nama_bank').value;
      let uploadedFile = document.getElementById('bukti_bayar').files[0];

      if (idTransaksi === '' || namaEvent === '' || harga === '' || namaBank === '' || !uploadedFile) {
          Swal.fire("Harap lengkapi semua kolom dan unggah bukti pembayaran.", "", "info");
          return;
      }

      let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
      if (!allowedExtensions.exec(uploadedFile.name)) {
          Swal.fire("Format file tidak didukung. Silakan pilih file gambar (jpg, jpeg, png, pdf).", "", "info");
          return;
      }

      var formData = new FormData();

      formData.append('id_transaksi', idTransaksi);
      formData.append('nama_event', namaEvent);
      formData.append('harga', harga);
      formData.append('nama_bank', namaBank);
      formData.append('bukti_bayar', uploadedFile);

      $.ajax({
        url: "{{ route('savebuktibayar') }}",
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
            refreshWidget();
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
            refreshWidget();
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

    $(document).ready(function() {
      refreshWidget();
      var level = '{{Session::get('userdata')->level}}';
      if (level == 0){
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
            // { "data": "JumlahPax"},
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
            { 
              data: 'Id',
              "render": function(data, type, row, meta) {
                  return `
                  <button type="button" class="btn btn-success" data-toggle="modal" data-id="`+data+`" data-target="#exampleModal"><i class="fas fa-file-import"></i></button>
                  <a class="btn btn-danger text-white" onclick="batalTransaksi(`+data+`,'`+row.NamaPaket+`')"><i class="fas fa-window-close"></i></a>
                  `
              },
            },
          ],
        });
      }
      
      if (level == 1){
        $('#example').DataTable({
          "processing": true,
          "serverSide": false,
          ajax: {
            url: "{{route('datatransaksi')}}",
            type: "GET",
            headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            dataType: "json",
            cache: false,
          },
          columns: [
            { "data": "NamaPaket" },
            { "data": "bukti_pembayaran"},
            // { "data": "MetodePembayaran" },
            { "data": "Venue" },
            { "data": "WaktuMulai" },
            // { "data": "WaktuSelesai" },
            { "data": "Status" },
            { 
              data: 'Id',
              "render": function(data, type, row, meta) {
                  return `
                  <a class="btn btn-info text-white" onclick="downloadFile('`+row.bukti_pembayaran+`')"><i class="fas fa-file-download"></i></a>
                  <a class="btn btn-success text-white" onclick="setujuiTransaksi(`+data+`,'`+row.NamaPaket+`')"><i class="fas fa-check"></i></a>
                  `
              },
            },
          ],
        });

        $('#example2').DataTable({
          "processing": true,
          "serverSide": false,
          ajax: {
            url: "{{route('datatransaksiverif')}}",
            type: "GET",
            headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            dataType: "json",
            cache: false,
          },
          columns: [
            { "data": "NamaPaket" },
            { "data": "bukti_pembayaran"},
            // { "data": "MetodePembayaran" },
            { "data": "Venue" },
            { "data": "WaktuMulai" },
            // { "data": "WaktuSelesai" },
            { "data": "Status" },
            
          ],
        });
      }

      $('#exampleModal').on('shown.bs.modal', function (e) {
        // $('#error_info').addClass('d-none');
        var id = $(e.relatedTarget).data('id');
        // alert(id);
        if(! id){	      
          $('#id_transaksi').val('');
          $('#nama_event').val('');
          $('#harga').val('');
        }else{
          $.ajax({
            type : 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            url : "{{route('getdetailtransaksi')}}",
            data :  'id='+ id,
            beforeSend: function(){
              $('#viewDataForm').hide();
              $('#viewDataLabel').html('Loading ...');
            },
            success : function(res){            
              $('#viewDataForm').show();
              $('#viewDataForm').removeClass('d-none');
              $('#viewDataLabel').html('Upload bukti pembayaran');
              // var obj = JSON.parse(res);
              if (res.length != 0){
                $('#id_transaksi').val(res.data[0].Id);
                $('#nama_event').val(res.data[0].NamaPaket);
                $('#harga').val(res.data[0].Harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
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
        $('#viewDataLabel').html('Loading ...');
      })

    });
</script>
@endsection