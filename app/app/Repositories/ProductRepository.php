<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent:: __construct($model);
    }

    public function all(): Collection
    {
        return $this->model->with('categories')->get()->sortByDesc('id');
    }

    public function create(array $atrr = []): Model
    {
        $result = $this->model->create($atrr);
        if($atrr['categories'])
            $result->categories()->sync($atrr['categories']);
        return $result;
    }

    public function find(int $id): ?Model
    {
        return $this->model->with('categories')->find($id);
    }
}
