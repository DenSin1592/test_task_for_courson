<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Core\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository extends AbstractRepository
{
    protected function setModel(): void
    {
        $this->model = new Contact();
    }

    public function allForUser(): Collection
    {
        return \Auth::user()->contacts;
    }

    public function create(array $data): void
    {
        $this->getBuilder()->create($data);
    }
}
