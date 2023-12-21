<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\OrgFillable;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use Auditable, UuidGenerator, OrgFillable, SoftDeletes;

    protected $guarded = ['id', 'uuid'];

    /**
     * Retrieves the name of the route key used for model binding.
     *
     * @return string The name of the route key.
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
