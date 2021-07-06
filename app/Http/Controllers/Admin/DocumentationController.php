<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App;
use App\Models\Documentation;
use App\Models\DocumentationToProduct;
use App\Models\Product;
use App\Models\DocumentationFile;
use Cookie;
use DB;
use Auth;
use Storage;


class DocumentationController extends AppBaseController
{
    public function index(Request $request)
    {
        return redirect(route('documentation.show', 1));
    }

    public function show(Request $request, $id)
    {
        $type = $id;

        if ($type == 1) {
            $title = 'Монтажная схема';
        } elseif ($type == 2) {
            $title = 'Инструкция по монтажу';
        } elseif ($type == 3) {
            $title = 'Инструкция по шеф-монтажу';
        } elseif ($type == 4) {
            $title = 'Технический паспорт';
        }

        $documentations = Documentation::where('type', '=', $id)->get();

        return view('admin.documentation.index', compact('documentations', 'type', 'title'));
    }

    public function edit(Request $request, $id)
    {
        $documentation = Documentation::find($id);

        $products = new DocumentationToProduct();

        $products = $products->where('id_documentation', '=', $id)->get();

        $products_all = Product::all();

        $files = DocumentationFile::all();

        return view('admin.documentation.edit', compact('documentation', 'products', 'files', 'products_all'));
    }

    public function create(Request $request)
    {
        $type = $request->all();
        $type = $type['type'];
        $files = DocumentationFile::all();
        $products_all = Product::all();

        return view('admin.documentation.create', compact('type', 'files', 'products_all'));
    }

    public function store(Request $request)
    {

        function reArrayFiles(&$file_post)
        {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }

        $input = $request->all();

        $objDocumentation = new Documentation();

        if ($input['title'] == '') {
            $title = time();
        } else {
            $title = $input['title'];
        }

        if ($input['text'] == '') {
            $text = ' ';
        } else {
            $text = $input['text'];
        }

        $objDocumentation = $objDocumentation->create([
            'title' => $title,
            'text' => $text,
            'type' => $input['type']
        ]);

        $objDocumentationToProduct = new DocumentationToProduct();

        if (isset($input['product-name'])) {

            foreach ($input['product-name'] as $product) {
                if ($product != 0) {
                    $objDocumentationToProduct = $objDocumentationToProduct->create([
                        'id_documentation' => $objDocumentation->id,
                        'id_product' => $product
                    ]);
                }

            }
        }

        if (isset($input['userfile'])) {

            $paths = [];
            $array = $request->userfile;
            $array2 = $request->nameLink;
            foreach ($request->userfile as $userfile) {

                $userfileName = time();
                $name = $userfile->getClientOriginalName();
                $key = array_search($name, $array);
                $link = $array2[$key];

                if ($link == '') {
                    $link = $userfileName;
                }

                $userfileFullName = $userfileName . '.' . $userfile->getClientOriginalExtension();
                $userfile->move(public_path('uploads/file/'), $userfileFullName);
                $paths[] = $userfileFullName;

                $objDocumentationFile = new DocumentationFile();

                $objDocumentationFile = $objDocumentationFile->create([
                    'name' => $userfileFullName,
                    'old_name' => $name,
                    'link' => $link
                ]);
            }
        }

        return back();
    }


    public function update(Request $request)
    {

        function reArrayFiles(&$file_post)
        {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }

        $input = $request->all();

        $objDocumentation = new Documentation();

        if ($input['title'] == '') {
            $title = time();
        } else {
            $title = $input['title'];
        }

        if ($input['text'] == '') {
            $text = ' ';
        } else {
            $text = $input['text'];
        }

        $objDocumentation = $objDocumentation->where('id', '=', $input['id'])->update([
            'title' => $title,
            'text' => $text,
            'type' => $input['type']
        ]);

        $objDocumentationToProduct = new DocumentationToProduct();
        $objDocumentationToProduct->where('id_documentation', '=', $input['id'])->delete();

        if (isset($input['product-name'])) {

            foreach ($input['product-name'] as $product) {

                $objDocumentationToProduct = $objDocumentationToProduct->create([
                    'id_documentation' => $input['id'],
                    'id_product' => $product
                ]);
            }
        }

        if (isset($input['userfile'])) {

            $paths = [];
            $array = $request->userfile;
            $array2 = $request->nameLink;
            foreach ($request->userfile as $userfile) {

                $userfileName = time();
                $name = $userfile->getClientOriginalName();
                $key = array_search($name, $array);
                $link = $array2[$key];

                if ($link == '') {
                    $link = $userfileName;
                }

                $userfileFullName = $userfileName . '.' . $userfile->getClientOriginalExtension();
                $userfile->move(public_path('uploads/file/'), $userfileFullName);
                $paths[] = $userfileFullName;

                $objDocumentationFile = new DocumentationFile();

                $objDocumentationFile = $objDocumentationFile->create([
                    'name' => $userfileFullName,
                    'old_name' => $name,
                    'link' => $link
                ]);
            }
        }

        return back();
    }

    public function destroy($id)
    {
        $documentation = Documentation::find($id);

        $documentation->delete($id);

        return back();
    }
}
