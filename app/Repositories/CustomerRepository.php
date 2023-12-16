<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * Creates a new Customer record in the database.
     *
     * @param array $data The data for creating the Customer record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Customer The newly created Customer record.
     */
    public function create(array $data)
    {
        return Customer::create($data);
    }

    /**
     * Updates an Customer with the given data.
     *
     * @param Customer $customer The Customer to update.
     * @param array $data The data to update the Customer with.
     * @return Customer The updated Customer.
     */
    public function update(Customer $customer, array $data)
    {
        $customer->update($data);
        return $customer;
    }

    /**
     * Deletes an customer.
     *
     * @param Customer $customer The customer to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the customer.
     */
    public function delete(Customer $customer)
    {
        $customer->delete();
    }

    /**
     * Finds an customer by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the customer is not found.
     * @return \App\Models\Customer The found customer.
     */
    public function find($id)
    {
        return Customer::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Customer::all();
    }
}
