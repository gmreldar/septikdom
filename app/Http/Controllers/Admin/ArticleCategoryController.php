<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Repositories\ArticleCategoryRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ArticleCategoryController extends AppBaseController
{
    /** @var  ArticleCategoryRepository */
    private $articleCategoryRepository;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryRepository = $articleCategoryRepo;
    }

    /**
     * Display a listing of the ArticleCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articleCategoryRepository->pushCriteria(new RequestCriteria($request));
        $articleCategories = $this->articleCategoryRepository->orderBy('ord')->all();

        return view('admin.article_categories.index')
            ->with('articleCategories', $articleCategories);
    }

    /**
     * Show the form for creating a new ArticleCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.article_categories.create');
    }

    /**
     * Store a newly created ArticleCategory in storage.
     *
     * @param CreateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleCategoryRequest $request)
    {
        $input = $request->all();

        if($request->has('seo_image'))
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);

        $articleCategory = $this->articleCategoryRepository->create($input);

        Flash::success('Категория успешно сохранена.');

        return redirect(route('articleCategories.index'));
    }

    /**
     * Display the specified ArticleCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('articleCategories.index'));
        }

        return view('admin.article_categories.show')->with('articleCategory', $articleCategory);
    }

    /**
     * Show the form for editing the specified ArticleCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('articleCategories.index'));
        }

        return view('admin.article_categories.edit')->with('articleCategory', $articleCategory);
    }

    /**
     * Update the specified ArticleCategory in storage.
     *
     * @param  int              $id
     * @param UpdateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleCategoryRequest $request)
    {
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('articleCategories.index'));
        }

        $input = $request->all();
        if ($request->hasFile('seo_image')) {
            Storage::disk('public_path')->delete($articleCategory->seo_image);
            Storage::disk('public_path')->delete('min/' . $articleCategory->seo_image);
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);
        }
        $articleCategory = $this->articleCategoryRepository->update($input, $id);

        Flash::success('Категория успешно обновлена.');

        return redirect(route('articleCategories.index'));
    }

    /**
     * Remove the specified ArticleCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articleCategory = $this->articleCategoryRepository->findWithoutFail($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('articleCategories.index'));
        }

        $this->articleCategoryRepository->delete($id);

        Flash::success('Категория успешно удалена.');

        return redirect(route('articleCategories.index'));
    }
}
