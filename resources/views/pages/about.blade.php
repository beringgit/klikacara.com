@extends('partials._base')

@section('content')
    <h1 class="text-center" id="b-0">About Us</h1>
    <p class="flow-text extra-padd text-center"><a class="pjax" href="{{ action('PageController@home') }}">klikacara.com</a> adalah website yang menyediakan layanan jual
        beli dan sewa
        menyewa peralatan untuk acara. Segala peralatan yang disediakan berasal dari provider resmi yang bekerja
        sama dengan kami.
        Tanpa harus repot lagi, kini hanya dengan <a class="pjax" href="{{ action('PageController@home') }}">klikacara.com</a>, Anda dapat
        merencanakan dan membangun acara Anda secara optimal. </p>
    <hr>
    <h1 class="text-center">Meet the team</h1>
    <p class="flow-text text-center">We are a bunch of easygoing individuals that are inifinitely passionate in helping you
        make an impact.</p>
    <div class="row team">
        <div class="col-md-4 col-lg-4 col-sm-12" id="b-13">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/1.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Ahmad Luthfi</h3>
            <p class="text-center job">CEO</p>
            <p class="quoted text-center">Think first, do fast</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12" id="b-20">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/2.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Valda Oz</h3>
            <p class="text-center job">Graphics Designer</p>
            <p class="quoted text-center">Keinginan adalah sumber pengorbanan.</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12" id="b-50">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/3.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Sony Wicaksono</h3>
            <p class="text-center job">Developer</p>
            <p class="quoted text-center">Think first, do fast</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
    </div>
    <div class="separate"></div>
    <div class="row team">
        <div class="col-md-4 col-lg-4 col-sm-12" id="b-inc">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/4.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Visi Digita</h3>
            <p class="text-center job">Marketing</p>
            <p class="quoted text-center">Hold the vision, trust the process.</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/5.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Monica Anggi</h3>
            <p class="text-center job">Marketing</p>
            <p class="quoted text-center">Do what you fear</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12" id="b-inc">
            <div class="team-circle">
                <img src="{{ URL::asset('images/about/6.jpg') }}" alt="Foto team" height="200">
            </div>
            <h3 class="text-center">Rizqy Faishal</h3>
            <p class="text-center job">Developer</p>
            <p class="quoted text-center" id="b-done">Yoweslah Rapoo</p>
            <div class="social">
                @include('partials._social-media')
            </div>
        </div>
    </div>
@endsection

@section('carousel')

@endsection