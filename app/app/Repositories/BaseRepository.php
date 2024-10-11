<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $atrr = []): Model
    {
        return $this->model->create($atrr);
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function update(array $atrr = [], int $id): bool
    {
        $res = $this->model->find($id);
        if($res)
            return $res->update($atrr);
        else
            return false;
    }

    public function destroy(int $id): bool
    {
        $res = $this->model->find($id);
        if($res)
            return $res->delete();
        else
            return false;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
