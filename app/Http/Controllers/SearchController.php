<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use View;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->has('words')) {
            $productsDB = Product::where('name', 'LIKE', '%' . $request->input('words') . '%')->take(7)->get();
            $pCount = $productsDB->count();
            $products = [];
            foreach ($productsDB as $product) {
                $products[] = [
                    'product' => $product,
                    'category' => ProductCategory::find($product['product_category_id']),
                ];
            }

            $articles = Article::where('name', 'LIKE', '%' . $request->input('words') . '%')->select('link', 'name', 'article_category_id')->take(7)->get();
            return response(View::make('blocks.search',compact('articles', 'products', 'pCount'))->render(), 200);
        } else {
            return response('missed words', 400);
        }
    }
}