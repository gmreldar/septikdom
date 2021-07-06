<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articleRepository->pushCriteria(new RequestCriteria($request));
        $articles = $this->articleRepository->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();

        if ($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image']);
        if ($request->has('seo_image'))
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image'], 1000);

        $article = $this->articleRepository->create($input);

        Flash::success('Статья успешно сохранена.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('admin.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('admin.articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param  int $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($article->image);
            Storage::disk('public_path')->delete('min/' . $article->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 1000);
        }

        if ($request->hasFile('discount_menu_img')) {
            if(isset($article->discount_menu_img)){
                Storage::disk('public_path')->delete($article->discount_menu_img);
                Storage::disk('public_path')->delete('min/' . $article->discount_menu_img);
            }
            $input['discount_menu_img'] = StorageController::saveImage('images', $input['discount_menu_img'], 1000);
        }

        if ($request->hasFile('discount_slider_img')) {
            if(isset($article->discount_slider_img)){
                Storage::disk('public_path')->delete($article->discount_slider_img);
                Storage::disk('public_path')->delete('min/' . $article->discount_slider_img);
            }
            $input['discount_slider_img'] = StorageController::saveImage('images', $input['discount_slider_img'], 1000);
        }

        if ($request->hasFile('seo_image')) {
            Storage::disk('public_path')->delete($article->seo_image);
            Storage::disk('public_path')->delete('min/' . $article->seo_image);
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);
        }
        $article = $this->articleRepository->update($input, $id);

        Flash::success('Статья успешно обновлена.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success('Статья успешно удалена.');

        return redirect(route('articles.index'));
    }
}
