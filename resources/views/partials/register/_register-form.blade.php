@extends('partials.auth._auth-base')

@section('form-content')
    <h3 class="text-center">Selamat datang</h3>
    <p class="text-center">
        Silakan login untuk mengakses semua fitur klikacara.com
    </p>
    <div class="row social-media-login">
        <div class="col-md-12 col-sm-12 col-lg-12 fb-login">
            <a href="#" class="soc-med-login text-center white-text fb-bg"><i class="fa fa-facebook">&nbsp;</i>Daftar dengan Facebook</a>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12 twitter-login">
            <a href="#" class="soc-med-login text-center white-text twitter-bg"><i class="fa fa-twitter">&nbsp;</i>Daftar dengan Twitter</a>
        </div>
    </div>
    <div class="strike-line">
        <span>ATAU</span>
    </div>
    <div class="">
        {!! Form::open(['url' => '/register','method' => 'POST','class' => 'form', 'id' => 'register_form']) !!}

        <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">

                    {!! Form::label('f_name','First Name') !!}
                    {!! Form::text('f_name',old('f_name'),['class' => 'form-control text-center', 'placeholder'  => 'Your First Name']) !!}
                    @if ($errors->has('f_name'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('f_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('l_name','Last Name') !!}
                    {!! Form::text('l_name',old('l_name'),['class' => 'form-control text-center', 'placeholder'  => 'Your Last Name']) !!}
                    @if ($errors->has('l_name'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('l_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('phone','Phone Number') !!}
                    {!! Form::text('phone',old('phone'),['class' => 'form-control text-center', 'placeholder'  => 'Your Phone Number']) !!}
                    @if ($errors->has('phone'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('bdate') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('bdate','Birthdate') !!}
                    {!! Form::date('bdate',old('bdate'),['class' => 'form-control text-center', 'placeholder'  => 'Your Birthdate']) !!}
                    @if ($errors->has('bdate'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('bdate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('sex','Sex') !!}
                    <div class="radio-group">
                        {!! Form::radio('sex','P',true) !!} Male &nbsp;
                        {!! Form::radio('sex','W') !!} Female
                        @if ($errors->has('sex'))
                            <span class="help-block text-center">
                            <strong>{{ $errors->first('sex') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('email','Email') !!}
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
                    {!! Form::label('password','Your password') !!}
                    {!! Form::password('password', ['class' => 'form-control text-center', 'placeholder' => 'Your Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    {!! Form::label('password_confirmation','Confirm your password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control text-center', 'placeholder' => 'Repeat Your Password']) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-custom form-control">
                        <i class="fa fa-btn fa-user-plus">&nbsp;</i>Daftar
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection