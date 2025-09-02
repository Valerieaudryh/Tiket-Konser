@extends('template.master')

@section('title', 'MVG - Team')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')

@section('body')
<div class="container-block container">
    <p class="text-blk team-head-text">
      Masterpiece Of Van Gogh
    </p>
    <div class="responsive-container-block teamcard-container">
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/maya.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Maya Nurul N
            </p>
            <p class="text-blk position">
              4521210019
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/valeri.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Valerie Audry H
            </p>
            <p class="text-blk position">
              4521210013
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/danar.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Danar Putera A
            </p>
            <p class="text-blk position">
              4521210028
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/enrico.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Enrico Juan C
            </p>
            <p class="text-blk position">
              4521210033
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/wildan.jpeg')}}" width="260px" height="260px">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Wildan Rasyidi A
            </p>
            <p class="text-blk position">
              4521210027
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/michael.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              Michael Keyva V
            </p>
            <p class="text-blk position">
              4521210008
            </p>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-mobile-12 wk-tab-4 wk-ipadp-4 team-card-container">
        <div class="team-card">
          <div class="team-img-wrapper">
            <img class="team-img" src="{{asset('assets/images/emir.jpeg')}}">
          </div>
          <div class="team-card-content">
            <p class="text-blk name">
              El Emir Di Haryanto
            </p>
            <p class="text-blk position">
              4521210031
            </p>
          </div>
        </div>
      </div>   
    </div>
  </div>
@endsection
@section('jquery')
@endsection