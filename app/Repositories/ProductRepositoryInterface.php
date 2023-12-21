<?php

namespace App\Repositories;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update(string $uuid, array $data);

    public function delete(string $uuid);

    public function find($id);

    public function findByUuid($uuid);

    public function all();

    public function paginate($perPage = 25);
}
