<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateTextRequest;
use App\Http\Requests\UpdateTextRequest;
use App\Repositories\TextRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TextController extends AppBaseController
{
    /** @var  TextRepository */
    private $textRepository;

    public function __construct(TextRepository $textRepo)
    {
        $this->textRepository = $textRepo;
    }

    /**
     * Display a listing of the Text.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->textRepository->pushCriteria(new RequestCriteria($request));
        $texts = $this->textRepository->all();

        return view('admin.texts.index')
            ->with('texts', $texts);
    }

    /**
     * Show the form for creating a new Text.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.texts.create');
    }

    /**
     * Store a newly created Text in storage.
     *
     * @param CreateTextRequest $request
     *
     * @return Response
     */
    public function store(CreateTextRequest $request)
    {
        $input = $request->all();

        $text = $this->textRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('texts.index'));
    }

    /**
     * Display the specified Text.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            Flash::error('Text not found');

            return redirect(route('texts.index'));
        }

        return view('admin.texts.show')->with('text', $text);
    }

    /**
     * Show the form for editing the specified Text.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            Flash::error('Text not found');

            return redirect(route('texts.index'));
        }

        return view('admin.texts.edit')->with('text', $text);
    }

    /**
     * Update the specified Text in storage.
     *
     * @param  int              $id
     * @param UpdateTextRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTextRequest $request)
    {
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            Flash::error('Text not found');

            return redirect(route('texts.index'));
        }

        $text = $this->textRepository->update($request->all(), $id);

        Flash::success('Запись успешно обновлена.');

        return redirect(route('texts.index'));
    }

    /**
     * Remove the specified Text from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            Flash::error('Text not found');

            return redirect(route('texts.index'));
        }

        $this->textRepository->delete($id);

        Flash::success('Запись успешно удалена.');

        return redirect(route('texts.index'));
    }
}
