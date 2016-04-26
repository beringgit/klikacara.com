@extends('partials._base')


@section('content')
    @include('partials.blog._blog-create-form')
@endsection

@section('tinymce')
    @include('partials._js-tinymce')
@endsection
