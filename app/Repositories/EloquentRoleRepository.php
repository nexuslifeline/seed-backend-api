<?php

namespace App\Repositories;

use App\Models\Role;

class EloquentRoleRepository implements RoleRepositoryInterface
{
    /**
     * Creates a new Role record in the database.
     *
     * @param array $data The data for creating the Role record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Role The newly created Role record.
     */
    public function create(array $data)
    {
        return Role::create($data);
    }

    /**
     * Updates an Role with the given data.
     *
     * @param Role $role The Role to update.
     * @param array $data The data to update the Role with.
     * @return Role The updated Role.
     */
    public function update(Role $role, array $data)
    {
        $role->update($data);
        return $role;
    }

    /**
     * Deletes an role.
     *
     * @param Role $role The role to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the role.
     */
    public function delete(Role $role)
    {
        $role->delete();
    }

    /**
     * Finds an role by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the role is not found.
     * @return \App\Models\Role The found role.
     */
    public function find($id)
    {
        return Role::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Role::all();
    }
}
