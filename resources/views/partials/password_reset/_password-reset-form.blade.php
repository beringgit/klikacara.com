@extends('partials.auth._auth-base')

@section('form-content')
    <div class="reset-content">
        <h3 class="text-center">Anda lupa password?</h3>
        <p class="text-center">Masukkan email yang telah terdaftar di kitabisa.com. Kami akan mengirimkan petunjuk
            untuk mengubah password Anda.</p>
    </div>
    <div class="">
        {!! Form::open(['url' => '/login','method' => 'POST','class' => 'form']) !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    {!! Form::email('email',old('email'),['class' => 'form-control text-center pjax-form','placeholder' => 'Your email address']) !!}
                    @if ($errors->has('email'))
                        <span class="text-center help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-custom" style="display: block;margin: 0 auto;">
                        <i class="fa fa-btn fa-envelope">&nbsp;</i>Send Password Reset Link
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection