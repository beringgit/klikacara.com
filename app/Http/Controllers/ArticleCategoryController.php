<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Helper\PageDescription;
use App\Helper\PagePagination;
use Creitive\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleCategoryController extends Controller
{
    public function __construct(PageDescription $page, Breadcrumbs $breadcrumbs){
        $this->page = $page;
        $this->breadcrumbs = $breadcrumbs;
        $this->breadcrumbs->setListElement('ol');
        $this->breadcrumbs->addCssClasses('breadcrumb');
        $this->breadcrumbs->setDivider('');
        $this->breadcrumbs->addCrumb('Home',action('PageController@home'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function showArticles(ArticleCategory $articleCategory){
        $articles = $articleCategory->articles()->paginate(5);
        $this->breadcrumbs->addCrumb('Blog',action('ArticleController@index'));
        $this->breadcrumbs->addCrumb($articleCategory->name,action('ArticleController@showArticlesByDate',$articleCategory->name));
        return view('pages.blog.home')->with([
            'page'  => $this->page->setPage('Articles'),
            'articles'  => $articles,
            'breadcrumbs'   => $this->breadcrumbs
        ]);
    }
}
