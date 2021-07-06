<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateLogoSlideRequest;
use App\Http\Requests\UpdateLogoSlideRequest;
use App\Repositories\LogoSlideRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogoSlideController extends AppBaseController
{
    /** @var  LogoSlideRepository */
    private $logoSlideRepository;

    public function __construct(LogoSlideRepository $logoSlideRepo)
    {
        $this->logoSlideRepository = $logoSlideRepo;
    }

    /**
     * Display a listing of the LogoSlide.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->logoSlideRepository->pushCriteria(new RequestCriteria($request));
        $logoSlides = $this->logoSlideRepository->orderBy('ord')->all();

        return view('admin.logo_slides.index')
            ->with('logoSlides', $logoSlides);
    }

    /**
     * Show the form for creating a new LogoSlide.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.logo_slides.create');
    }

    /**
     * Store a newly created LogoSlide in storage.
     *
     * @param CreateLogoSlideRequest $request
     *
     * @return Response
     */
    public function store(CreateLogoSlideRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image']);

        $logoSlide = $this->logoSlideRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('logoSlides.index'));
    }

    /**
     * Display the specified LogoSlide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logoSlide = $this->logoSlideRepository->findWithoutFail($id);

        if (empty($logoSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('logoSlides.index'));
        }

        return view('admin.logo_slides.show')->with('logoSlide', $logoSlide);
    }

    /**
     * Show the form for editing the specified LogoSlide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logoSlide = $this->logoSlideRepository->findWithoutFail($id);

        if (empty($logoSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('logoSlides.index'));
        }

        return view('admin.logo_slides.edit')->with('logoSlide', $logoSlide);
    }

    /**
     * Update the specified LogoSlide in storage.
     *
     * @param  int              $id
     * @param UpdateLogoSlideRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogoSlideRequest $request)
    {
        $logoSlide = $this->logoSlideRepository->findWithoutFail($id);

        if (empty($logoSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('logoSlides.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($logoSlide->image);
            Storage::disk('public_path')->delete('min/' . $logoSlide->image);
            $input['image'] = StorageController::saveImage('images', $input['image']);
        }

        $logoSlide = $this->logoSlideRepository->update($input, $id);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('logoSlides.index'));
    }

    /**
     * Remove the specified LogoSlide from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logoSlide = $this->logoSlideRepository->findWithoutFail($id);

        if (empty($logoSlide)) {
            Flash::error('Запись не найдена');

            return redirect(route('logoSlides.index'));
        }

        $this->logoSlideRepository->delete($id);

        Flash::success('Запись успешно удалена');

        return redirect(route('logoSlides.index'));
    }
}
