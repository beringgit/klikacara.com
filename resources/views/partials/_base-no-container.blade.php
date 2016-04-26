@include('partials._head')
<body>
@yield('nav')
<div id="main_content">
    @yield('content')
    @include('partials._breadcrumbs')
</div>
@include('partials._js')
@yield('tinymce')
</body>