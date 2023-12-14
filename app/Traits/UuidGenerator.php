<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidGenerator
{
    /**
     * Boot method to register event listeners.
     */
    protected static function bootUuidGeneratable()
    {
        // fired before creating
        static::creating(function ($model) {
            // generate uuid
            $model->uuid = Str::uuid();
        });
    }
}
