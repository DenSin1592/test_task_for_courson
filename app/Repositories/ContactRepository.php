<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Core\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


final class ContactRepository extends AbstractRepository
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


    public function create(array $data): Model
    {
        return $this->getBuilder()->create([...$data, ...['user_id' => \Auth::id()]]);
    }


    public function update(int $id, array $data): Model
    {
        $model = $this->getBuilder()
            ->where('user_id', \Auth::id())
            ->findOrFail($id);

        $model->update($data);

        return $model;
    }


    public function delete(int $id): bool|null
    {
        $model = $this->getBuilder()
            ->where('id', $id)
            ->where('user_id', \Auth::id())
            ->first();

        return $model?->delete();
    }


    public function findOrFail(int $id): Model
    {
        return $this->getBuilder()->where('user_id', \Auth::id())->findOrFail($id);
    }

}
