<?php

namespace App\Http\Requests\Contacts;


class ContactFavoriteRequest extends ContactRequest
{
    public const RULES = 'boolean';

    public function rules(): array
    {
        $rules = [
            'favorite' => self::RULES,
        ];

        return $rules;
    }
}
