<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitingSchedules extends Model
{
    protected $fillable = [
        'spv_id',
        'community_partnerships_id',
        'start_date',
        'end_date',
        'week',
        'year'
    ];

    public function spv():BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function community_partnerships():BelongsTo
    {
        return $this->BelongsTo(CommunityPartnerships::class);
    }
}
