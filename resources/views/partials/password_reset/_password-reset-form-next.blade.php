<div class="reset-content">
    <h3 class="text-center">Anda lupa password?</h3>

    <p class="text-center">Masukkan email yang telah terdaftar di kitabisa.com. Kami akan mengirimkan petunjuk
        untuk mengubah password Anda.</p>
</div>
<div class="">
    {!! Form::open(['url' => '/password/reset','method' => 'POST','class' => 'form pjax-form']) !!}
    <div>
        {{--<input type="hidden" name="token" value="{{ $token }}">--}}
        {!! Form::hidden('token',$token) !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                {!! Form::label('email','Email Address') !!}
                {!! Form::email('email',$email or old('email'), ['class' => 'form-control']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
             </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="row">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',null, ['class' => 'form-control']) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

            <div class="row">
                {!! Form::label('password_confirmation','Confirm Password') !!}
                {!! Form::password('password_confirmation',null, ['class' => 'form-control']) !!}
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-refresh">&nbsp;</i>Reset Password
                </button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>