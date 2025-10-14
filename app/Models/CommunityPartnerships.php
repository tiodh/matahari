<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityPartnerships extends Model
{
    protected $fillable = [
        'name',
    ];

    public function segments(): BelongsTo
    {
        return $this->belongsTo(Segments::class);
    }
}
