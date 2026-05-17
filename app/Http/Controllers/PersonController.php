<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Mail\PersonAdded;
use Illuminate\Support\Facades\Mail;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::latest()->paginate(15); // this shows the latest added people first and paginates the results to 20 per page.
        return view('people.index', ['people' => $people]);
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'sa_id_number' => 'required|digits:13|unique:people',
            'mobile_number' => 'required|digits:10',
            'email_address' => 'required|email|max:255|unique:people',
            'birth_date' => 'required|date',
            'language' => 'required|max:255',
            'interests' => 'nullable',
        ]);

        $input['interests'] = implode(', ', $request->input('interests', []));

        $person = Person::create($input);
        Mail::to($input['email_address'])->send(new PersonAdded($person));
        return redirect()->route('people.index')->with('success', 'New person added!');
    }

    public function edit(string $id)
    {
        $person = Person::find($id);
        if (!$person)
        {
            return redirect()->route('people.index')->with('error', 'Person not found!');
        }
        return view('people.edit', ['person' => $person]);
    }

    public function update(Request $request, string $id)
    {
        $person = Person::find($id);
        if (!$person)
        {
            return redirect()->route('people.index')->with('error', 'Person not found!');
        }
            $input = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'sa_id_number' => 'required|digits:13|unique:people,sa_id_number,'.$id,
            'mobile_number' => 'required|digits:10',
            'email_address' => 'required|email|max:255|unique:people,email_address,'.$id,
            'birth_date' => 'required|date',
            'language' => 'required|max:255',
            'interests' => 'nullable',
        ]);

        $input['interests'] = implode(', ', $request->input('interests', []));
        $person->update($input);
        return redirect()->route('people.index')->with('success', 'Person updated!');
    }

    public function destroy(string $id)
    {
        $person = Person::find($id);
        if (!$person) 
        {
            return redirect()->route('people.index')->with('error', 'Person not found!');
        }

        // logging the deletion before removing from database
        \Log::info('Person deleted', [
            'deleted_by' => auth()->user()->name,
            'person_name' => $person->name . ' ' . $person->surname,
            'person_email' => $person->email_address,
            'sa_id' => $person->sa_id_number,
            'deleted_at' => now()->toDateTimeString(),
        ]);

        $name = $person->name . ' ' . $person->surname;
        $person->delete();
        return redirect()->route('people.index')->with('success', $name . ' was removed from the system.');
    }
}
