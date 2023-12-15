<?php

namespace App\Repositories;

use App\Models\Invoice;

class EloquentInvoiceRepository implements InvoiceRepositoryInterface
{
    /**
     * Creates a new Invoice record in the database.
     *
     * @param array $data The data for creating the Invoice record.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return Invoice The newly created Invoice record.
     */
    public function create(array $data)
    {
        return Invoice::create($data);
    }

    /**
     * Updates an Invoice with the given data.
     *
     * @param Invoice $invoice The Invoice to update.
     * @param array $data The data to update the Invoice with.
     * @return Invoice The updated Invoice.
     */
    public function update(Invoice $invoice, array $data)
    {
        $invoice->update($data);
        return $invoice;
    }

    /**
     * Deletes an invoice.
     *
     * @param Invoice $invoice The invoice to delete.
     * @throws Some_Exception_Class When an error occurs while deleting the invoice.
     */
    public function delete(Invoice $invoice)
    {
        $invoice->delete();
    }

    /**
     * Finds an invoice by ID.
     *
     * @param int $id The ID of the admin to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the invoice is not found.
     * @return \App\Models\Invoice The found invoice.
     */
    public function find($id)
    {
        return Invoice::findOrFail($id);
    }

    /**
     * Retrieves all records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Invoice::all();
    }
}
