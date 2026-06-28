<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wish extends Model
{
    protected $fillable = [
        'invitation_id',
        'name',
        'message',
        'is_approved',
        'ip_address',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
