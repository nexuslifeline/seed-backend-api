<?php

namespace App\Repositories;

use App\Models\Organization;

interface OrganizationRepositoryInterface
{
    public function create(array $data);

    public function update(Organization $organization, array $data);

    public function delete(Organization $organization);

    public function find($id);

    public function findByUuid($uuid);

    public function all();
}
