<body>
    @include('partials._nav')
    <div id="main_content">
        @yield('blog-header')
        @include('partials._breadcrumbs')
        {{--@include('partials._subnav')--}}
        @yield('event-detail')
        @yield('carousel')
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('partials._footer')
    @include('partials._js')
    @yield('tinymce')
</body>