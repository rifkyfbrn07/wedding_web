<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rsvp extends Model
{
    protected $fillable = [
        'invitation_id',
        'guest_id',
        'name',
        'attendance',
        'guest_count',
        'message',
        'ip_address',
    ];

    protected $casts = [
        'guest_count' => 'integer',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function getIsAttendingAttribute(): bool
    {
        return $this->attendance === 'present';
    }

    public function getAttendanceLabelAttribute(): string
    {
        return match ($this->attendance) {
            'present'     => 'Hadir',
            'not_present' => 'Tidak Hadir',
            default       => '-',
        };
    }
}
