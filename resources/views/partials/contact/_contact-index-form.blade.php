{!! Form::open(['action' => 'EmailController@sendFromContact', 'method' => 'post']) !!}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                {{--<label for="name_contact">Nama</label>--}}
                {!! Form::label('contact_name','Nama') !!}
                {!! Form::text('contact_name',null,['class' => 'form-control']) !!}
                {{--<input type="text" class="form-control" placeholder="Your Name">--}}
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_email','Email') !!}
                {!! Form::email('contact_email',null,['class' => 'form-control']) !!}
                {{--<label for="name_contact">Email</label>--}}
                {{--<input type="email" class="form-control" placeholder="Your email">--}}
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_mesage','Message') !!}
                {!! Form::textarea('contact_message',null,['class'  => 'form-control']) !!}
                {{--<label for="message">Message</label>--}}
                    {{--<textarea class="form-control"--}}
                              {{--placeholder="Your message" name="contact_message" id="message" cols="30" rows="10"></textarea>--}}
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4">
            <div class="form-group">
                {{--<input type="submit" value="Kirim" class="btn form-control btn-custom">--}}
                {!! Form::submit('Kirim',['class'   => 'btn form-control btn-custom']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}