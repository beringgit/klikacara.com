<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Article;
use App\ArticleCategory;
use App\Attachment;
use App\Helper\PageDescription;
use App\Helper\PagePagination;
use Carbon\Carbon;
use Creitive\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Viraj\Hawkeye\Hawkeye;

class ArticleController extends Controller
{

    protected $model_control = 'App\Article';

    public function __construct(PageDescription $page, Breadcrumbs $breadcrumbs, Hawkeye $uploader){
        $this->page = $page;
        $this->uploader = $uploader;
        $this->breadcrumbs = $breadcrumbs;
        $this->breadcrumbs->setListElement('ol');
        $this->breadcrumbs->addCssClasses('breadcrumb');
        $this->breadcrumbs->setDivider('');
        $this->breadcrumbs->addCrumb('Home',action('PageController@home'));
        $this->middleware('admin',['except' => ['index','show','showArticlesByAuthor','showArticlesByDate']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::paginate(3);
        $this->breadcrumbs->addCrumb('Blog',action('ArticleController@index'));
        return view('pages.blog.home')->with([
            'page' => $this->page->setPage('Blog'),
            'articles' => $articles,
            'breadcrumbs'   => $this->breadcrumbs
        ]);
    }

    public function showArticlesByAuthor(Admin $author){
        $this->breadcrumbs->addCrumb('Blog',action('ArticleController@index'));
        $this->breadcrumbs->addCrumb($author->name,action('ArticleController@showArticlesByAuthor',$author->name));
        return view('pages.blog.home')->with([
            'page'  => $this->page->setPage($author->name . ' articles'),
            'articles'  =>  $author->articles()->paginate(15),
            'breadcrumbs'   => $this->breadcrumbs
        ]);
    }

    public function showArticlesByDate($date){
        $articles = Article::where('published_at','=',$date)->paginate(15);
        $this->breadcrumbs->addCrumb('Blog',action('ArticleController@index'));
        $this->breadcrumbs->addCrumb($date,action('ArticleController@showArticlesByDate',$date));
        return view('pages.blog.home')->with([
            'page'  => $this->page->setPage($date . ': articles'),
            'articles'  =>  $articles,
            'breadcrumbs'   => $this->breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.create')->with([
            'page'  => $this->page->setPage('Create a new Article'),
            'categories' => ArticleCategory::lists('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'published_at' => Carbon::now()
        ]);
        $article = Auth::guard('admin')->user()->articles()->save($article);
        $uploadFile = $this->uploader->upload('image_header',$article->id,$this->model_control)->resize()->getSeparated();
        $article->image_header = $uploadFile[0]['original'];
        $article->save();
        $article->categories()->sync($request->input('categories'));
        dd($article);


//        $articles = Auth::user()->articles()->save(new Article($request->all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.blog.show')->with([
            'page'  => $this->page->setPage($article->title),
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
