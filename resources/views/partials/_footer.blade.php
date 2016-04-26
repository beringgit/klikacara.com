<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h4>Tentang Kami</h4>
                <ul class="footer-nav">
                    <li><a class="pjax" href="{{ action('PageController@about') }}">Apa itu klikacara?</a></li>
                    <li><a class="pjax" href="{{ action('ArticleController@index') }}">Blog</a></li>
                    <li><a class="pjax" href="{{ action('PageController@about') }}">Our team</a></li>
                    <li><a class="pjax" href="{{ action('PageController@contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h4>Buat Acara</h4>
                <ul class="footer-nav">
                    <li><a class="pjax" href="{{ action('PageController@home').'#category' }}">Category</a></li>
                    <li><a href="#">Syarat dan ketentuan</a></li>
                    <li><a href="#">Kebijakan privasi</a></li>
                    <li><a href="#">Bantuan</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h4>Hubungi Kami</h4>
                <p class="address">
                    <a class="pjax" href="{{ action('PageController@home') }}">klikacara.com</a>
                    <br><br>
                    Jalan Yahya Nui No 38 A
                    <br>
                    Pondok Cina, Depok
                    <br>
                    Jawa Barat 16434
                    <br>
                    <br>
                    Telepon :
                    <br>
                    085852207774 (Ahmad Luthfi)
                    <br>
                    <br>
                    Email :
                    <br>
                    <a href="mailto:cs@klikacara.com">cs@klikacara.com</a>
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h4>Social Media</h4>
                <div class="social">
                    {{--@include('partials._social-media',['class' => 'white-circle'])--}}
                    @include('partials._social-media')
                </div>
            </div>
        </div>
        <p class="text-center">Copyright &copy; 2016 - Klikacara.com - All right reserved</p>
    </div>
</footer>