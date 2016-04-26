@extends('partials._base')


@section('content')

    <h3 class="text-center">Selamat datang</h3>
    <p class="text-center">
        Silakan login untuk mengakses semua fitur klikacara.com
    </p>

    <div class="">
        {!! Form::model($user,['url' => '/admin/register','method' => 'POST','class' => '-form', 'id' => 'register_form']) !!}




        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('name','Your Name') !!}
                    {!! Form::text('name', session('name') == null ? old('name') : session('name'),['class' => 'form-control text-center', 'placeholder'  => 'Your Name']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block text-center">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email',session('email') == null ? old('email') : session('email'),['class' => 'form-control text-center', 'placeholder'  => 'Your email address']) !!}
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