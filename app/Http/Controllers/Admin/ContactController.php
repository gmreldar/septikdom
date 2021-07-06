<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StorageController;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactController extends AppBaseController
{
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactRepository->pushCriteria(new RequestCriteria($request));
        $contacts = $this->contactRepository->all();

        return view('admin.contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();

        if($request->has('image'))
            $input['image'] = StorageController::saveImage('images', $input['image'], 1700);
        if($request->has('about_image'))
            $input['about_image'] = StorageController::saveImage('images', $input['about_image'], 1700);

        $contact = $this->contactRepository->create($input);

        Flash::success('Contact saved successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('admin.contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Настройки не найдены');

            return redirect(route('contacts.index'));
        }

        return view('admin.contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  int              $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Настройки не найдены');

            return redirect(route('contacts.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public_path')->delete($contact->image);
            Storage::disk('public_path')->delete('min/' . $contact->image);
            $input['image'] = StorageController::saveImage('images', $input['image'], 1700);
        }
        if ($request->hasFile('about_image')) {
            Storage::disk('public_path')->delete($contact->about_image);
            Storage::disk('public_path')->delete('min/' . $contact->about_image);
            $input['about_image'] = StorageController::saveImage('images', $input['about_image'], 1700);
        }
        $contact = $this->contactRepository->update($input, $id);

        Flash::success('Настройки успешно сохранены');
        Cache::forget('contact');

        return redirect(route('contacts.edit', $id));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contacts.index'));
    }
}
