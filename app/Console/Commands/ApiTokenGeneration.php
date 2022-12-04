<?php

namespace App\Console\Commands;

use App\Console\AbstractCommand;
use App\Repositories\UserRepository;


class ApiTokenGeneration extends AbstractCommand
{
    private const SIGNATURE = 'app:api.user-token-generation {user : The ID of the user}}';

    protected $signature = self::SIGNATURE;
    protected $description = 'Api user token generate';


    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
        parent::__construct();
    }


    public function handleCommand(): void
    {
        $userId = $this->argument('user');
        $user = $this->userRepository->findOrFail($userId);
        $token = $user->createToken('api_token');
        $this->info('Bearer '. $token->plainTextToken);
    }
}
