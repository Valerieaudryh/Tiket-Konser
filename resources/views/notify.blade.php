@extends('template-elements.master')

@section('title', 'MVG - Checkout')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
    }
}
</style>
<main>
    @foreach($status['items'] as $item)
        <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">{{ $item['status'] }}</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ $item['message'] }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <a href="{{url('/')}}" class="btn btn-primary btn-lg px-4 me-sm-3">Kembali Ke Menu Utama</a>
            </div>
        </div>
        </div>
    @endforeach
</main>
@endsection
@section('jquery')
@endsection