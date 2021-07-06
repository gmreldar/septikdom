<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductImageAPIRequest;
use App\Http\Requests\API\UpdateProductImageAPIRequest;
use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductImageController
 * @package App\Http\Controllers\API
 */

class ProductImageAPIController extends AppBaseController
{
    /** @var  ProductImageRepository */
    private $productImageRepository;

    public function __construct(ProductImageRepository $productImageRepo)
    {
        $this->productImageRepository = $productImageRepo;
    }

    /**
     * Display a listing of the ProductImage.
     * GET|HEAD /productImages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productImageRepository->pushCriteria(new RequestCriteria($request));
        $this->productImageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productImages = $this->productImageRepository->all();

        return $this->sendResponse($productImages->toArray(), 'Product Images retrieved successfully');
    }

    /**
     * Store a newly created ProductImage in storage.
     * POST /productImages
     *
     * @param CreateProductImageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductImageAPIRequest $request)
    {
        $input = $request->all();

        $productImages = $this->productImageRepository->create($input);

        return $this->sendResponse($productImages->toArray(), 'Изображение успешно сохранено');
    }

    /**
     * Display the specified ProductImage.
     * GET|HEAD /productImages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductImage $productImage */
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            return $this->sendError('Изображение не найдено');
        }

        return $this->sendResponse($productImage->toArray(), 'Product Image retrieved successfully');
    }

    /**
     * Update the specified ProductImage in storage.
     * PUT/PATCH /productImages/{id}
     *
     * @param  int $id
     * @param UpdateProductImageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductImageAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductImage $productImage */
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            return $this->sendError('Изображение не найдено');
        }

        $productImage = $this->productImageRepository->update($input, $id);

        return $this->sendResponse($productImage->toArray(), 'Изображение успешно обновлено');
    }

    /**
     * Remove the specified ProductImage from storage.
     * DELETE /productImages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductImage $productImage */
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            return $this->sendError('Изображение не найдено');
        }

        $productImage->delete();

        return $this->sendResponse($id, 'Изображение успешно удалено');
    }
}
