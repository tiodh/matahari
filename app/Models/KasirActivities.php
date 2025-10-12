<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KasirActivities extends Model
{
    protected $fillable = [
        'kasir_id',
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

    public function kasir(): BelongsTo
    {
        return $this->belongsTo(User::class,'kasir_id');
    }
}
