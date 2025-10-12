<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IslandActivities extends Model
{
    protected $fillable = [
        'islands_id',
        'spv_id',
        'times_id',
        'activities_id',
        'date',
        'brand',
        'product_type',
        'sales',
        'photo',
    ];

    public function activities(): BelongsTo
    {
        return $this->belongsTo(Activities::class);
    }

    public function times(): BelongsTo
    {
        return $this->belongsTo(Times::class);
    }

    public function spv(): BelongsTo
    {
        return $this->belongsTo(User::class,'spv_id');
    }

    public function islands(): BelongsTo
    {
        return $this->belongsTo(Islands::class);
    }
}
