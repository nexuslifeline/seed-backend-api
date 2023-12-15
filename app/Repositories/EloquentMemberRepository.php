<?php

namespace App\Repositories;

use App\Models\Member;

class EloquentMemberRepository implements MemberRepositoryInterface
{
    /**
     * Creates a new Member record in the database.
     *
     * @param array $data The data for creating the Member record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Member The newly created Member record.
     */
    public function create(array $data)
    {
        return Member::create($data);
    }

    /**
     * Updates an Member with the given data.
     *
     * @param Member $member The Member to update.
     * @param array $data The data to update the Member with.
     * @return Member The updated Member.
     */
    public function update(Member $member, array $data)
    {
        $member->update($data);
        return $member;
    }

    /**
     * Deletes an member.
     *
     * @param Member $member The member to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the member.
     */
    public function delete(Member $member)
    {
        $member->delete();
    }

    /**
     * Finds an member by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the member is not found.
     * @return \App\Models\Member The found member.
     */
    public function find($id)
    {
        return Member::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Member::all();
    }
}
