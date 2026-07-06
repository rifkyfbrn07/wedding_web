<?php

namespace App\Repositories;

use App\Models\Guest;
use App\Models\Invitation;
use App\Repositories\Contracts\GuestRepositoryInterface;
use Illuminate\Support\Str;

class GuestRepository implements GuestRepositoryInterface
{
    public function findBySlug(string $slug): ?Guest
    {
        return Guest::where('slug', $slug)->first();
    }

    public function firstOrCreate(Invitation $invitation, string $name, string $slug): Guest
    {
        return Guest::firstOrCreate(
            [
                'invitation_id' => $invitation->id,
                'slug'          => $slug,
            ],
            [
                'name'        => $name,
                'visit_count' => 0,
            ]
        );
    }

    public function recordVisit(Guest $guest, string $ip, string $userAgent): void
    {
        $guest->recordVisit($ip, $userAgent);
    }
}
