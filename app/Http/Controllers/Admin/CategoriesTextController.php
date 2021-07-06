<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoriesText;

class CategoriesTextController extends AppBaseController
{
    public function index(Request $request)
    {
        $categoriesText = CategoriesText::all();

        $septics_text = CategoriesText::where('type', 1)->first();
        $cellars_text = CategoriesText::where('type', 3)->first();
        $caissons_text = CategoriesText::where('type', 4)->first();

        return view('admin.categories_text.index', compact('categoriesText', 'septics_text', 'cellars_text', 'caissons_text'));
    }

    public function create(Request $request)
    {
        $type = $request->all();
        $type = $type['type'];

        return view('admin.categories_text.create', compact('type'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $objCategoriesText = new CategoriesText();

        if ($input['text'] == '') {
            $text = ' ';
        } else {
            $text = $input['text'];
        }

        $objCategoriesText = $objCategoriesText->create([
            'text' => $text,
            'type' => $input['type']
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
        $text = CategoriesText::find($id);

        return view('admin.categories_text.edit', compact('text'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $objCategoriesText = new CategoriesText();

        if ($input['text'] == '') {
            $text = ' ';
        } else {
            $text = $input['text'];
        }

        $objCategoriesText = $objCategoriesText->where('id', '=', $input['id'])->update([
            'text' => $text
        ]);

        return back();
    }
}
