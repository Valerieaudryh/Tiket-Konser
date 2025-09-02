@extends('template.master')

@section('title', 'MVG - Event Organizer')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<section class="home">
    <div class="content">
        <h3>Packages Detail</h3>
    </div>
</section>
@if(isset($item))
    @foreach ($item as $data)
        <section class="about">
            <div class="row">
                <div class="image">
                    <img src="{{ asset('storage/' . $data->Img) }}" alt="">
                </div>
            
                <div class="content">
                    <h3>{{$data->Nama}}</h3>
                    <p>{{$data->Keterangan}}</p>
                </div>
            
            </div>
            
            </section>
        <section class="price">

            <h1 class="heading"> Daftar <span>Harga</span> </h1>

            <div class="box-container">
                    @foreach ($data->spesifikasi as $value)
                    <div class="box">
                        <h3 class="title">{{$value->Detail}}</h3>
                        <h3 class="amount">{{shortNumber($value->Harga)}}</h3>
                        <ul>
                            @if ($data->Kategori == 'Pesta')
                                <li><i class="fas fa-check"></i> Venue</li>
                                <li><i class="fas fa-check"></i> Dekorasi</li>
                                <li><i class="fas fa-check"></i> Konsumsi</li>
                                <li><i class="fas fa-check"></i> Hiburan</li>
                                <li><i class="fas fa-check"></i> Dokumentasi</li>
                                <li><i class="fas fa-check"></i> MC</li>
                                <li><i class="fas fa-check"></i> Kartu Undangan</li>
                            @elseif($data->Kategori == 'Konser')
                                <li><i class="fas fa-check"></i> Venue</li>
                                <li><i class="fas fa-check"></i> Dekorasi</li>
                                <li><i class="fas fa-check"></i> Artis</li>
                                <li><i class="fas fa-check"></i> Dokumentasi</li>
                                <li><i class="fas fa-check"></i> MC</li>
                                <li><i class="fas fa-check"></i> Tiket</li>
                            @else
                                <li><i class="fas fa-check"></i> Venue</li>
                            @endif
                        </ul>
                        @if (Session::has('userdata'))
                            <a href="{{ url('/packages/checkout/' . $value->Id) }}" class="btn">Pilih Paket</a>
                        @else
                            <a href="{{ url('/login?checkout=' . $data->Slug.'&pax='.$value->Id) }}" class="btn">Pilih Paket</a>
                        @endif
                    </div>
                    @endforeach
            </div>
        </section>
    @endforeach
@endif
@endsection
@section('jquery')
@endsection