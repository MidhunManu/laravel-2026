<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'ticket_id',
    'disk',
    'path',
    'mime_type',
])]

class Attachment extends Model
{
    public function ticket(): BelongsTo {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
