<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use App\Models\Language;
use App\Models\Interest;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct(protected PersonService $personService) {}

    public function index()
    {
        $people = $this->personService->getAllPeople();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        $languages = Language::all();
        $interests = Interest::all();
        return view('people.create', compact('languages', 'interests'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|max:255',
            'surname'       => 'required|max:255',
            'sa_id_number'  => 'required|digits:13|unique:identity_documents',
            'mobile_number' => 'required|digits:10',
            'email_address' => 'required|email|max:255|unique:contact_details',
            'birth_date'    => 'required|date',
            'language_id'   => 'required|exists:languages,id',
            'interests'     => 'nullable|array',
            'interests.*'   => 'exists:interests,id',
        ]);

        $this->personService->createPerson($data);

        return redirect()->route('people.index')->with('success', 'New person added!');
    }

    public function edit(int $id)
    {
        $person    = $this->personService->findPerson($id);
        $languages = Language::all();
        $interests = Interest::all();
        return view('people.edit', compact('person', 'languages', 'interests'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name'          => 'required|max:255',
            'surname'       => 'required|max:255',
            'sa_id_number'  => 'required|digits:13|unique:identity_documents,sa_id_number,' . $id . ',person_id',
            'mobile_number' => 'required|digits:10',
            'email_address' => 'required|email|max:255|unique:contact_details,email_address,' . $id . ',person_id',
            'birth_date'    => 'required|date',
            'language_id'   => 'required|exists:languages,id',
            'interests'     => 'nullable|array',
            'interests.*'   => 'exists:interests,id',
        ]);

        $this->personService->updatePerson($id, $data);

        return redirect()->route('people.index')->with('success', 'Person updated!');
    }

    public function destroy(int $id)
    {
        $name = $this->personService->deletePerson($id);
        return redirect()->route('people.index')->with('success', $name . ' was removed from the system.');
    }
}