@extends('partials._base')

@section('content')
    <h1 class="text-center">Layanan Kami</h1>
    <div class="row services">
        <div class="col-lg-10 col-md-12 col-sm-12 col-lg-push-1 col-lg-pull-1">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/alat-musik.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-lg-pull-3">
                    <h3>Alat Musik</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan
                        pemesanan alat
                        musik untuk kebutuhan Anda. Alat musik yang disediakan antara lain untuk kebutuhn band dan
                        akustik.</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm1-12"><a class="service-item" href="#"><img src="{{ URL::asset('images/category/makanan.png')  }}"></a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>Makanan</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan makanan atau katering
                        untuk kebutuhan
                        acara Anda. Makanan yang disediakan antara lain nasi kotak, snack, coffe break dan minuman.</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/transportasi.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-lg-pull-3">
                    <h3>Transportasi</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan
                        pemesanan transportasi untuk menunjang
                        acara Anda. Transportasi yang disediakan dapat digunakan untuk mengangkut barang dan penumpang.
                        Jenis transportasi yang tersedia adalah
                        pick-up, bus dan minibus.</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm1-12"><a class="service-item" href="#"><img src="{{ URL::asset('images/category/venue.png')  }}"></a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>Venue</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan tempat untuk
                        menyelanggarakan acara
                        Anda. Venue yang digunakan merupakan venue dalam ruangan yang dapat digunakan untuk acara
                        pameran, seminar, konferensi, gala diner dan festival.</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/id-card.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-lg-pull-3">
                    <h3>ID Card</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan
                        pemesanan ID-Card untuk keperluan acara Anda.</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm1-12"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/sewa-tenda.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>Sewa Tenda</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan tenda untuk acara
                        Anda. Tenda yang disediakan adalah
                        tenda untuk pameran, bazar, festival, tenda indoor dan outdoor.</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/stage.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-lg-pull-3">
                    <h3>Panggung Acara</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan
                        penyewaan panggung. Panggung
                        yang disediakan dapat berupa level atau panggung berukuran kecil, sedang dan besar. Panggung
                        yang
                        dapat Anda sewa adalah panggung indoor
                        dan utdoor.</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm1-12"><a class="service-item" href="#"><img src="{{ URL::asset('images/category/sound-system.png')  }}"></a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>Sound System</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan sound system untuk
                        kebutuhan
                        acara Anda. Sound system yang digunakan dapat digunakan untuk acara seminar, konferensi,
                        workshoop, acara musik indoor dan outdoor. </p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9"><a class="service-item" href="#"><img
                                src="{{ URL::asset('images/category/ticket.png')  }}"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-lg-pull-3">
                    <h3>Tiket</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan tiket untuk acara.
                        Tiket
                        yang disediakan merupakan tiket untuk acara-acara yang resmi bekerjasama dengan
                        <a href="klikacara.com">Klikacara.com</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm1-12"><a class="service-item" href="#"><img src="{{ URL::asset('images/category/clothing.png')  }}"></a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <h3>Apparel</h3>

                    <p class="flow-text">Dengan meng-klik ikon ini, Anda dapat melakukan pemesanan apparel (kaos
                        panitia dan merchandise lainnya) untuk kebutuhan acara Anda.</p></div>
            </div>
        </div>
    </div>
@endsection

@section('carousel')

@endsection