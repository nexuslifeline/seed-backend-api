<?php

namespace App\Repositories;

use App\Models\Member;

interface MemberRepositoryInterface
{
    public function create(array $data);

    public function update(Member $member, array $data);

    public function delete(Member $member);

    public function find($id);

    public function all();
}
