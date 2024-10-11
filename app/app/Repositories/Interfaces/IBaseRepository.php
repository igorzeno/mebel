<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    public function create(array $atrr = []): Model;

    public function find(int $id): ?Model;

    public function update(array $atrr = [], int $id): bool;

    public function destroy(int $id): bool;

    public function all(): Collection;

}
