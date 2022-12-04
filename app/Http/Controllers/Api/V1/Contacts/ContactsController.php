<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;

class ContactsController extends AbstractApiV1Controller
{
    public function __invoke()
    {
        return response()->json([
                [
                    'id' => 1,
                    'name' => 'alex',
                    'phone' => '123123123'
                ],
                [
                    'id' => 2,
                    'name' => 'David',
                    'phone' => '999999999'
                ],
            ]
        );
    }
}
