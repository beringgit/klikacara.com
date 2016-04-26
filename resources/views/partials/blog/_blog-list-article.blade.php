@extends('partials.blog._blog-base')

@section('blog-main-content')
    <div class="blog-content-container">
        @foreach($articles as $article)
            <div class="article-item">
                <a href="{{ action('ArticleController@show',$article) }}" class="pjax">
                    <h2>{{ $article->title }}</h2>
                </a>
                <div class="article-detail">
                    <span class="article-date">Posted at <a href="{{ action('ArticleController@showArticlesByDate',$article->published_at) }}"
                                                            class="pjax">{{ $article->published_at }}</a></span>&nbsp;|&nbsp;
                    <span class="article-author">By <a class="pjax"
                                href="{{ action('ArticleController@showArticlesByAuthor',$article->author->name) }}">
                            {{ $article->author->name }}</a></span>
                </div>
                <div class="article-category">
                    @foreach($article->categories as $category)
                        <a href="{{ action('ArticleCategoryController@showArticles',$category->name) }}"
                           class="label pjax red-bg white-text">{{ $category->name }}</a>
                    @endforeach
                </div>
                <div class="article-body">
                    <p>{{ $article->body }}</p>
                </div>
                <hr>
            </div>
        @endforeach
    </div>
@endsection

@section('blog-header')
    <div class="blog-header">
        <div class="container">
            <h1>Blog</h1>
        </div>
    </div>
@endsection

@section('breadcrumbs')
    {!! $breadcrumbs->render() !!}
@endsection


@section('pagination')
    {{ $articles->links() }}
@endsection