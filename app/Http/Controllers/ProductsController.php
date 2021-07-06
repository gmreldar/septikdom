<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bestsellers;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Question;
use App\Providers\MicroMarkup\MicroMarkupProduct;
use Illuminate\Http\Request;
use App\Models\Modification;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Page;
use App\Models\Text;
use App\Models\Work;
use App\Models\Documentation;
use App\Models\DocumentationToProduct;
use App\Models\Icons;
use App\Models\IconsToProduct;
use App\Models\CategoriesText;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    private $category_id2page_code = [
        ProductCategory::CAISSON_ID => Page::CESSON_CATALOG,
        ProductCategory::CELLAR_ID  => Page::POGREBA_CATALOG,
        ProductCategory::SEPTICS_ID => Page::SEPTICK_CATALOG
    ];
    public function cellars()
    {
        $page = Page::where("code", $this->category_id2page_code[ProductCategory::CELLAR_ID])->first();
        $text = CategoriesText::where('type', 3)->first();
        $cellars = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->get();
        MainController::sessionIncrement($page);
        $menu_categorys1 = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys2 = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys3 = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')
            ->take(2)
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

        return view('pages.catalog.cellars', [
            'page' => $page,
            'text' => $text,
            'cellars' => $cellars,
            'menu_categorys1' => $menu_categorys1,
            'menu_categorys2' => $menu_categorys2,
            'menu_categorys3' => $menu_categorys3,
            'bestsellers' => $bestsellers,
            'promotions' => $promotions
        ]);
    }

    public function caissons()
    {
        $page = Page::where("code", $this->category_id2page_code[ProductCategory::CAISSON_ID])->first();
        $text = CategoriesText::where('type', 4)->first();
        $caissons = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->get();

        MainController::sessionIncrement($page);
        $menu_categorys1 = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys2 = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys3 = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')
            ->take(2)
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

        return view('pages.catalog.caissons', [
            'page' => $page,
            'text' => $text,
            'caissons' => $caissons,
            'menu_categorys1' => $menu_categorys1,
            'menu_categorys2' => $menu_categorys2,
            'menu_categorys3' => $menu_categorys3,
            'bestsellers' => $bestsellers,
            'promotions' => $promotions
        ]);
    }

    public function index()
    {
        $page = Page::where("code", $this->category_id2page_code[ProductCategory::SEPTICS_ID])->first();
        $text = CategoriesText::where('type', 1)->first();
        $septics = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->get();
        MainController::sessionIncrement($page);
        $menu_categorys1 = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys2 = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys3 = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')
            ->take(2)
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

        return view('pages.catalog.septics', [
            'page' => $page,
            'text' => $text,
            'text_bottom' => Text::find(7)->text,
            'septics' => $septics,
            'menu_categorys1' => $menu_categorys1,
            'menu_categorys2' => $menu_categorys2,
            'menu_categorys3' => $menu_categorys3,
            'bestsellers' => $bestsellers,
            'promotions' => $promotions
        ]);
    }

    public function category($categoryLink)
    {
        $category = ProductCategory::where('link', $categoryLink)
            ->where('is_active', 1)
            ->firstOrFail();
        $products = Product::where('product_category_id', $category->id)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->select('id', 'name', 'link')
            ->get();

        MainController::sessionIncrement($category);

        $menu_categorys1 = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys2 = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys3 = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $articles = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')
            ->select('name', 'link', 'image', 'alt', 'annotation', 'article_category_id')
            ->take(3)
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')
            ->select('name', 'link', 'image', 'alt', 'annotation', 'article_category_id')
            ->take(2)
            ->get();

        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
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

        return view('pages.catalog.category', [
            'category' => $category,
            'products' => $products,
            'menu_categorys1' => $menu_categorys1,
            'menu_categorys2' => $menu_categorys2,
            'menu_categorys3' => $menu_categorys3,
            'bestsellers' => $bestsellers,
            'works' => $works,
            'articles' => $articles,
            'promotions' => $promotions
        ]);
    }

    public function product($categoryLink, $link)
    {
        $category = ProductCategory::where('link', $categoryLink)
            ->where('is_active', 1)
            ->select('id', 'name', 'link', 'type')
            ->firstOrFail();
        $product = Product::where('product_category_id', $category->id)
            ->where('is_active', 1)
            ->where('link', $link)
            ->firstOrFail();
        $questions = Question::orderBy('ord')
            ->get();
        $modifications = $product->modifications;
        $comments = $this->getComments($product->id);
        $works = Work::orderBy('ord')
            ->select('name', 'link', 'image', 'alt', 'annotation')
            ->take(8)
            ->get();

        $promotions = Article::orderBy('created_at', 'desc')
            ->whereNotNull('article_category_id')->where('article_category_id', '22')
            ->select('name', 'link', 'image', 'alt', 'annotation', 'article_category_id')
            ->take(3)
            ->get();


        if ($category->type == ProductCategory::ACCESSORIES_ID){
            $analogProducts = DB::table('products')
                ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
                ->where('products.chel', '=', $product->chel)
                ->where('product_categories.is_active', '=', 1)
                ->where('product_categories.id', '=', $category->id)
                ->where('product_categories.type', '=', $category->type)
                ->whereNotNull('product_categories.link')
                ->where('products.is_active', '=', 1)
                ->where('products.id', '!=', $product->id)
                ->whereNull('product_categories.deleted_at')
                ->whereNull('products.deleted_at')
                ->inRandomOrder()
                ->take(4)
                ->pluck('products.id')
                ->all();
        }
        else {
            $analogProducts = DB::table('products')
                ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
                ->where('products.chel', '=', $product->chel)
                ->where('product_categories.is_active', '=', 1)
                ->where('product_categories.type', '=', $category->type)
                ->whereNotNull('product_categories.link')
                ->where('products.is_active', '=', 1)
                ->where('products.id', '!=', $product->id)
                ->whereNull('product_categories.deleted_at')
                ->whereNull('products.deleted_at')
                ->inRandomOrder()
                ->take(4)
                ->pluck('products.id')
                ->all();
        }
        $analogProducts = Product::whereIn('id', $analogProducts)
            ->with('category')
            ->select('id', 'product_category_id', 'name', 'link')
            ->get();
        $viewedProducts = null;

        $viewed = Session::get('viewed');
        if (!$viewed) {
            $viewed[] = $product->id;
            Session::put('viewed', $viewed);
        } else {
            $viewed = array_slice($viewed, -9);
            $viewed = array_reverse($viewed);
            $i = 1;
            foreach($viewed as $item) {
                if($i <= 8) {
                    if($item != $product->id && Product::where('id', $item)->count()) {
                        $viewedProducts[] = Product::where('id', $item)
                            ->where('is_active', 1)
                            ->select('id', 'product_category_id', 'name', 'link')
                            ->find($item);
                        $i++;
                    }
                }
            }
            if (in_array($product->id, $viewed)) {
                unset($viewed[array_search($product->id, $viewed)]);
                Session::put('viewed', $viewed);
            }
            Session::push('viewed', $product->id);
        }

        MainController::sessionIncrement($product);

        $documentationToProducts = DocumentationToProduct::where('id_product', '=', $product->id)->get();

        $iconsToProduct = IconsToProduct::where('id_product', '=', $product->id)->first();
        $icon = array();
        if ($iconsToProduct) {
            $icons = Icons::where('id', '=', $iconsToProduct->id_icons)->first();
            if ($icons) {
                $icon = [
                    'sink' => $icons->sink,
                    'bath' => $icons->bath,
                    'toilet' => $icons->toilet,
                    'washing' => $icons->washing,
                    'shower' => $icons->shower
                ];
            } else {
                $icon = [
                    'sink' => 0,
                    'bath' => 0,
                    'toilet' => 0,
                    'washing' => 0,
                    'shower' => 0
                ];
            }
        } else {
            $icon = [
                'sink' => 0,
                'bath' => 0,
                'toilet' => 0,
                'washing' => 0,
                'shower' => 0
            ];
        }

        $menu_categorys1 = ProductCategory::where('type', 1)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys2 = ProductCategory::where('type', 3)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $menu_categorys3 = ProductCategory::where('type', 4)
            ->where('is_active', 1)
            ->orderBy('ord')
            ->get();

        $contact = Contact::find(1);
        $estimated_cost = $contact->cable * 6 + $product->pesok;

        $this->micro_markup = new MicroMarkupProduct($product, $category, $this->getComments($product->id, 0));
        if($category->type == ProductCategory::SEPTICS_ID)
            return view('pages.catalog.product', [
                'category' => $category,
                'product' => $product,
                'works' => $works,
                'analogProducts' => $analogProducts,
                'viewedProducts' => $viewedProducts,
                'modifications' => $modifications,
                'comments' => $comments,
                'questions' => $questions,
                'documentationToProducts' => $documentationToProducts,
                'icon' => $icon,
                'estimated_cost' => $estimated_cost,
                'menu_categorys1' => $menu_categorys1,
                'menu_categorys2' => $menu_categorys2,
                'menu_categorys3' => $menu_categorys3,
                'micro_markup' => $this->micro_markup->GetMarkup(),
                'promotions' => $promotions
            ]);
        elseif ($category->type == ProductCategory::ACCESSORIES_ID)
            return view('pages.catalog.product_accessories', [
                'category' => $category,
                'product' => $product,
                'works' => $works,
                'analogProducts' => $analogProducts,
                'viewedProducts' => $viewedProducts,
                'modifications' => $modifications,
                'comments' => $comments,
                'questions' => $questions,
                'documentationToProducts' => $documentationToProducts,
                'icon' => $icon,
                'estimated_cost' => $estimated_cost,
                'menu_categorys1' => $menu_categorys1,
                'menu_categorys2' => $menu_categorys2,
                'menu_categorys3' => $menu_categorys3,
                'micro_markup' => $this->micro_markup->GetMarkup(),
                'promotions' => $promotions
            ]);
        elseif ($category->type == ProductCategory::CELLAR_ID)
            return view('pages.catalog.product_cellar', [
                'category' => $category,
                'product' => $product,
                'works' => $works,
                'analogProducts' => $analogProducts,
                'viewedProducts' => $viewedProducts,
                'modifications' => $modifications,
                'comments' => $comments,
                'questions' => $questions,
                'documentationToProducts' => $documentationToProducts,
                'icon' => $icon,
                'estimated_cost' => $estimated_cost,
                'menu_categorys1' => $menu_categorys1,
                'menu_categorys2' => $menu_categorys2,
                'menu_categorys3' => $menu_categorys3,
                'micro_markup' => $this->micro_markup->GetMarkup(),
                'promotions' => $promotions
            ]);
        elseif ($category->type == ProductCategory::CAISSON_ID)
            return view('pages.catalog.product_caisson', [
                'category' => $category,
                'product' => $product,
                'works' => $works,
                'analogProducts' => $analogProducts,
                'viewedProducts' => $viewedProducts,
                'modifications' => $modifications,
                'comments' => $comments,
                'questions' => $questions,
                'documentationToProducts' => $documentationToProducts,
                'icon' => $icon,
                'estimated_cost' => $estimated_cost,
                'menu_categorys1' => $menu_categorys1,
                'menu_categorys2' => $menu_categorys2,
                'menu_categorys3' => $menu_categorys3,
                'micro_markup' => $this->micro_markup->GetMarkup(),
                'promotions' => $promotions
            ]);
    }

    public function getModification(Request $request)
    {
        if ($request->has('modification_id'))
            $modification = Modification::findOrFail($request->input('modification_id'));
        else
            $modification = Modification::where('product_id', $request->input('product_id'))
                ->where('destination', $request->input('destination'))
                ->where('glubina', $request->input('glubina'))
                ->firstOrFail();

        return response($modification, 200);
    }

    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required'
        ])->setAttributeNames([
            'name' => '',
            'phone' => ''
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 400);

            $o = Order::create($request->all());
            $o->user_agent = $request->header('User-Agent');
      			$o->user_ip = $request->ip();
            $o->save();

        return $o;
    }

    public function readMore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required'
        ])->setAttributeNames([
            'name' => '',
            'phone' => ''
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 400);

        $objOrder = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'product_id' => $request->product_id,
            'user_agent' => $request->header('User-Agent'),
            'user_ip' => $request->ip()
        ]);


        return redirect()->route('spasibo');
    }

    public function comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contacts' => 'required|email',
            'text' => 'required|string|min:10'
        ])->setAttributeNames([
            'name' => '',
            'contacts' => '',
            'text' => ''
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 400);

        return Comment::create($request->all());
    }
    private function getComments($product_id, $pagination = 5){
        return Comment::where('product_id', $product_id)->where('is_active', 1)->orderBy('created_at', 'desc')->paginate($pagination);
    }
}
