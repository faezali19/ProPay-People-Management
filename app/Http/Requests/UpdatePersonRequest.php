<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('person');

        return [
            'name'          => 'required|max:255',
            'surname'       => 'required|max:255',
            'sa_id_number'  => 'required|digits:13|unique:identity_documents,sa_id_number,' . $id . ',person_id',
            'mobile_number' => 'required|digits:10',
            'email_address' => 'required|email|max:255|unique:contact_details,email_address,' . $id . ',person_id',
            'birth_date'    => 'required|date',
            'language_id'   => 'required|exists:languages,id',
            'interests'     => 'nullable|array',
            'interests.*'   => 'exists:interests,id',
        ];
    }
}