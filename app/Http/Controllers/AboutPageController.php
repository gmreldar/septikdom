<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Text;
use App\Models\Work;

class AboutPageController extends Controller
{
    public function index()
    {
        $page = Page::find(2);
        $text1 = Text::find(2)->text;
        $text2 = Text::find(3)->text;
        $septics = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(12)
            ->get();
        $services = Service::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(12)
            ->get();
        $licenses = License::orderBy('ord')
            ->take(12)
            ->get();
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
            ->get();

        MainController::sessionIncrement($page);
        $title = 'О компании Септикдом';

        return view('pages.about', [
            'title' => $title,
            'page' => $page,
            'text1' => $text1,
            'text2' => $text2,
            'septics' => $septics,
            'services' => $services,
            'licenses' => $licenses,
            'works' => $works,
        ]);
    }
}
