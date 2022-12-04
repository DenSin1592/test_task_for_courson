<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Core\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


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


    public function allFavoriteForUser(): Collection
    {
        return \Auth::user()->contacts()->where('favorite', true)->get();
    }


    public function create(array $data): void
    {
        $this->getBuilder()->create($data);
    }


    public function findOrFail(int $id): Model
    {
        return $this->getBuilder()->where('user_id', \Auth::id())->findOrFail($id);
    }

}
