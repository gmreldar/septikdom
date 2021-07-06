<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->paginate(20);

        return view('admin.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('admin.products.create')
            ->with('product_category_id', $request->input('product_category_id'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;

        if($request->hasFile('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 1000);

        $product = $this->productRepository->create($input);

        Flash::success('Продукт успешно сохранен.');

        return redirect(route('productCategories.edit', $product->product_category_id));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $input = $request->all();
        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($product->image);
            Storage::disk('public_path')->delete('min/' . $product->image);
            $input['image'] = StorageController::saveImage('images', $input['image']);
        }
        $product = $this->productRepository->update($input, $id);

        Flash::success('Продукт успешно обновлен.');

        return redirect(route('products.edit', $id));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Продукт успешно удален.');

        return redirect(route('productCategories.edit', $product->product_category_id));
    }
}
