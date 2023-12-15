<?php

namespace App\Repositories;

use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function create(array $data);

    public function update(Admin $admin, array $data);

    public function delete(Admin $admin);

    public function find($id);

    public function all();
}
