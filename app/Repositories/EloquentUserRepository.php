<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Creates a new User record in the database.
     *
     * @param array $data The data for creating the User record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return User The newly created User record.
     */
    public function create(array $data)
    {
        return User::create($data);
    }

    /**
     * Updates an User with the given data.
     *
     * @param User $user The User to update.
     * @param array $data The data to update the User with.
     * @return User The updated User.
     */
    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    /**
     * Deletes an user.
     *
     * @param User $user The user to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the user.
     */
    public function delete(User $user)
    {
        $user->delete();
    }

    /**
     * Finds an user by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user is not found.
     * @return \App\Models\User The found user.
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return User::all();
    }
}
