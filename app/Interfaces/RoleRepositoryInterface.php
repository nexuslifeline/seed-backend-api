<?php

namespace App\Repositories;

use App\Models\Role;

interface RoleRepositoryInterface
{
    public function create(array $data);

    public function update(Role $role, array $data);

    public function delete(Role $role);

    public function find($id);

    public function all();
}
