<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }
}
