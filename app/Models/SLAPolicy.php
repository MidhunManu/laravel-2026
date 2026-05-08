<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'response_minutes',
    'resolution_minutes',
])]
class SLAPolicy extends Model
{
    //
}
