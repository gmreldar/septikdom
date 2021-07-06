<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateModificationAPIRequest;
use App\Http\Requests\API\UpdateModificationAPIRequest;
use App\Models\Modification;
use App\Repositories\ModificationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ModificationController
 * @package App\Http\Controllers\API
 */

class ModificationAPIController extends AppBaseController
{
    /** @var  ModificationRepository */
    private $modificationRepository;

    public function __construct(ModificationRepository $modificationRepo)
    {
        $this->modificationRepository = $modificationRepo;
    }

    /**
     * Display a listing of the Modification.
     * GET|HEAD /modifications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modificationRepository->pushCriteria(new RequestCriteria($request));
        $this->modificationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $modifications = $this->modificationRepository->all();

        return $this->sendResponse($modifications->toArray(), 'Modifications retrieved successfully');
    }

    /**
     * Store a newly created Modification in storage.
     * POST /modifications
     *
     * @param CreateModificationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateModificationAPIRequest $request)
    {
        $input = $request->all();

        $modifications = $this->modificationRepository->create($input);

        return $this->sendResponse($modifications->toArray(), 'Модификация успешно сохранена.');
    }

    /**
     * Display the specified Modification.
     * GET|HEAD /modifications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Modification $modification */
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            return $this->sendError('Модификация не найдена');
        }

        return $this->sendResponse($modification->toArray(), 'Modification retrieved successfully');
    }

    /**
     * Update the specified Modification in storage.
     * PUT/PATCH /modifications/{id}
     *
     * @param  int $id
     * @param UpdateModificationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModificationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Modification $modification */
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            return $this->sendError('Модификация не найдена');
        }

        $modification = $this->modificationRepository->update($input, $id);

        return $this->sendResponse($modification->toArray(), 'Модификация успешно обновлена.');
    }

    /**
     * Remove the specified Modification from storage.
     * DELETE /modifications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Modification $modification */
        $modification = $this->modificationRepository->findWithoutFail($id);

        if (empty($modification)) {
            return $this->sendError('Модификация не найдена');
        }

        $modification->delete();

        return $this->sendResponse($id, 'Модификация успешно удалена.');
    }
}
