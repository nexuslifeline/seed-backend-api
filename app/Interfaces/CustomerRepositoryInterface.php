<?php

namespace App\Repositories;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function create(array $data);

    public function update(Customer $customer, array $data);

    public function delete(Customer $customer);

    public function find($id);

    public function all();
}
