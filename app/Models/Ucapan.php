<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ucapan extends Model
{
    protected $guarded = [];

    public function wedding(): BelongsTo
    {
        return $this->belongsTo(UserWadding::class, 'weding_id', 'id');
    }
}
