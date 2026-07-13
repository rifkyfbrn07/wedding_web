<?php

namespace App\Services;

use App\Models\Rsvp;
use App\Repositories\Contracts\RsvpRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RsvpService
{
    public function __construct(
        private readonly RsvpRepositoryInterface $rsvpRepository
    ) {}

    /**
     * Validate and store a new RSVP.
     *
     * @throws ValidationException
     */
    public function store(Request $request): Rsvp
    {
        $data = Validator::make($request->all(), [
            'invitation_id' => ['required', 'integer', 'exists:invitations,id'],
            'guest_id'      => ['nullable', 'integer', 'exists:guests,id'],
            'name'          => ['required', 'string', 'max:100'],
            'attendance'    => ['required', 'in:present,not_present'],
            'guest_count'   => ['nullable', 'integer', 'min:1', 'max:10'],
            'message'       => ['nullable', 'string', 'max:500'],
        ])->validate();

        $data['guest_count'] = $data['guest_count'] ?? 1;
        $data['ip_address']  = $request->ip();

        $rsvp = $this->rsvpRepository->store($data);

        // Bridge RSVP message to the wishes feed
        if (!empty($data['message'])) {
            \App\Models\Wish::create([
                'invitation_id' => $data['invitation_id'],
                'name'          => $data['name'],
                'message'       => $data['message'],
                'is_approved'   => true, // auto-approve so it displays instantly
                'ip_address'    => $data['ip_address'],
            ]);
        }

        return $rsvp;
    }
}
