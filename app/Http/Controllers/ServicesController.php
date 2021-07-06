<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Work;

class ServicesController extends Controller
{
    public function index()
    {
        $page = Page::find(3);
        $services = Service::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->get();

        MainController::sessionIncrement($page);

        return view('pages.services.index', [
            'page' => $page,
            'services' => $services
        ]);
    }

    public function show($link)
    {
        $service = Service::where('link', $link)->firstOrFail();
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
            ->get();

        MainController::sessionIncrement($service);

        return view('pages.services.service', [
            'service' => $service,
            'works' => $works
        ]);
    }
}
