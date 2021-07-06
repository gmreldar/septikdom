<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTextAPIRequest;
use App\Http\Requests\API\UpdateTextAPIRequest;
use App\Models\Text;
use App\Repositories\TextRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TextController
 * @package App\Http\Controllers\API
 */

class TextAPIController extends AppBaseController
{
    /** @var  TextRepository */
    private $textRepository;

    public function __construct(TextRepository $textRepo)
    {
        $this->textRepository = $textRepo;
    }

    /**
     * Display a listing of the Text.
     * GET|HEAD /texts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->textRepository->pushCriteria(new RequestCriteria($request));
        $this->textRepository->pushCriteria(new LimitOffsetCriteria($request));
        $texts = $this->textRepository->all();

        return $this->sendResponse($texts->toArray(), 'Texts retrieved successfully');
    }

    /**
     * Store a newly created Text in storage.
     * POST /texts
     *
     * @param CreateTextAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTextAPIRequest $request)
    {
        $input = $request->all();

        $texts = $this->textRepository->create($input);

        return $this->sendResponse($texts->toArray(), 'Запись успешно сохранена.);
    }

    /**
     * Display the specified Text.
     * GET|HEAD /texts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Text $text */
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            return $this->sendError('Text not found');
        }

        return $this->sendResponse($text->toArray(), 'Text retrieved successfully');
    }

    /**
     * Update the specified Text in storage.
     * PUT/PATCH /texts/{id}
     *
     * @param  int $id
     * @param UpdateTextAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTextAPIRequest $request)
    {
        $input = $request->all();

        /** @var Text $text */
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            return $this->sendError('Text not found');
        }

        $text = $this->textRepository->update($input, $id);

        return $this->sendResponse($text->toArray(), 'Запись успешно обновлена.);
    }

    /**
     * Remove the specified Text from storage.
     * DELETE /texts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Text $text */
        $text = $this->textRepository->findWithoutFail($id);

        if (empty($text)) {
            return $this->sendError('Text not found');
        }

        $text->delete();

        return $this->sendResponse($id, 'Запись успешно удалена.);
    }
}
