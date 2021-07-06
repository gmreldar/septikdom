<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Repositories\LicenseRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LicenseController extends AppBaseController
{
    /** @var  LicenseRepository */
    private $licenseRepository;

    public function __construct(LicenseRepository $licenseRepo)
    {
        $this->licenseRepository = $licenseRepo;
    }

    /**
     * Display a listing of the License.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->licenseRepository->pushCriteria(new RequestCriteria($request));
        $licenses = $this->licenseRepository->orderBy('ord')->all();

        return view('admin.licenses.index')
            ->with('licenses', $licenses);
    }

    /**
     * Show the form for creating a new License.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.licenses.create');
    }

    /**
     * Store a newly created License in storage.
     *
     * @param CreateLicenseRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 1500, 300);

        $license = $this->licenseRepository->create($input);

        Flash::success('Запись успешно сохранена.');

        return redirect(route('licenses.index'));
    }

    /**
     * Display the specified License.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $license = $this->licenseRepository->findWithoutFail($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        return view('admin.licenses.show')->with('license', $license);
    }

    /**
     * Show the form for editing the specified License.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $license = $this->licenseRepository->findWithoutFail($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        return view('admin.licenses.edit')->with('license', $license);
    }

    /**
     * Update the specified License in storage.
     *
     * @param  int              $id
     * @param UpdateLicenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseRequest $request)
    {
        $license = $this->licenseRepository->findWithoutFail($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($license->image);
            Storage::disk('public_path')->delete('min/' . $license->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 1500, 300);
        }
        $license = $this->licenseRepository->update($input, $id);

        Flash::success('Запись успешно обновлена.');

        return redirect(route('licenses.index'));
    }

    /**
     * Remove the specified License from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $license = $this->licenseRepository->findWithoutFail($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        $this->licenseRepository->delete($id);

        Flash::success('Запись успешно удалена.');

        return redirect(route('licenses.index'));
    }
}
