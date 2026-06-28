<?php

namespace App\Repositories\Contracts;

use App\Models\Guest;
use App\Models\Invitation;

interface GuestRepositoryInterface
{
    public function findBySlug(string $slug): ?Guest;
    public function firstOrCreate(Invitation $invitation, string $name, string $slug): Guest;
    public function recordVisit(Guest $guest, string $ip, string $userAgent): void;
}
