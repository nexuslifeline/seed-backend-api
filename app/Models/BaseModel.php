<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use Auditable, UuidGenerator;

    protected $guarded = ['id', 'uuid'];
}
