<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

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
        $languages = $this->personService->getAllLanguages();
        $interests  = $this->personService->getAllInterests();
        return view('people.create', compact('languages', 'interests'));
    }

    public function store(StorePersonRequest $request)
    {
        $data = $request->validated();

        $this->personService->createPerson($data);

        return redirect()->route('people.index')->with('success', 'New person added!');
    }

    public function edit(int $id)
    {
        $person    = $this->personService->findPerson($id);
        $languages = $this->personService->getAllLanguages();
        $interests  = $this->personService->getAllInterests();
        return view('people.edit', compact('person', 'languages', 'interests'));
    }


    public function update(UpdatePersonRequest $request, int $id)
    {
        $data = $request->validated();

        $this->personService->updatePerson($id, $data);

        return redirect()->route('people.index')->with('success', 'Person updated!');
    }

    public function destroy(int $id)
    {
        $name = $this->personService->deletePerson($id);
        return redirect()->route('people.index')->with('success', $name . ' was removed from the system.');
    }
}