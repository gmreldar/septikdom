<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Bestsellers;
use App\Models\Product;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PageController extends AppBaseController
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $pages = $this->pageRepository->all();

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    public function bestsellers(Request $request)
    {
        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $products = Bestsellers::all();
        $septics = Product::all();

        foreach ($products as $key => $product) {
            $products[$key]['product'] = Product::find($product['product_id']);
        }

        return view('admin.pages.bestsellers.index')
            ->with(compact('products', 'septics'));
    }

    public function bestsellers_save(Request $request)
    {
        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $request = $request->all();
        Bestsellers::truncate();
        foreach ($request['bestseller'] as $p) {
            Bestsellers::create(['product_id' => $p['product_id']]);
        }

        return redirect(route('pages.bestsellers'));
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        if ($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image']);

        $page = $this->pageRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Запись не найдена.');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Запись не найдена.');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Запись не найдена.');

            return redirect(route('pages.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($page->image);
            Storage::disk('public_path')->delete('min/' . $page->image);
            $input['image'] = StorageController::saveImage('images', $input['image']);
        }
        $page = $this->pageRepository->update($input, $id);

        Flash::success('Запись успешно обновлена.');

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Запись не найдена.');

            return redirect(route('pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success('Запись успешно удалена.');

        return redirect(route('pages.index'));
    }
}
