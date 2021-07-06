<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Repositories\FeedbackRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FeedbackController extends AppBaseController
{
    /** @var  FeedbackRepository */
    private $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepo)
    {
        $this->feedbackRepository = $feedbackRepo;
    }

    /**
     * Display a listing of the Feedback.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->feedbackRepository->pushCriteria(new RequestCriteria($request));
        $feedback = $this->feedbackRepository->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.feedback.index')
            ->with('feedback', $feedback);
    }

    /**
     * Show the form for creating a new Feedback.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.feedback.create');
    }

    /**
     * Store a newly created Feedback in storage.
     *
     * @param CreateFeedbackRequest $request
     *
     * @return Response
     */
    public function store(CreateFeedbackRequest $request)
    {
        $input = $request->all();

        $feedback = $this->feedbackRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('afeedback.index'));
    }

    /**
     * Display the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('afeedback.index'));
        }

        return view('admin.feedback.show')->with('feedback', $feedback);
    }

    /**
     * Show the form for editing the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('afeedback.index'));
        }

        return view('admin.feedback.edit')->with('feedback', $feedback);
    }

    /**
     * Update the specified Feedback in storage.
     *
     * @param  int              $id
     * @param UpdateFeedbackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeedbackRequest $request)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('afeedback.index'));
        }

        $feedback = $this->feedbackRepository->update($request->all(), $id);

        Flash::success('Запись успешно обновлена.');

        return redirect(route('afeedback.index'));
    }

    /**
     * Remove the specified Feedback from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('afeedback.index'));
        }

        $this->feedbackRepository->delete($id);

        Flash::success('Запись успешно удалена.');

        return redirect(route('afeedback.index'));
    }
}
