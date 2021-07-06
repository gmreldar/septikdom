<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ProductCategory;

class PriceListPageController extends Controller
{
    private $category_id2page_code = [
        ProductCategory::CAISSON_ID => Page::CESSON_PRAYS,
        ProductCategory::CELLAR_ID  => Page::POGREBA_PRAYS,
        ProductCategory::SEPTICS_ID => Page::SEPTICK_PRAYS
        ];
    public function index()
    {
        $page = Page::where("code", $this->category_id2page_code[ProductCategory::SEPTICS_ID])->first();
        $septics = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('id', 'link', 'short_name as name', 'price_list_text')
            ->get();
        $accessories = ProductCategory::where('type', 2)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('id', 'link', 'short_name as name', 'price_list_text')
            ->get();

        MainController::sessionIncrement($page);

        return view('pages.price.index', [
            'page'          => $page,
            'septics'       => $septics,
            'accessories'   => $accessories,
            'type'          => 1
        ]);
    }

    public function category($type)
    {
        $page = Page::where("code",$this->category_id2page_code[$type])->first();
        $septics = ProductCategory::where('type', $type)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('id', 'link', 'short_name as name', 'price_list_text')
            ->get();
        if ($type == 1) {
            $accessories = ProductCategory::where('type', 2)
                ->where('is_active', 1)
                ->orderBy('ord')
                ->select('id', 'link', 'short_name as name', 'price_list_text')
                ->get();
        } else {
            $accessories = [];
        }


        MainController::sessionIncrement($page);

        return view('pages.price.index', [
            'page'          => $page,
            'septics'       => $septics,
            'accessories'   => $accessories,
            'type'          => $type
        ]);
    }
}
