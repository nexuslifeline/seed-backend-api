<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Creates a new Product record in the database.
     *
     * @param array $data The data for creating the Product record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Product The newly created Product record.
     */
    public function create(array $data)
    {
        return Product::create($data);
    }


    /**
     * Update a product by UUID.
     *
     * @param string $uuid The UUID of the product.
     * @param array<mixed> $data The data to update the product with.
     * @return \App\Models\Product The updated product.
     */
    public function update(string $uuid, array $data)
    {
        $product = $this->findByUuid($uuid);
        $product->update($data);
        return $product;
    }


    /**
     * Deletes a product by its UUID.
     *
     * @param string $uuid The UUID of the product to be deleted.
     * @throws Some_Exception_Class If an error occurs while deleting the product.
     * @return void
     */
    public function delete(string $uuid)
    {
        Log::info('Deleting product with UUID: ' . $uuid);
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->delete();
    }

    /**
     * Finds an product by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the product is not found.
     * @return \App\Models\Product The found product.
     */
    public function find($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Finds a product by its UUID.
     *
     * @param mixed $uuid The UUID of the product.
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException If no product is found.
     * @return Product The Product model instance.
     */
    public function findByUuid($uuid)
    {
        return Product::where('uuid', $uuid)->firstOrFail();
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * Paginate the results of the query.
     *
     * @param int $perPage The number of items per page.
     * @throws Some_Exception_Class Description of exception.
     * @return \Illuminate\Contracts\Pagination\Paginator The paginated results.
     */
    public function paginate($perPage = 25)
    {
        return Product::paginate($perPage);
    }
}
