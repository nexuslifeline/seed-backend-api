<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentInvoice extends Pivot
{
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
