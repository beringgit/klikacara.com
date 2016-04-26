
@extends('partials._base')

@section('content')
    {{--@include('partials.home._home-index-why')--}}
    @include('partials.home._home-index-category-menu')
    {{--@include('partials.home._home-index-hot-list')--}}
    {{--<hr>--}}
    {{--@include('partials.home._home-index-partners')--}}
@endsection

@section('carousel')
    @include('partials.home._home-index-carousel')
@endsection
