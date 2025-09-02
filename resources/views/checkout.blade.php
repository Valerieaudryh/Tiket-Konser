@extends('template-elements.master')

@section('title', 'MVG - Checkout')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<main>
    @foreach ($item as $data)
        <div class="py-5 text-center">
            <h2>Checkout</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
            <form class="needs-validation" method="POST" action="{{url('/payment')}}">
                @foreach ($data->spesifikasi as $value)
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Item Anda</span>
                    </h4>
                    <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Nama Produk</h6>
                        <small class="text-muted">{{$data->Nama}}</small>
                        <input type="hidden" name="nama_produk" value="{{$data->Nama}}">
                        </div>
                        <span class="text-muted">Rp{{number_format($value->Harga,2,'.',',')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Jumlah Peserta / Pax</h6>
                        <small class="text-muted">{{$value->Tag}}</small>
                        <input type="hidden" name="jumlah_pax" value="{{$value->Tag}}">
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (RP)</span>
                        <strong>{{number_format($value->Harga,2,'.',',')}}</strong>
                        <input type="hidden" name="harga" value="{{$value->Harga}}">
                    </li>
                    </ul>
                @endforeach
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Rincian Pembelian</h4>
                    @foreach ($data->spesifikasi as $value)
                        <div class="row g-3">
                            <div class="col-12">
                            <label for="firstName" class="form-label">Nama Pembeli</label>
                            @csrf
                            <input type="text" class="form-control" id="firstName" placeholder="" value="{{Session::get('userdata')->nama}}" required readonly>
                            <input type="hidden" name="id_customer" id="id_customer" value="{{Session::get('userdata')->id}}">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                            </div>

                            <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{Session::get('userdata')->email}}" required readonly>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                            </div>

                            <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                            </div>

                            <div class="col-12">
                            <label for="address2" class="form-label">Waktu Acara </label>
                            <input type="date" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                            </div>

                            {{-- <div class="col-12">
                            <label for="address2" class="form-label">Waktu Selesai Acara </label>
                            <input type="date" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                            </div> --}}

                            <div class="col-12">
                            <label for="state" class="form-label">Venue</label>
                            <select class="form-select" id="venue" name="venue" required>
                                <option value="" disabled selected>Choose...</option>
                                @foreach ($venue as $data => $value)
                                    <option value="{{$value->Id}}">{{$value->Nama}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    @endforeach

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    @endforeach
</main>
@endsection
@section('jquery')
@endsection