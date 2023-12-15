<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function create(array $data);

    public function update(Category $category, array $data);

    public function delete(Category $category);

    public function find($id);

    public function all();
}
