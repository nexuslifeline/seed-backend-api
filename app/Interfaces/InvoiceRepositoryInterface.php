<?php

namespace App\Repositories;

use App\Models\Invoice;

interface InvoiceRepositoryInterface
{
    public function create(array $data);

    public function update(Invoice $invoice, array $data);

    public function delete(Invoice $invoice);

    public function find($id);

    public function all();
}
