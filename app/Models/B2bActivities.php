<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class B2bActivities extends Model
{
    protected $fillable = [
        "visiting_schedules_id",
        "spv_id",
        "times_id",
        "activities_id",
        "date",
        "brand",
        "product_type",
        "sales",
        "photo"
    ];

    public function visiting_schedules(): BelongsTo
    {
        return $this->belongsTo(VisitingSchedules::class);
    }

    public function spv(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function times(): BelongsTo
    {
        return $this->belongsTo(Times::class);
    }

    public function activities(): BelongsTo
    {
        return $this->belongsTo(Activities::class);
    }
}
