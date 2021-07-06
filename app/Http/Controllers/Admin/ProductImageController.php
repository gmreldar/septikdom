<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Repositories\ProductImageRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductImageController extends AppBaseController
{
    /** @var  ProductImageRepository */
    private $productImageRepository;

    public function __construct(ProductImageRepository $productImageRepo)
    {
        $this->productImageRepository = $productImageRepo;
    }

    /**
     * Display a listing of the ProductImage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productImageRepository->pushCriteria(new RequestCriteria($request));
        $productImages = $this->productImageRepository->all();

        return view('product_images.index')
            ->with('productImages', $productImages);
    }

    /**
     * Show the form for creating a new ProductImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_images.create');
    }

    /**
     * Store a newly created ProductImage in storage.
     *
     * @param CreateProductImageRequest $request
     *
     * @return Response
     */
    public function store(CreateProductImageRequest $request)
    {
        $input = $request->all();

        if($request->has('images'))
            $input['image'] = StorageController::saveImage('images', $input['images'], 800);

        $productImage = $this->productImageRepository->create($input);

        Flash::success('Изображение успешно сохранено');

        return redirect(route('products.edit', $input['product_id']));
    }

    /**
     * Display the specified ProductImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Изображение не найдено');

            return redirect(route('productImages.index'));
        }

        return view('product_images.show')->with('productImage', $productImage);
    }

    /**
     * Show the form for editing the specified ProductImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Изображение не найдено');

            return redirect(route('products.index'));
        }

        return view('product_images.edit')->with('productImage', $productImage);
    }

    /**
     * Update the specified ProductImage in storage.
     *
     * @param  int              $id
     * @param UpdateProductImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductImageRequest $request)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Изображение не найдено');

            return redirect(route('products.index'));
        }

        $input = $request->all();
        if ($request->hasFile('images')) {
            Storage::disk('public_path')->delete($productImage->image);
            Storage::disk('public_path')->delete('min/' . $productImage->image);
            $input['image'] = StorageController::saveImage('images', $input['images'], 800);
        }
        $productImage = $this->productImageRepository->update($input, $id);

        Flash::success('Изображение успешно сохранено');

        return redirect(route('products.edit', $productImage->product_id));
    }

    /**
     * Remove the specified ProductImage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Изображение не найдено');

            return redirect(route('products.index'));
        }

        $this->productImageRepository->delete($id);

        Flash::success('Изображение успешно удалено.');

        return redirect(route('products.edit', $productImage->product_id));
    }
}
