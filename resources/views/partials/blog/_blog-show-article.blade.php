@extends('partials.blog._blog-base')

@section('blog-main-content')
    <div class="article-show-container">
        <h2>{{ $article->title }}</h2>
        <div class="article-detail">
            <span class="article-date">Posted at <a
                        class="pjax" href="{{ action('ArticleController@showArticlesByDate',$article->published_at) }}">{{ $article->published_at }}</a></span>&nbsp;|&nbsp;
            <span class="article-author">By <a class="pjax"
                        href="{{ action('ArticleController@showArticlesByAuthor',$article->author->name) }}">
                    {{ $article->author->name }}</a></span>
        </div>
        <div class="article-category">
            @foreach($article->categories as $category)
                <a href="{{ action('ArticleCategoryController@showArticles',$category->name) }}"
                   class="label red-bg white-text pjax">{{ $category->name }}</a>
            @endforeach
        </div>
        <hr>
        <div class="blog-image-header">
            <img class="blog-image-item" src="{{ url('/uploads?hash='.$article->image_header)  }}"
                 alt="smasmaslmaslmasla smlasmalsm">
        </div>
        <div class="article-body">
            {!! $article->body !!}
        </div>
        <hr>
    </div>
@endsection

@section('blog-header')
    <div class="blog-header">
        <div class="container">
            <h1>Blog</h1>
        </div>
    </div>
@endsection