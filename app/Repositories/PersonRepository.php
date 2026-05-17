<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;

class PersonRepository implements PersonRepositoryInterface
{
    public function getAll()
    {
        return Person::with(['contactDetail', 'identityDocument', 'language', 'interests'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
    }

    public function findById(int $id)
    {
        return Person::with(['contactDetail', 'identityDocument', 'language', 'interests'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);
    }

    public function create(array $data): mixed
    {
        return Person::create([
            'user_id'     => auth()->id(),
            'language_id' => $data['language_id'],
            'name'        => $data['name'],
            'surname'     => $data['surname'],
            'birth_date'  => $data['birth_date'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $person = $this->findById($id);
        return $person->update([
            'language_id' => $data['language_id'],
            'name'        => $data['name'],
            'surname'     => $data['surname'],
            'birth_date'  => $data['birth_date'],
        ]);
    }

    public function delete(int $id): bool
    {
        $person = $this->findById($id);
        return $person->delete();
    }

    public function getAllLanguages()
    {
        return \App\Models\Language::all();
    }

    public function getAllInterests()
    {
        return \App\Models\Interest::all();
    }
}