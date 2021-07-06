<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Review;
use App\Models\Video;
use App\Models\Work;
use App\Models\Text;

class PortfolioController extends Controller
{
    public function index()
    {
        $page = Page::find(7);
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->paginate(12);

        MainController::sessionIncrement($page);

        return view('pages.portfolio.index', [
            'page' => $page,
            'works' => $works
        ]);
    }

    public function show($link)
    {
        $reviews = Review::where('is_active', 1)
            ->orderBy('ord')
            ->take(12)
            ->get();
        $videos = Video::orderBy('ord')
            ->take(12)
            ->get();
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
            ->get();
        $work = Work::where('link', $link)
            ->firstOrFail();

        MainController::sessionIncrement($work);

        return view('pages.portfolio.item', [
            'reviews' => $reviews,
            'videos' => $videos,
            'works' => $works,
            'work' => $work
        ]);
    }
}
