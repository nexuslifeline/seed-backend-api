<?php

namespace App\Repositories;

use App\Models\Unit;

interface UnitRepositoryInterface
{
    public function create(array $data);

    public function update(Unit $unit, array $data);

    public function delete(Unit $unit);

    public function find($id);

    public function all();
}
