<div class="row">
    <div class="blog_main_content">
        <div class="col-lg-8 col-md-8 col-sm-12">
            @yield('blog-main-content')
            @include('partials._pagination')
        </div>
    </div>
    <div class="blog_side_bar">
        <div class="col-lg-4 col-md-4 col-sm-12">
            @include('partials.blog._blog-sidebar')
        </div>
    </div>
</div>
