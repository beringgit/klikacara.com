@extends('partials._base')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="event-what">
                <h2>Events</h2>
                <p class="flow-text">Daftar beberapa event yang mempercayakan kami sebagai media partner.</p>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            @include('partials.events._event-index-list')
        </div>
    </div>
@endsection

@section('carousel')

@endsection