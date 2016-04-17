@extends('partials.emails._base')

@section('content')
    <div class="email_header">
        <p>Nama  : {{ $data['name'] }}</p>
        <p>Email : {{ $data['email'] }}</p>
    </div>
    <hr>
    <div class="email_body">
        <p>{{ $data['message'] }}</p>
    </div>
@endsection