<?php

namespace App\Repositories;

use App\Models\Organization;

class EloquentOrganizationRepository implements OrganizationRepositoryInterface
{
    /**
     * Creates a new Organization record in the database.
     *
     * @param array $data The data for creating the Organization record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Organization The newly created Organization record.
     */
    public function create(array $data)
    {
        return Organization::create($data);
    }

    /**
     * Updates an Organization with the given data.
     *
     * @param Organization $organization The Organization to update.
     * @param array $data The data to update the Organization with.
     * @return Organization The updated Organization.
     */
    public function update(Organization $organization, array $data)
    {
        $organization->update($data);
        return $organization;
    }

    /**
     * Deletes an organization.
     *
     * @param Organization $organization The organization to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the organization.
     */
    public function delete(Organization $organization)
    {
        $organization->delete();
    }

    /**
     * Finds an organization by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the organization is not found.
     * @return \App\Models\Organization The found organization.
     */
    public function find($id)
    {
        return Organization::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Organization::all();
    }
}
