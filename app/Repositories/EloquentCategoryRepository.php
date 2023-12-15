<?php

namespace App\Repositories;

use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Creates a new Category record in the database.
     *
     * @param array $data The data for creating the Category record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Category The newly created Category record.
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * Updates an Category category with the given data.
     *
     * @param Category $category The Category category to update.
     * @param array $data The data to update the Category category with.
     * @return Category The updated Category category.
     */
    public function update(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    /**
     * Deletes an category.
     *
     * @param Category $category The category to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the category.
     */
    public function delete(Category $category)
    {
        $category->delete();
    }

    /**
     * Finds an category by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the category is not found.
     * @return \App\Models\Category The found category.
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Category::all();
    }
}
