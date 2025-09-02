@extends('template.master')

@section('title', 'MVG - Event Organizer')
@section('description', 'Meta Description - Deskripsi setiap view dalam website')
@section('body')
{{-- Start Home --}}
<!-- home section starts  -->
<section class="home" id="home">
    <div class="content">
        <h3>its time to celebrate! the best <span> event organizers </span></h3>
        <a href="#contact" class="btn">contact us</a>
    </div>

    <div class="swiper-container home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-1.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-2.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-3.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-4.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-5.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('assets/images/slide-6.jpg')}}" alt=""></div>
        </div>
    </div>

</section>

<!-- home section ends -->

<!-- service section starts  -->

<section class="service" id="service">

    <h1 class="heading"> our <span>services</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-map-marker-alt"></i>
            <h3>venue selection</h3>
            <p>Beragam pilihan venue yang bekerjasama dengan kita.</p>
        </div>

        <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>invitation card</h3>
            <p>Kartu undangan yang sudah termasuk dalam pembelian.</p>
        </div>

        <div class="box">
            <i class="fas fa-music"></i>
            <h3>entertainment</h3>
            <p>Hiburan terbaik yang menemani acara anda.</p>
        </div>

        <div class="box">
            <i class="fas fa-utensils"></i>
            <h3>food and drinks</h3>
            <p>Konsumsi yang exclusive untuk menemani acara anda.</p>
        </div>

        <div class="box">
            <i class="fas fa-photo-video"></i>
            <h3>photos and videos</h3>
            <p>Dokumentasi untuk kenang kenangan acara terbaik anda.</p>
        </div>

        <div class="box">
            <i class="fas fa-paint-brush"></i>
            <h3>makeup artist</h3>
            <p>Tim makeup terbaik untuk memastikan anda tampil sempurna.</p>
        </div>
    </div>

</section>

<!-- service section ends -->

<!-- about section starts  -->

<section class="about" id="about">

<h1 class="heading"><span>about</span> us </h1>

<div class="row">

    <div class="image">
        <img src="{{asset('assets/images/about-img.jpg')}}" alt="">
    </div>

    <div class="content">
        <h3>we will give a very special celebration for you</h3>
        <p>Rasakan sensasi pesta dan acara luar biasa yang pernah anda alami.</p>
        <p>Dengan konsep luar biasa yang akan memuaskan anda.</p>
        <a href="#price" class="btn">daftar harga</a>
    </div>

</div>

</section>

<!-- about section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading">The Best <span>Event 2023</span></h1>

    <div class="box-container">

        <div class="box">
            <img src="{{asset('assets/images/g-1.jpg')}}" alt="">
            <h3 class="title">DJ Alan Walker</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-2.jpg')}}" alt="">
            <h3 class="title">Jess No Limit Wedding</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-3.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-4.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-5.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-6.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-7.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-8.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('assets/images/g-9.jpg')}}" alt="">
            <h3 class="title">photos and events</h3>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- price section starts  -->

<section class="price" id="price">

    <h1 class="heading"> our <span>packages</span> </h1>

    <div class="box-container">
        @foreach ($item as $data)
            <div class="box">
                <h3 class="title">{{$data->Nama}}</h3>
                @if(isset($data->spesifikasi[0]))
                    <h3 class="amount"><p style="font-style: italic; color: #999; font-size: 15px;">Mulai Dari </p>{{ shortNumber($data->spesifikasi[0]->Harga)}}</h3>
                @else
                    <h3 class="amount"><p style="font-style: italic; color: #999; font-size: 15px;">Harga Belum Tersedia</h3>
                @endif
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
                @if(isset($data->spesifikasi[0]))
                    <a href="/packages/detail/{{$data->Slug}}" class="btn">Detail</a>
                @else
                    <a href="#!" class="btn">Belum Tersedia</a>
                @endif
            </div>
        @endforeach

    </div>


</section>

<!-- price section ends -->

<!-- review section starts  -->

<section class="reivew" id="review"> 
    
    <h1 class="heading">client's <span>review</span></h1>

    <div class="review-slider swiper-container">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="{{asset('assets/images/yessica.jpeg')}}" alt="">
                    <div class="user-info">
                        <h3>Yessica Tamara</h3>
                        <span>happy clients</span>
                    </div>
                </div>
                <p>Very great service, good job.</p>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="{{asset('assets/images/van persie.png')}}" alt="">
                    <div class="user-info">
                        <h3>Robin Van Persie</h3>
                        <span>happy clients</span>
                    </div>
                </div>
                <p>I'm never seen the greatest event than order in here.</p>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="{{asset('assets/images/gracia harlan.jpeg')}}" alt="">
                    <div class="user-info">
                        <h3>Gracia Harlan</h3>
                        <span>happy clients</span>
                    </div>
                </div>
                <p>Good job, keep a good work.</p>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="{{asset('assets/images/vangogh.jpeg')}}" alt="">
                    <div class="user-info">
                        <h3>Van Gogh</h3>
                        <span>Sad Client</span>
                    </div>
                </div>
                <p>Pengorderan tidak sesuai dengan kreativitas saya. Dan teralalu mengikuti perkembangan zaman anak muda sekarang.</p>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->

{{-- <section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <form action="#">
        <div class="inputBox">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
        </div>
        <div class="inputBox">
            <input type="number" placeholder="number">
            <input type="text" placeholder="subject">
        </div>
        <textarea name="" placeholder="your message" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" class="btn">
    </form>

</section> --}}

<!-- contact section ends -->
{{-- End Home --}}

@endsection
@section('jquery')
@endsection