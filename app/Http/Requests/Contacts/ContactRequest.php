<?php

namespace App\Http\Requests\Contacts;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;


class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['favorite' => (bool)$this->favorite]);
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'nullable|string',
            'phone' => ['required', 'string', new PhoneNumber()],
            'favorite' => ContactFavoriteRequest::RULES,
        ];

        return $rules;
    }
}
