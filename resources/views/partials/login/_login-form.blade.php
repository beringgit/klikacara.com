@extends('partials.auth._auth-base')

@section('form-content')
    <h3 class="text-center">Selamat datang</h3>
    <p class="text-center">
        Silakan login untuk mengakses semua fitur klikacara.com
    </p>
    <div class="row social-media-login">
        <div class="col-md-12 col-sm-12 col-lg-12 fb-login">
            <a href="#" class="soc-med-login text-center white-text fb-bg"><i class="fa fa-facebook">&nbsp;</i>Login dengan Facebook</a>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12 twitter-login">
            <a href="#" class="soc-med-login text-center white-text twitter-bg"><i class="fa fa-twitter">&nbsp;</i>Login dengan Twitter</a>
        </div>
    </div>
    <div class="strike-line">
        <span>ATAU</span>
    </div>
    <div class="">
        {!! Form::open(['url' => '/login','method' => 'POST','class' => 'form pjax-form']) !!}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::email('email',old('email'),['class' => 'form-control text-center', 'placeholder'  => 'Your email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    {!! Form::password('password', ['class' => 'form-control text-center', 'placeholder' => 'Your Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-md-12 col-sm-12">
                    <div class="checkbox">
                        <label>
                            <input class="text-center" type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-custom pjax">
                        <i class="fa fa-btn fa-sign-in">&nbsp;</i>Login
                    </button>

                    <a class="btn btn-link text-center pjax" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection