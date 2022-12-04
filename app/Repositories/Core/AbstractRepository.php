<?php

namespace App\Repositories\Core;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;


abstract class AbstractRepository
{
    protected Model $model;

    abstract protected function setModel(): void;

    public function __construct()
    {
        $this->setModel();
    }

    protected function getBuilder(): Builder
    {
        return (clone $this->model)->query();
    }
}
