{!! Form::open(['action' => 'EmailController@sendFromContact', 'method' => 'post','class' => 'pjax-form']) !!}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                {!! Form::label('contact_name','Nama') !!}
                {!! Form::text('contact_name',null,['class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                @if ($errors->has('contact_name'))
                    <span class="help-block text-center">
                            <strong>{{ $errors->first('contact_name') }}</strong>
                        </span>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
                {!! Form::label('contact_email','Email') !!}
                {!! Form::email('contact_email',null,['class' => 'form-control','placeholder' => 'Your email']) !!}
                @if ($errors->has('contact_email'))
                    <span class="help-block text-center">
                        <strong>{{ $errors->first('contact_email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group {{ $errors->has('contact_message') ? 'has-error' : '' }}">
                {!! Form::label('contact_message','Message') !!}
                {!! Form::textarea('contact_message',null,['class'  => 'form-control', 'placeholder' => 'Your Messages']) !!}
                @if ($errors->has('contact_message'))
                    <span class="help-block text-center">
                            <strong>{{ $errors->first('contact_message') }}</strong>
                        </span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
            <div class="form-group">
                {!! Form::submit('Kirim',['class'   => 'btn form-control btn-custom']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}