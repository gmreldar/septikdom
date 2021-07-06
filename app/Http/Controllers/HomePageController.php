<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bestsellers;
use App\Models\HeadSlide;
use App\Models\License;
use App\Models\LogoSlide;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Service;
use App\Models\Text;
use App\Models\Video;
use App\Models\Work;

class HomePageController extends Controller
{
    public function index()
    {
        $page = Page::find(1);
        //@TODO: Replace Text::find by id, to something better
        $text = Text::find(1)->text;
        $catgSeoText = Text::find(8)->text;
        $adsSeoText = Text::find(9)->text;
        $septics = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('name', 'short_name', 'link', 'image', 'alt', 'annotation')
            ->take(12)
            ->get();
        $services = Service::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(12)
            ->get();
        $reviews = Review::where('is_active', 1)
            ->where('file_type', 1)
            ->orderBy('ord')
            ->take(12)
            ->get();
        $videos = Video::orderBy('ord')
            ->take(12)
            ->get();
        $licenses = License::orderBy('ord')
            ->take(12)
            ->get();
        $articles = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')
            ->select('name', 'link', 'image', 'alt', 'annotation', 'article_category_id')
            ->take(3)
            ->get();
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
            ->get();
        $headSlider = HeadSlide::orderby('ord')
            ->get();
        $logoSlider = LogoSlide::orderby('ord')
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')

            ->get();

        $bestsellersDB = Bestsellers::all();
        $bestsellers = [];
        foreach ($bestsellersDB as $best) {
            $p = Product::find($best['product_id']);
            $bestsellers[] = [
                'product' => $p,
                'category' => ProductCategory::find($p['product_category_id']),
            ];
        }

        MainController::sessionIncrement($page);

        return view('pages.index', [
            'page' => $page,
            'text' => $text,
            'septics' => $septics,
            'services' => $services,
            'reviews' => $reviews,
            'videos' => $videos,
            'licenses' => $licenses,
            'articles' => $articles,
            'works' => $works,
            'headSlider' => $headSlider,
            'logoSlider' => $logoSlider,
            'SeoText_catg' => $catgSeoText,
            'SeoText_ads' => $adsSeoText,
            'bestsellers' => $bestsellers,
            'promotions' => $promotions
        ]);
    }
}
