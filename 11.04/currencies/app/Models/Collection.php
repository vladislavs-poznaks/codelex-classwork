<?php

namespace App\Models;

abstract class Collection
{
    protected $model;
    protected array $models = [];

    public function __construct(array $models)
    {
        foreach ($models as $model) {
            $this->add($this->model::create($model));
        }
    }

    public function all(): array
    {
        return $this->models;
    }

    public function add(ModelInterface $model): void
    {
        $this->models[] = $model;
    }

    public function pluck(string $parameter): array
    {
        $parameters = [];

        foreach ($this->all() as $model) {
            $parameters[] = $model->$parameter();
        }

        return $parameters;
    }

}