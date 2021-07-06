<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\MapMarker;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MapController extends AppBaseController
{
    /** @var  ReviewRepository */
//    private $reviewRepository;
//
//    public function __construct(ReviewRepository $reviewRepo)
//    {
//        $this->reviewRepository = $reviewRepo;
//    }

    /**
     * Display a listing of the Review.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //    $this->reviewRepository->pushCriteria(new RequestCriteria($request));
        //$reviews = Review::orderBy('ord')->get();

        $markers = MapMarker::all();
        $markersMap = [];

        foreach ($markers as $marker) {
            $product = Product::find($marker->product_id);
            //$category = ProductCategory::find($product->product_category_id);
            $markersMap[] = [
                'id' => $marker->id,
                'lat' => $marker->lat,
                'lng' => $marker->lng,
                'product_title' => $product->name,
                'product_link' => route('products.edit', $marker->product_id),
                'price' => $marker->price,
                'comment' => $marker->comment,
            ];
        }

        return view('admin.map.index')
            ->with(compact('markers', 'markersMap'));
    }

    public function create(Request $request)
    {
        $products = Product::all();
        return view('admin.map.create')
            ->with(compact('products'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        foreach($input as $i){
            if($i == ''){
                Flash::error('Заполните все поля.');
                return redirect(route('admin.map.create'));
            }
        }
        Flash::success('Маркер успешно добавлен.');
        $input['comment'] = str_replace("\n", "<br>", $input['comment']);
        MapMarker::create($input);
        return redirect(route('admin.map'));
    }

    public function update($id, Request $request)
    {
        $marker = MapMarker::find($id);

        if ($marker == null) {
            Flash::error('Маркер не найден.');

            return redirect(route('admin.map'));
        }

        $input = $request->all();

        $marker->update($input);

        Flash::success('Маркер успешно обновлен.');

        return redirect(route('admin.map'));
    }

    public function edit($id)
    {
        $marker = MapMarker::find($id);
        $products = Product::all();

        if ($marker == null) {
            Flash::error('Маркер не найден.');

            return redirect(route('admin.map'));
        }

        return view('admin.map.edit')->with(compact('marker', 'products'));
    }

    public function destroy($id)
    {
        $marker = MapMarker::find($id);

        if ($marker == null) {
            Flash::error('Маркер не найден.');

            return redirect(route('admin.map'));
        }

        $marker->delete();

        Flash::success('Маркер успешно удален.');

        return redirect(route('admin.map'));
    }


//    /**
//     * Show the form for creating a new Review.
//     *
//     * @return Response
//     */
//    public function create()
//    {
//        return view('admin.reviews.create');
//    }
//
//    /**
//     * Store a newly created Review in storage.
//     *
//     * @param CreateReviewRequest $request
//     *
//     * @return Response
//     */
//    public function store(CreateReviewRequest $request)
//    {
//        $input = $request->all();
//
//        if($request->has('image'))
//            $input['image'] = StorageController::saveImage('images', $input['image'], 500);
//
//        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;
//        $review = $this->reviewRepository->create($input);
//
//        Flash::success('Запись успешно сохранена.');
//
//        return redirect(route('reviews.index'));
//    }
//
//    /**
//     * Display the specified Review.
//     *
//     * @param  int $id
//     *
//     * @return Response
//     */
//    public function show($id)
//    {
//        $review = $this->reviewRepository->findWithoutFail($id);
//
//        if (empty($review)) {
//            Flash::error('Запись не найдена.');
//
//            return redirect(route('reviews.index'));
//        }
//
//        return view('admin.reviews.show')->with('review', $review);
//    }
//
//    /**
//     * Show the form for editing the specified Review.
//     *
//     * @param  int $id
//     *
//     * @return Response
//     */
//    public function edit($id)
//    {
//        $review = $this->reviewRepository->findWithoutFail($id);
//
//        if (empty($review)) {
//            Flash::error('Запись не найдена.');
//
//            return redirect(route('reviews.index'));
//        }
//
//        return view('admin.reviews.edit')->with('review', $review);
//    }
//
//    /**
//     * Update the specified Review in storage.
//     *
//     * @param  int              $id
//     * @param UpdateReviewRequest $request
//     *
//     * @return Response
//     */
//    public function update($id, UpdateReviewRequest $request)
//    {
//        $review = $this->reviewRepository->findWithoutFail($id);
//
//        if (empty($review)) {
//            Flash::error('Запись не найдена.');
//
//            return redirect(route('reviews.index'));
//        }
//
//        $input = $request->all();
//        if ($request->hasFile('image')) {
//            Storage::disk('public_path')->delete($review->image);
//            Storage::disk('public_path')->delete('min/' . $review->image);
//            $input['image'] = StorageController::saveImage('images', $input['image'], 500);
//        }
//        $input['is_active'] = array_key_exists('is_active', $input) ? $input['is_active'] : 0;
//        $review = $this->reviewRepository->update($input, $id);
//
//        Flash::success('Запись успешно обновлена.');
//
//        return redirect(route('reviews.index'));
//    }
//
//    /**
//     * Remove the specified Review from storage.
//     *
//     * @param  int $id
//     *
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        $review = $this->reviewRepository->findWithoutFail($id);
//
//        if (empty($review)) {
//            Flash::error('Запись не найдена.');
//
//            return redirect(route('reviews.index'));
//        }
//
//        $this->reviewRepository->delete($id);
//
//        Flash::success('Запись успешно удалена.');
//
//        return redirect(route('reviews.index'));
//    }
}
