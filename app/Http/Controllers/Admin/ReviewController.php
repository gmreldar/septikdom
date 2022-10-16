<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReviewController extends AppBaseController
{
    /** @var  ReviewRepository */
    private $reviewRepository;
    private $mimeTypeDeterminant;

    public function __construct(
        ReviewRepository $reviewRepo,
        \App\Services\MimeType\MimeTypeDeterminant $mimeTypeDeterminant
    ) {
        $this->reviewRepository = $reviewRepo;
        $this->mimeTypeDeterminant = $mimeTypeDeterminant;
    }

    /**
     * Display a listing of the Review.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reviewRepository->pushCriteria(new RequestCriteria($request));
        $reviews = Review::orderBy('id', 'desc')->get();

        return view('admin.reviews.index')
            ->with('reviews', $reviews);
    }

    /**
     * Show the form for creating a new Review.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created Review in storage.
     *
     * @param CreateReviewRequest $request
     *
     * @return Response
     */
    public function store(CreateReviewRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 500);

        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;
        $review = $this->reviewRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('reviews.index'));
    }

    /**
     * Display the specified Review.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $review = $this->reviewRepository->findWithoutFail($id);

        if (empty($review)) {
            Flash::error('Запись не найдена.');

            return redirect(route('reviews.index'));
        }

        return view('admin.reviews.show')->with('review', $review);
    }

    /**
     * Show the form for editing the specified Review.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $review = $this->reviewRepository->findWithoutFail($id);
        $mimeType = $this->mimeTypeDeterminant->determine($review->file);
        $mimeTitle = '';
        if ($mimeType == \App\Services\MimeType\Processors\ImageProcessor::TYPE) {
            $mimeTitle = 'Изображение';
        }
        if ($mimeType == \App\Services\MimeType\Processors\VideoProcessor::TYPE) {
            $mimeTitle = 'Видео';
        }
        if ($mimeType == \App\Services\MimeType\Processors\AudioProcessor::TYPE) {
            $mimeTitle = 'Аудио';
        }
        if (empty($review)) {
            Flash::error('Запись не найдена.');

            return redirect(route('reviews.index'));
        }

        return view('admin.reviews.edit', compact('review', 'mimeType', 'mimeTitle'));
    }

    /**
     * Update the specified Review in storage.
     *
     * @param  int              $id
     * @param UpdateReviewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReviewRequest $request)
    {
        $review = $this->reviewRepository->findWithoutFail($id);

        if (empty($review)) {
            Flash::error('Запись не найдена.');

            return redirect(route('reviews.index'));
        }

        $input = $request->all();
        if ($request->hasFile('file')) {
            Storage::disk('public_path')->delete($review->image);
            Storage::disk('public_path')->delete('min/' . $review->image);
            $mimeType = $this->mimeTypeDeterminant->determine($request->file('file'));
            //$input['file'] = StorageController::saveImage('avatars', $input['image'], 500);
            if ($mimeType == \App\Services\MimeType\Processors\ImageProcessor::TYPE) {
                $input['file'] = 'uploads/' .Storage::disk('uploads')->put('avatars', $request->file('file'));
                StorageController::saveMinImage($input['file'], 500, 100);
            }
            if ($mimeType == \App\Services\MimeType\Processors\VideoProcessor::TYPE) {
                $input['file'] = 'uploads/' .Storage::disk('uploads')->put('avatars', $request->file('file'));
            }
            if ($mimeType == \App\Services\MimeType\Processors\AudioProcessor::TYPE) {
                $input['file'] = 'uploads/' .Storage::disk('uploads')->put('audios', $request->file('file'));
            }
        }
        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;

        $review = $this->reviewRepository->update($input, $id);

        Flash::success('Запись успешно обновлена.');

        return redirect(route('reviews.index'));
    }

    /**
     * Remove the specified Review from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $review = $this->reviewRepository->findWithoutFail($id);

        if (empty($review)) {
            Flash::error('Запись не найдена.');

            return redirect(route('reviews.index'));
        }

        $this->reviewRepository->delete($id);

        Flash::success('Запись успешно удалена.');

        return redirect(route('reviews.index'));
    }
}
