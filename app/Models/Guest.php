<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guest extends Model
{
    protected $fillable = [
        'invitation_id',
        'name',
        'slug',
        'visit_count',
        'last_visited_at',
    ];

    protected $casts = [
        'last_visited_at' => 'datetime',
        'visit_count'     => 'integer',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function visitLogs(): HasMany
    {
        return $this->hasMany(VisitLog::class);
    }

    public function recordVisit(string $ip, string $userAgent): void
    {
        $this->increment('visit_count');
        $this->update(['last_visited_at' => now()]);

        $this->visitLogs()->create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'visited_at' => now(),
        ]);
    }
}
