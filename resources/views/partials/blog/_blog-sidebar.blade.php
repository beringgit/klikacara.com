<div class="sidebar-container">
    <div class="sidebar-content subscribe">
        <h3>Subscribe Me</h3>
        {!! Form::open() !!}
        {!! Form::email('subscribe',null,['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
        <br>
        {!! Form::submit('Berlangganan',['class' => 'btn btn-custom', 'style' => 'margin:auto;display:block;']) !!}
        {!! Form::close() !!}
    </div>

    <div class="sidebar-content tweets">
        <h3>Tweets</h3>
    </div>

    <div class="sidebar-content new-post">
        <h3>Newest Post</h3>
        <div class="blog-new">
            <a href="#">sanslasmalsmalsalsm</a>
            <hr>
        </div>
    </div>

    <div class="sidebar-content blog-categories">
        <h3>Categories</h3>
        <div class="category-article">
            <a href="#">Berita</a>
            <hr>
        </div>
    </div>

</div>