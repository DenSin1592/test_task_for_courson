<?php

namespace App\Repositories\Core;

use Illuminate\Database\Eloquent\Model;


abstract class AbstractRepository
{
    protected Model $model;

    abstract protected function setModel(): void;

    public function __construct()
    {
        $this->setModel();
    }

    protected function getBuilder(): \Illuminate\Database\Eloquent\Builder
    {
        return (clone $this->model)->query();
    }
}
