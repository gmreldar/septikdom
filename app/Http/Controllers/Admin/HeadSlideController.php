<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateHeadSlideRequest;
use App\Http\Requests\UpdateHeadSlideRequest;
use App\Repositories\HeadSlideRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HeadSlideController extends AppBaseController
{
    /** @var  HeadSlideRepository */
    private $headSlideRepository;

    public function __construct(HeadSlideRepository $headSlideRepo)
    {
        $this->headSlideRepository = $headSlideRepo;
    }

    /**
     * Display a listing of the HeadSlide.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->headSlideRepository->pushCriteria(new RequestCriteria($request));
        $headSlides = $this->headSlideRepository->orderBy('ord')->all();

        return view('admin.head_slides.index')
            ->with('headSlides', $headSlides);
    }

    /**
     * Show the form for creating a new HeadSlide.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.head_slides.create');
    }

    /**
     * Store a newly created HeadSlide in storage.
     *
     * @param CreateHeadSlideRequest $request
     *
     * @return Response
     */
    public function store(CreateHeadSlideRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image']);

        $headSlide = $this->headSlideRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('headSlides.index'));
    }

    /**
     * Display the specified HeadSlide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $headSlide = $this->headSlideRepository->findWithoutFail($id);

        if (empty($headSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('headSlides.index'));
        }

        return view('admin.head_slides.show')->with('headSlide', $headSlide);
    }

    /**
     * Show the form for editing the specified HeadSlide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $headSlide = $this->headSlideRepository->findWithoutFail($id);

        if (empty($headSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('headSlides.index'));
        }

        return view('admin.head_slides.edit')->with('headSlide', $headSlide);
    }

    /**
     * Update the specified HeadSlide in storage.
     *
     * @param  int              $id
     * @param UpdateHeadSlideRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHeadSlideRequest $request)
    {
        $headSlide = $this->headSlideRepository->findWithoutFail($id);

        if (empty($headSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('headSlides.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($headSlide->image);
            Storage::disk('public_path')->delete('min/' . $headSlide->image);
            $input['image'] = StorageController::saveImage('images', $input['image']);
        }

        $headSlide = $this->headSlideRepository->update($input, $id);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('headSlides.index'));
    }

    /**
     * Remove the specified HeadSlide from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $headSlide = $this->headSlideRepository->findWithoutFail($id);

        if (empty($headSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('headSlides.index'));
        }

        $this->headSlideRepository->delete($id);

        Flash::success('Запись успешно удалена');

        return redirect(route('headSlides.index'));
    }
}
