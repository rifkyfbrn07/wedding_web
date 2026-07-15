<?php

namespace App\Services;

use App\Models\Guest;
use App\Models\Invitation;
use App\Repositories\Contracts\GuestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestService
{
    public function __construct(
        private readonly GuestRepositoryInterface $guestRepository
    ) {}

    /**
     * Resolve guest from URL slug or query param, log their visit.
     */
    public function resolveAndTrack(
        Invitation $invitation,
        Request $request,
        ?string $guestSlug = null
    ): ?Guest {
        // Priority 1: URL path slug  (/i/ikko-fadhly/to/john-doe)
        // Priority 2: Query string   (/i/ikko-fadhly?to=John+Doe)
        $rawName = null;
        $slug    = null;

        if ($guestSlug) {
            $slug    = $guestSlug;
            $rawName = str_replace(['-', '_'], ' ', $guestSlug);
        } elseif ($request->has('to')) {
            $rawName = trim($request->query('to'));
            $slug    = Str::slug($rawName);
        }

        if (!$slug || !$rawName) {
            return null;
        }

        $guest = $this->guestRepository->firstOrCreate($invitation, $rawName, $slug);

        $this->guestRepository->recordVisit(
            $guest,
            $request->ip(),
            $request->userAgent() ?? ''
        );

        return $guest;
    }
}
