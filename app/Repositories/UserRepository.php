<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\User;
use App\Repositories\Core\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


final class UserRepository extends AbstractRepository
{

    protected function setModel(): void
    {
        $this->model = new User();
    }
}
