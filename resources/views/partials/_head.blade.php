<!doctype html>
<head>
    <title>{{ $page['title'] }}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="{{ $page['description'] }}">
    <meta name="author" content="{{ $page['author'] }}">
    <meta name="keyword" content="{{ $page['keyword'] }}">
    @include('partials._loadCss')
    @yield('admin-style')
    @yield('dashboard-style')
</head>