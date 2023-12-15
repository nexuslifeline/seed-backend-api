<?php

namespace App\Repositories;

use App\Models\Admin;

class EloquentAdminRepository implements AdminRepositoryInterface
{
    /**
     * Creates a new Admin record in the database.
     *
     * @param array $data The data for creating the Admin record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Admin The newly created Admin record.
     */
    public function create(array $data)
    {
        return Admin::create($data);
    }

    /**
     * Updates an Admin with the given data.
     *
     * @param Admin $admin The Admin to update.
     * @param array $data The data to update the Admin with.
     * @return Admin The updated Admin.
     */
    public function update(Admin $admin, array $data)
    {
        $admin->update($data);
        return $admin;
    }

    /**
     * Deletes an admin admin.
     *
     * @param Admin $admin The admin admin to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the admin.
     */
    public function delete(Admin $admin)
    {
        $admin->delete();
    }

    /**
     * Finds an admin by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the admin is not found.
     * @return \App\Models\Admin The found admin.
     */
    public function find($id)
    {
        return Admin::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Admin::all();
    }
}
