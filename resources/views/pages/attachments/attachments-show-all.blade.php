@extends('partials._base')

@section('content')
    @foreach($attachments as $attachment)
        <div>
            <img src="{{ $attachment }}" alt="sasasasas">
        </div>
    @endforeach
@endsection