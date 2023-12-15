<?php

namespace App\Repositories;

use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
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
     * Updates an Product with the given data.
     *
     * @param Product $product The Product to update.
     * @param array $data The data to update the Product with.
     * @return Product The updated Product.
     */
    public function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    /**
     * Deletes an product.
     *
     * @param Product $product The product to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the product.
     */
    public function delete(Product $product)
    {
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
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::all();
    }
}
