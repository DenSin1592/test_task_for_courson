<?php

namespace App\Console\Commands;

use App\Console\AbstractCommand;
use App\Models\User;


class ApiTokenGeneration extends AbstractCommand
{
    private const SIGNATURE = 'app:api.user-token-generation {user : The ID of the user}}';

    protected $signature = self::SIGNATURE;
    protected $description = 'Api user token generate';

    public function handleCommand(): void
    {
        $userId = $this->argument('user');

        $token = (User::find($userId))?->createToken('api_token');

        $this->info('Bearer '. $token->plainTextToken);

    }
}
