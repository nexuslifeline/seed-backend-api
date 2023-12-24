<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Utils\Constants;
use Illuminate\Support\Facades\Log;

class OrganizationRepository implements OrganizationRepositoryInterface
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
     * Update a organization by UUID.
     *
     * @param string $uuid The UUID of the organization.
     * @param array<mixed> $data The data to update the organization with.
     * @return \App\Models\Organization The updated organization.
     */
    public function update(string $uuid, array $data)
    {
        $organization = $this->findByUuid($uuid);
        $organization->update($data);
        return $organization;
    }


    /**
     * Deletes a organization by its UUID.
     *
     * @param string $uuid The UUID of the organization to be deleted.
     * @throws Some_Exception_Class If an error occurs while deleting the organization.
     * @return void
     */
    public function delete(string $uuid)
    {
        Log::info('Deleting organization with UUID: ' . $uuid);
        $organization = Organization::where('uuid', $uuid)->firstOrFail();
        $organization->delete();
    }

    /**
     * Finds an organization by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the organization is not found.
     * @return \App\Models\Organization The found organization.
     */
    public function find(string $uuid)
    {
        return Organization::where('uuid', $uuid)->firstOrFail();
    }

    /**
     * Finds a organization by its UUID.
     *
     * @param mixed $uuid The UUID of the organization.
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException If no organization is found.
     * @return Organization The Organization model instance.
     */
    public function findByUuid(string $uuid)
    {
        return Organization::where('uuid', $uuid)->firstOrFail();
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

    /**
     * Paginate the results of the query.
     *
     * @param int $perPage The number of items per page.
     * @throws Some_Exception_Class Description of exception.
     * @return \Illuminate\Contracts\Pagination\Paginator The paginated results.
     */
    public function paginate(?int $perPage = Constants::DEFAULT_PER_PAGE)
    {
        return Organization::paginate($perPage);
    }

    /**
     * Finds and paginates products by organization UUID.
     *
     * @param string $orgUuid The UUID of the organization.
     * @param int|null $perPage The number of items per page. Default is 25.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated products.
     */
    public function findByOrgUuidAndPaginate(string $orgUuid, ?int $perPage = Constants::DEFAULT_PER_PAGE)
    {
        return Organization::whereHas('organization', function ($q) use ($orgUuid) {
            $q->where('uuid', $orgUuid);
        })->paginate($perPage);
    }
}
