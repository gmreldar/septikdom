<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateModificationRequest;
use App\Http\Requests\UpdateModificationRequest;
use App\Repositories\ModificationRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\ProductCategory;
use App\Models\Product;

class ModificationController extends AppBaseController
{
    /** @var  ModificationRepository */
    private $modificationRepository;

    public function __construct(ModificationRepository $modificationRepo)
    {
        $this->modificationRepository = $modificationRepo;
    }

    /**
     * Display a listing of the Modification.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modificationRepository->pushCriteria(new RequestCriteria($request));
        $modifications = $this->modificationRepository->paginate(20);

        return view('admin.modifications.index')
            ->with('modifications', $modifications);
    }

    /**
     * Show the form for creating a new Modification.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $product_id = $request->all();
        $product_id = $product_id['product_id'];
        $product = Product::find($product_id);

        $product_category_id = $product->product_category_id;
        $product_category = ProductCategory::find($product_category_id);
        $type = $product_category->type;

        return view('admin.modifications.create', compact('type'))
            ->with('product_id', $request->input('product_id'));
    }

    /**
     * Store a newly created Modification in storage.
     *
     * @param CreateModificationRequest $request
     *
     * @return Response
     */
    public function store(CreateModificationRequest $request)
    {
        $input = $request->all();

        $modification = $this->modificationRepository->create($input);

        Flash::success('Модификация успешно сохранена.');

        return redirect(route('products.edit', $input['product_id']));
    }

    /**
     * Display the specified Modification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            Flash::error('Модификация не найдена');

            return redirect(route('modifications.index'));
        }

        return view('admin.modifications.show')->with('modification', $modification);
    }

    /**
     * Show the form for editing the specified Modification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            Flash::error('Модификация не найдена');

            return redirect(route('modifications.index'));
        }

        return view('admin.modifications.edit')->with('modification', $modification);
    }

    /**
     * Update the specified Modification in storage.
     *
     * @param  int              $id
     * @param UpdateModificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModificationRequest $request)
    {
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            Flash::error('Модификация не найдена');

            return redirect(route('modifications.index'));
        }

        $input = $request->all();
        $modification = $this->modificationRepository->update($input, $id);

        Flash::success('Модификация успешно обновлена.');

        //return redirect(route('modifications.index'));
        return redirect(route('products.edit', $input['product_id']));
    }

    /**
     * Remove the specified Modification from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            Flash::error('Модификация не найдена.');

            return redirect(route('modifications.index'));
        }

        $this->modificationRepository->delete($id);

        Flash::success('Модификация успешно удалена.');

        //return redirect(route('modifications.index'));
        return redirect(route('products.edit', $modification->product_id));
    }
}
