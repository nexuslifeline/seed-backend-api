<?php

namespace App\Repositories;

use App\Models\Unit;

class EloquentUnitRepository implements UnitRepositoryInterface
{
    /**
     * Creates a new Unit record in the database.
     *
     * @param array $data The data for creating the Unit record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Unit The newly created Unit record.
     */
    public function create(array $data)
    {
        return Unit::create($data);
    }

    /**
     * Updates an Unit with the given data.
     *
     * @param Unit $unit The Unit to update.
     * @param array $data The data to update the Unit with.
     * @return Unit The updated Unit.
     */
    public function update(Unit $unit, array $data)
    {
        $unit->update($data);
        return $unit;
    }

    /**
     * Deletes an unit.
     *
     * @param Unit $unit The unit to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the unit.
     */
    public function delete(Unit $unit)
    {
        $unit->delete();
    }

    /**
     * Finds an unit by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the unit is not found.
     * @return \App\Models\Unit The found unit.
     */
    public function find($id)
    {
        return Unit::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Unit::all();
    }
}
