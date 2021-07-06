<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\MapMarker;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Question;
use App\Models\Service;
use App\Models\Text;
use App\Models\Work;

class MapController extends Controller
{
    public function index()
    {
        $page = Page::find(2);
//        $text1 = Text::find(2)->text;
//        $text2 = Text::find(3)->text;
//        $septics = ProductCategory::where('type', 1)
//            ->where('is_active', 1)
//            ->orderBy('ord')
//            ->select('name', 'link', 'image', 'alt', 'annotation')
//            ->take(12)
//            ->get();
//        $services = Service::orderBy('ord')
//            ->select('name', 'link', 'image', 'alt', 'annotation')
//            ->take(12)
//            ->get();
//        $licenses = License::orderBy('ord')
//            ->take(12)
//            ->get();
//        $works = Work::orderBy('ord')
//            ->select('name', 'link', 'image', 'alt', 'annotation')
//            ->take(8)
//            ->get();
//
//        $questions = Question::orderBy('ord')
//            ->get();
//
        MainController::sessionIncrement($page);

        $markersDB = MapMarker::all();
        $markers = [];
        foreach ($markersDB as $marker){
            $product = Product::find($marker->product_id);
            $category = ProductCategory::find($product->product_category_id);
            $markers[] = [
                'lat' => $marker->lat,
                'lng' => $marker->lng,
                'product_title' => $product->name,
                'product_link' => route('catalog.product', [$category->link, $product->link]),
                'price' => $marker->price,
                'comment' => $marker->comment,
            ];
        }

        return view('pages.map', compact('page', 'markers'));
    }
}
