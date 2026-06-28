<?php

namespace App\Repositories;

use App\Models\Rsvp;
use App\Models\Invitation;
use App\Repositories\Contracts\RsvpRepositoryInterface;

class RsvpRepository implements RsvpRepositoryInterface
{
    public function store(array $data): Rsvp
    {
        return Rsvp::create($data);
    }

    public function forInvitation(Invitation $invitation): \Illuminate\Database\Eloquent\Collection
    {
        return $invitation->rsvps()->latest()->get();
    }
}
