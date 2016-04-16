@extends('partials._base')

@section('content')
    <h1 class="text-center">Support dan Partnership</h1>
    <p class="flow-text text-center">
        Untuk membantu Anda dalam memenuhi kebutuhan acara, Anda dapat berkonsultasi dengan
        Customer Care kami melalui email <a href="mailto:cs@klikacara.com">cs@klikacara.com</a>. Layananan
        Media Partner dan Kerja Sama dapat dilakukandengan mengirimkan
        proposal ke <a href="mailto:marketing@klikacara.com">marketing@klikacara.com</a>.
    </p>
    <hr>
    <row>
        <div class="col-md-7 col-lg-7 col-sm-12">
            <h2>Lembar Kontak</h2>
            <p class="flow-text">Silahkan Hubungi Kami Dengan Mengisi Lembar Kontak Berikut.</p>
            @include('partials.contact._contact-index-form')
        </div>
        <div class="col-md-5 col-lg-5 col-sm-12 extra-padd-left">
            <h2>Alamat Kami</h2>
            <address class="flow-text">
                <strong>Klikacara.com</strong><br>
                Jalan Yahya Nui No 38 A<br>
                Pondok Cina, Kecamatan Beji<br>
                Depok, Jawa Barat 16434<br>
                <abbr title="Phone">P:</abbr> 085852207774
            </address>

            <address>
                <strong>Customer Service</strong><br>
                <a href="mailto:cs@klikacara.com">cs@klikacara.com</a>
            </address>
            <div class="social">
                @include('partials._social-media',['class' => 'red-circle'])
            </div>
        </div>
    </row>
@endsection

@section('carousel')

@endsection