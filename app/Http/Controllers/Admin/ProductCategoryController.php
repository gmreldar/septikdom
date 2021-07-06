<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Models\CategoriesText;
use App\Product;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductCategoryController extends AppBaseController
{
    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryRepository = $productCategoryRepo;
    }

    /**
     * Display a listing of the ProductCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return redirect(route('productCategories.show', ProductCategory::SEPTICS_ID));
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('admin.product_categories.create')
            ->with('type', $request->has('type') ? $request->input('type') : ProductCategory::SEPTICS_ID);
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param CreateProductCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $input = $request->all();

        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 400);
        if($request->has('seo_image'))
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);

        $productCategory = $this->productCategoryRepository->create($input);

        Flash::success('Категория успешно сохранена.');

        return redirect(route('productCategories.show', $input['type']));
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        //$this->productCategoryRepository->pushCriteria(new RequestCriteria($request));
        $productCategories = ProductCategory::where('type', $id)->orderBy('ord')->paginate(50);
        $categoriesText = CategoriesText::where('type', $id)->first();

        return view('admin.product_categories.index')
            ->with('productCategories', $productCategories)
            ->with('type', $id)
            ->with('categoriesText', $categoriesText);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('productCategories.index'));
        }

        return view('admin.product_categories.edit')
            ->with('productCategory', $productCategory);
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param  int              $id
     * @param UpdateProductCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoryRequest $request)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('productCategories.index'));
        }

        $input = $request->all();
        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($productCategory->image);
            Storage::disk('public_path')->delete('min/' . $productCategory->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 400);
        }
        if ($request->hasFile('seo_image')) {
            Storage::disk('public_path')->delete($productCategory->seo_image);
            Storage::disk('public_path')->delete('min/' . $productCategory->seo_image);
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);
        }
        $productCategory = $this->productCategoryRepository->update($input, $id);

        Flash::success('Категория успешно обновлена.');

        return redirect(route('productCategories.edit', $id));
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('productCategories.index'));
        }

        $this->productCategoryRepository->delete($id);

        Flash::success('Категория успешно удалена.');

        return redirect(route('productCategories.show', $productCategory->type));
    }
}
