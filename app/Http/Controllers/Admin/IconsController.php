<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App;
use App\Models\Icons;
use App\Models\IconsToProduct;
use DB;


class IconsController extends AppBaseController
{
    public function index(Request $request)
    {
        $icons = Icons::all();

        return view('admin.icons.index', compact('icons'));
    }

    public function create(Request $request)
    {
        $icons = Icons::all();

        return view('admin.icons.create', compact('icons'));
    }

    public function edit(Request $request, $id)
    {
        $icons = Icons::find($id);

        $products = new IconsToProduct();

        $products = $products->where('id_icons', '=', $id)->get();

        return view('admin.icons.edit', compact('icons', 'products'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $objIcons = new Icons();

        if ($input['title'] == '') {
            $title = time();
        } else {
            $title = $input['title'];
        }

        if ($input['sink'] == '') {
            $sink = 0;
        } else {
            if (ctype_digit($input['sink'])) {
                $sink = $input['sink'];
            } else {
                $sink = 0;
            }
        }

        if ($input['bath'] == '') {
            $bath = 0;
        } else {
            if (ctype_digit($input['bath'])) {
                $bath = $input['bath'];
            } else {
                $bath = 0;
            }
        }

        if ($input['toilet'] == '') {
            $toilet = 0;
        } else {
            if (ctype_digit($input['toilet'])) {
                $toilet = $input['toilet'];
            } else {
                $toilet = 0;
            }
        }

        if ($input['washing'] == '') {
            $washing = 0;
        } else {
            if (ctype_digit($input['washing'])) {
                $washing = $input['washing'];
            } else {
                $washing = 0;
            }
        }

        if ($input['shower'] == '') {
            $shower = 0;
        } else {
            if (ctype_digit($input['shower'])) {
                $shower = $input['shower'];
            } else {
                $shower = 0;
            }
        }

        $objIcons = $objIcons->create([
            'title' => $title,
            'sink' => $sink,
            'bath' => $bath,
            'toilet' => $toilet,
            'washing' => $washing,
            'shower' => $shower
        ]);

        $objIconsToProduct = new IconsToProduct();

        if (isset($input['product-name'])) {

            foreach ($input['product-name'] as $product) {

                $objIconsToProduct = $objIconsToProduct->create([
                    'id_icons' => $objIcons->id,
                    'id_product' => $product
                ]);
            }
        }

        return back();
    }

    public function update(Request $request)
    {

        $input = $request->all();

        $objIcons = new Icons();

        if ($input['title'] == '') {
            $title = time();
        } else {
            $title = $input['title'];
        }

        if ($input['sink'] == '') {
            $sink = 0;
        } else {
            if (ctype_digit($input['sink'])) {
                $sink = $input['sink'];
            } else {
                $sink = 0;
            }
        }

        if ($input['bath'] == '') {
            $bath = 0;
        } else {
            if (ctype_digit($input['bath'])) {
                $bath = $input['bath'];
            } else {
                $bath = 0;
            }
        }

        if ($input['toilet'] == '') {
            $toilet = 0;
        } else {
            if (ctype_digit($input['toilet'])) {
                $toilet = $input['toilet'];
            } else {
                $toilet = 0;
            }
        }

        if ($input['washing'] == '') {
            $washing = 0;
        } else {
            if (ctype_digit($input['washing'])) {
                $washing = $input['washing'];
            } else {
                $washing = 0;
            }
        }

        if ($input['shower'] == '') {
            $shower = 0;
        } else {
            if (ctype_digit($input['shower'])) {
                $shower = $input['shower'];
            } else {
                $shower = 0;
            }
        }

        $objIcons = $objIcons->where('id', '=', $input['id'])->update([
            'title' => $title,
            'sink' => $sink,
            'bath' => $bath,
            'toilet' => $toilet,
            'washing' => $washing,
            'shower' => $shower
        ]);

        $objIconsToProduct = new IconsToProduct();
        $objIconsToProduct->where('id_icons', '=', $input['id'])->delete();

        if (isset($input['product-name'])) {

            foreach ($input['product-name'] as $product) {

                $objIconsToProduct = $objIconsToProduct->create([
                    'id_icons' => $input['id'],
                    'id_product' => $product
                ]);
            }
        }

        return back();
    }
    public function destroy($id)
    {
        $icons = Icons::find($id);

        $icons->delete($id);

        return back();
    }
}
