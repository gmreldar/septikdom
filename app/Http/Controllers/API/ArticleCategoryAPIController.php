<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticleCategoryAPIRequest;
use App\Http\Requests\API\UpdateArticleCategoryAPIRequest;
use App\Models\ArticleCategory;
use App\Repositories\ArticleCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ArticleCategoryController
 * @package App\Http\Controllers\API
 */

class ArticleCategoryAPIController extends AppBaseController
{
    /** @var  ArticleCategoryRepository */
    private $articleCategoryRepository;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryRepository = $articleCategoryRepo;
    }

    /**
     * Display a listing of the ArticleCategory.
     * GET|HEAD /articleCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articleCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->articleCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $articleCategories = $this->articleCategoryRepository->all();

        return $this->sendResponse($articleCategories->toArray(), 'Article Categories retrieved successfully');
    }

    /**
     * Store a newly created ArticleCategory in storage.
     * POST /articleCategories
     *
     * @param CreateArticleCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleCategoryAPIRequest $request)
    {
        $input = $request->all();

        $articleCategories = $this->articleCategoryRepository->create($input);

        return $this->sendResponse($articleCategories->toArray(), 'Категория успешно сохранена.');
    }

    /**
     * Display the specified ArticleCategory.
     * GET|HEAD /articleCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ArticleCategory $articleCategory */
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            return $this->sendError('Article Category not found');
        }

        return $this->sendResponse($articleCategory->toArray(), 'Article Category retrieved successfully');
    }

    /**
     * Update the specified ArticleCategory in storage.
     * PUT/PATCH /articleCategories/{id}
     *
     * @param  int $id
     * @param UpdateArticleCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ArticleCategory $articleCategory */
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            return $this->sendError('Article Category not found');
        }

        $articleCategory = $this->articleCategoryRepository->update($input, $id);

        return $this->sendResponse($articleCategory->toArray(), 'ArticleCategory updated successfully');
    }

    /**
     * Remove the specified ArticleCategory from storage.
     * DELETE /articleCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ArticleCategory $articleCategory */
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            return $this->sendError('Article Category not found');
        }

        $articleCategory->delete();

        return $this->sendResponse($id, 'Категория успешно удалена.);
    }
}
