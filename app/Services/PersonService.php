<?php

namespace App\Services;

use App\Events\PersonCaptured;
use App\Models\ContactDetail;
use App\Models\IdentityDocument;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Facades\Log;

class PersonService
{
    public function __construct(
        protected PersonRepositoryInterface $personRepository
    ) {}

    public function getAllPeople()
    {
        return $this->personRepository->getAll();
    }

    public function findPerson(int $id)
    {
        return $this->personRepository->findById($id);
    }

    public function createPerson(array $data)
    {
        $person = $this->personRepository->create($data);

        ContactDetail::create([
            'person_id'    => $person->id,
            'email_address' => $data['email_address'],
            'mobile_number' => $data['mobile_number'],
        ]);

        IdentityDocument::create([
            'person_id'    => $person->id,
            'sa_id_number' => $data['sa_id_number'],
        ]);

        if (!empty($data['interests'])) {
            $person->interests()->sync($data['interests']);
        }

        event(new PersonCaptured($person));

        return $person;
    }

    public function updatePerson(int $id, array $data)
    {
        $this->personRepository->update($id, $data);
        $person = $this->personRepository->findById($id);

        $person->contactDetail->update([
            'email_address' => $data['email_address'],
            'mobile_number' => $data['mobile_number'],
        ]);

        $person->identityDocument->update([
            'sa_id_number' => $data['sa_id_number'],
        ]);

        if (!empty($data['interests'])) {
            $person->interests()->sync($data['interests']);
        }

        return $person;
    }

    public function deletePerson(int $id)
    {
        $person = $this->personRepository->findById($id);

        Log::info('Person deleted', [
            'deleted_by'  => auth()->user()->name,
            'person_name' => $person->name . ' ' . $person->surname,
            'deleted_at'  => now()->toDateTimeString(),
        ]);

        $name = $person->name . ' ' . $person->surname;
        $this->personRepository->delete($id);

        return $name;
    }
}