<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use View;

class BlogController extends Controller
{
    private $articles_with_portfolio = [ 89 ];

    public function index()
    {
        $page = Page::find(6);
        $categories = ArticleCategory::orderBy('ord')
            ->select('id', 'name', 'link')
            ->get();
        $articles = Article::orderBy('created_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->select('article_category_id', 'name', 'link', 'image', 'alt', 'annotation')
            ->paginate(8);

        MainController::sessionIncrement($page);

        return view('pages.blog.index', [
            'page' => $page,
            'categories' => $categories,
            'articles' => $articles
        ]);
    }

    public function category($categoryLink)
    {
        $activeCategory = ArticleCategory::where('link', $categoryLink)
            ->firstOrFail();
        $categories = ArticleCategory::orderBy('ord')
            ->select('id', 'name', 'link')
            ->get();
        $articles = Article::orderBy('created_at', 'desc')
            ->where('article_category_id', $activeCategory->id)
            ->orderBy('created_at', 'desc')
            ->select('article_category_id', 'name', 'link', 'image', 'alt', 'annotation')
            ->paginate(8);

        MainController::sessionIncrement($activeCategory);

        return view('pages.blog.category', [
            'activeCategory' => $activeCategory,
            'categories' => $categories,
            'articles' => $articles
        ]);
    }

    public function article($categoryLink, $link)
    {
        $activeCategory = ArticleCategory::where('link', $categoryLink)
            ->select('id', 'name', 'link')
            ->firstOrFail();
        $article = Article::where('article_category_id', $activeCategory->id)
            ->where('link', $link)
            ->firstOrFail();
        $categories = ArticleCategory::orderBy('ord')
            ->select('id', 'name', 'link')
            ->get();
        $works = [];

        if(in_array($article->id, $this->articles_with_portfolio)){
            $works = Work::orderBy('ord')->select('name', 'link', 'image', 'alt', 'annotation')->paginate(0);
        }

        MainController::sessionIncrement($article);
        return view('pages.blog.article', [
            'activeCategory' => $activeCategory,
            'article' => $article,
            'categories' => $categories,
            'works' => $works
        ]);
    }

    public function search(Request $request)
    {
        if($request->has('words')) {
            $articles = Article::where('name', 'LIKE', '%' . $request->input('words') . '%')->select('link', 'name', 'article_category_id')->take(7)->get();
            return response(View::make('pages.blog.blocks.search', array('articles' => $articles))->render(), 200);
        } else {
            return response('missed words', 400);
        }
    }
}
