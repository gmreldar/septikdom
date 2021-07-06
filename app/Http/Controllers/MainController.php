<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Article;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public static function sessionIncrement($model, $column = 'views', $amount = 1)
    {
        if ($model->id && isset($model->$column)) {
            $session = array();
            $session = Session::get($model->getTable() . '.' . $column);
            if ($session) {
                if (!in_array($model->id, $session)) {
                    Session::push($model->getTable() . '.' . $column, $model->id);
                    $model->increment($column, $amount);
                }
            } else {
                $session[] = $model->id;
                Session::put($model->getTable() . '.' . $column, $session);
                $model->increment($column, $amount);
            }
        } else {
            die('sessionIncrement columns error');
        }
    }

    public static function isLike($model)
    {
        if ($model->id) {
            $session = Session::get($model->getTable() . '.likes');
            if ($session) {
                if (in_array($model->id, $session)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function like(Request $request)
    {
        if ($request->has('table') && $request->has('id') && $request->has('column')) {
            $table = $request->get('table');
            $id = (int)$request->get('id');
            $column = $request->get('column');
            $model = DB::table($table)->where('id', $id)->select('id', $column)->first();
            $amount = 1;
            $active = true;
            $session = array();
            $session = Session::get($table . '.' . $column);
            if ($session) {
                if (false !== $key = array_search($id, $session)) {
                    unset($session[$key]);
                    Session::put($table . '.' . $column, $session);
                    DB::table($table)
                        ->where('id', $id)
                        ->update([$column => --$model->$column]);
                    $active = false;
                } else {
                    Session::push($table . '.' . $column, $id);
                    DB::table($table)
                        ->where('id', $id)
                        ->update([$column => ++$model->$column]);
                }
            } else {
                $session[] = $id;
                Session::put($table . '.' . $column, $session);
                DB::table($table)
                    ->where('id', $id)
                    ->update([$column => ++$model->$column]);
            }

            return response([
                'active' => $active,
                'amount' => $model->$column
            ]);
        } else {
            die('need "table/id/column"');
        }
    }

    public function counter(Request $request)
    {
        $table = $request->get('table');
        $id = (int)$request->get('id');
        $column = $request->get('column');
        if (DB::table($table)->where('id', $id)->increment($column)) {
            return response('', 200);
        }
    }

    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|max:255',
            'message' => 'nullable|string',
        ])->setAttributeNames([
            'name' => '',
            'phone' => '',
            'message' => '',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 400);

        $fb = Feedback::create($request->all());
        $fb->user_agent = $request->header('User-Agent');
        $fb->user_ip = $request->ip();
        $fb->save();

        return $fb;
    }

    public function review(Request $request)
    {
        $input = $request->all();
        switch ($input['file_type']) {
            case 0:
                {
                    $input['image'] = $request->file('image');
                    $validator = Validator::make($input, [
                        'name' => 'required|string|max:255',
                        'city' => 'required|max:50',
                        'message' => 'required|string|min:10',
                    ])->setAttributeNames([
                        'name' => '',
                        'city' => '',
                        'message' => '',
                    ]);

                    if ($validator->fails())
                        return response()->json(['errors' => $validator->errors()], 400);
                }
                break;
            case 1:
                {
                    $input['file'] = $request->file('file');
                    $validator = Validator::make($input, [
                        'name' => 'required|string|max:255',
                        'city' => 'required|max:50',
                        'message' => 'required|string|min:10',
                        'file' => 'required',
                    ])->setAttributeNames([
                        'name' => '',
                        'city' => '',
                        'message' => '',
                        'file' => '',
                    ]);

                    if ($validator->fails())
                        return response()->json(['errors' => $validator->errors()], 400);

                    $path = Storage::disk('uploads')->put('avatars', $request->file('file'));
                    StorageController::saveMinImage('uploads/' . $path, 500, 100);
                    $input['file'] = 'uploads/' . $path;
                }
                break;
            case 3:
                {
                    $input['file'] = $request->file('file');
                    $validator = Validator::make($input, [
                        'name' => 'required|string|max:255',
                        'city' => 'required|max:50',
                        'file' => 'required',
                    ])->setAttributeNames([
                        'name' => '',
                        'city' => '',
                        'file' => '',
                    ]);

                    if ($validator->fails())
                        return response()->json(['errors' => $validator->errors()], 400);

                    $path = Storage::disk('uploads')->put('audios', $request->file('file'));
                    //StorageController::saveMinImage('uploads/' . $path, 500, 100);
                    $input['file'] = 'uploads/' . $path;
                }
                break;
        }
        return Review::create($input);
    }

    public static function updateOrder(Request $request)
    {
        $model = $request->input('model');
        $id = $request->input('id');
        $newOrder = $request->input('newOrder');

        if ($model && $id && $newOrder)
            return $model::findOrFail($request->input('id'))->updateOrder($newOrder);
        else
            return response('Bad request', 400);
    }

    public static function updateValue(Request $request)
    {
        if ($request->has('model') && $request->has('id') && $request->has('column') && $request->has('value')) {
            $model = $request->input('model');
            $id = $request->input('id');
            $column = $request->input('column');
            $value = $request->input('value');
            if ($model::findOrFail($id)->update([$column => $value]))
                return response($value, 200);
        }
        return response('Bad request', 400);
    }

    public function paymentShipping()
    {
        $page = Page::find(10);

        MainController::sessionIncrement($page);

        return view('pages.payment', [
            'page' => $page
        ]);
    }

    public function shipping()
    {
        $page = Page::find(10);

        MainController::sessionIncrement($page);

        return view('pages.payment', [
            'page' => $page
        ]);
    }

    public function sitemap()
    {
        $cats = ProductCategory::where('is_active', 1)->get();
        $products = Product::with('category')->where('is_active', 1)->whereHas('category', function ($query) {
            $query->where('is_active', 1);
        })->get();
        $blog = Article::get();
        $services = Service::get();
        return view('pages.sitemap', compact('products', 'blog', 'services', 'cats'));
    }
}
