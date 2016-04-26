<h1 class="text-center">Create new Article</h1>

{!! Form::open(['action' => 'ArticleController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',old('title'),['placeholder' => 'Article Title', 'class' => 'form-control']) !!}
        @if ($errors->has('title'))
            <span class="help-block text-center">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('image_header') ? ' has-error' : '' }}">
        {!! Form::label('image_header','Image Header') !!}
        {!! Form::file('image_header',null,['placeholder' => 'Article Title', 'class' => 'form-control']) !!}
        @if ($errors->has('image_header'))
            <span class="help-block text-center">
                <strong>{{ $errors->first('image_header') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
        {!! Form::label('body','Title') !!}
        {!! Form::textarea('body',old('body'),['placeholder' => 'Article Body', 'class' => 'form-control','id' => 'article-body-text']) !!}
        @if ($errors->has('body'))
            <span class="help-block text-center">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
        {!! Form::label('categories','Article Category') !!}
        {!! Form::select('categories[]',$categories,old('categories'),['class' => 'form-control select2','multiple']) !!}
        @if ($errors->has('categories'))
            <span class="help-block text-center">
                <strong>{{ $errors->first('categories') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Submit',['placeholder' => 'Article Title', 'class' => 'form-control btn btn-custom']) !!}
    </div>


{!! Form::close() !!}