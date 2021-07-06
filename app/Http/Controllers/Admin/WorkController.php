<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Repositories\WorkRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkController extends AppBaseController
{
    /** @var  WorkRepository */
    private $workRepository;

    public function __construct(WorkRepository $workRepo)
    {
        $this->workRepository = $workRepo;
    }

    /**
     * Display a listing of the Work.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workRepository->pushCriteria(new RequestCriteria($request));
        $works = $this->workRepository->orderBy('ord')->all();

        return view('admin.works.index')
            ->with('works', $works);
    }

    /**
     * Show the form for creating a new Work.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * Store a newly created Work in storage.
     *
     * @param CreateWorkRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 1000, 300);
        if($request->has('seo_image'))
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);
        $work = $this->workRepository->create($input);

        Flash::success('Работа успешно сохранена.');

        return redirect(route('works.index'));
    }

    /**
     * Display the specified Work.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $work = $this->workRepository->findWithoutFail($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        return view('admin.works.show')->with('work', $work);
    }

    /**
     * Show the form for editing the specified Work.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $work = $this->workRepository->findWithoutFail($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        return view('admin.works.edit')->with('work', $work);
    }

    /**
     * Update the specified Work in storage.
     *
     * @param  int              $id
     * @param UpdateWorkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkRequest $request)
    {
        $work = $this->workRepository->findWithoutFail($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($work->image);
            Storage::disk('public_path')->delete('min/' . $work->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 1000, 300);
        }
        if ($request->hasFile('seo_image')) {
            Storage::disk('public_path')->delete($work->seo_image);
            Storage::disk('public_path')->delete('min/' . $work->seo_image);
            $input['seo_image'] = StorageController::saveImage('images', $input['seo_image']);
        }
        $work = $this->workRepository->update($input, $id);

        Flash::success('Работа успешно обновлена.');

        return redirect(route('works.index'));
    }

    /**
     * Remove the specified Work from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $work = $this->workRepository->findWithoutFail($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        $this->workRepository->delete($id);

        Flash::success('Работа успешно удалена.');

        return redirect(route('works.index'));
    }
}
