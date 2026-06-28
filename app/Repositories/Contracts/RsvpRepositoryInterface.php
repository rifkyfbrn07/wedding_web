<?php

namespace App\Repositories\Contracts;

use App\Models\Rsvp;
use App\Models\Invitation;

interface RsvpRepositoryInterface
{
    public function store(array $data): Rsvp;
    public function forInvitation(Invitation $invitation): \Illuminate\Database\Eloquent\Collection;
}
