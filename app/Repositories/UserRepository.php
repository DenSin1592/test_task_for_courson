<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Core\AbstractRepository;



final class UserRepository extends AbstractRepository
{
    protected function setModel(): void
    {
        $this->model = new User();
    }
}
