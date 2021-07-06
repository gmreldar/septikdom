<?php

namespace App\Http\Controllers;

use App\Models\Modification;
use App\Models\Page;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        $page = Page::find(9);

        MainController::sessionIncrement($page);

        return view('pages.calculator.index', [
            'page' => $page,
        ]);
    }

    public function searchModification(Request $request)
    {
        $modifications = Modification::select('id', 'modtitle', 'product_id', 'price', 'discount', 'glubina', 'destination')
            ->where('destination', $request->input('destination'))
            ->where('chel', '>=', $request->input('chel'))
            ->where('volume', '>=', $request->input('volume'))
            ->where('glubina', '>=', $request->input('glubina'))
            ->whereNotNull('product_id')
            ->orderBy('chel')
            ->get();

        $results = [];
        $categories = [];

        foreach ($modifications as $modification) {
            if (!array_key_exists($modification->product_id, $results)
                && $modification->product
                && $modification->product->is_active
                && $modification->product->category
                && $modification->product->category->is_active
                && !in_array($modification->product->product_category_id, $categories)
            ) {
                $results[$modification->product_id] = $modification;
                $categories[] = $modification->product->product_category_id;
            }
        }

        return view('pages.calculator.result', [
            'modifications' => $results,
        ]);
    }
}
