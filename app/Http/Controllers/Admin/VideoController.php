<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VideoController extends AppBaseController
{
    /** @var  VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videoRepository->pushCriteria(new RequestCriteria($request));
        $videos = $this->videoRepository->orderBy('ord')->all();

        return view('admin.videos.index')
            ->with('videos', $videos);
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 400);
        $video = $this->videoRepository->create($input);

        Flash::success('Видео успешно сохранено.');

        return redirect(route('videos.index'));
    }

    /**
     * Display the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Запиьс не найдена.');

            return redirect(route('videos.index'));
        }

        return view('admin.videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Запиьс не найдена.');

            return redirect(route('videos.index'));
        }

        return view('admin.videos.edit')->with('video', $video);
    }

    /**
     * Update the specified Video in storage.
     *
     * @param  int              $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Запиьс не найдена.');

            return redirect(route('videos.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($video->image);
            Storage::disk('public_path')->delete('min/' . $video->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 400);
        }
        $video = $this->videoRepository->update($input, $id);

        Flash::success('Видео успешно обновлено.');

        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Запись не найдена.');

            return redirect(route('videos.index'));
        }

        $this->videoRepository->delete($id);

        Flash::success('Видео успешно удалено.');

        return redirect(route('videos.index'));
    }
}
