<?php

namespace App\Http\Requests;

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
        $this->merge(['user_id' => \Auth::id()]);
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'nullable|string',
            'phone' => ['required', 'string', new PhoneNumber()],
            'favorite' => 'boolean',
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
        ];

        return $rules;
    }
}
