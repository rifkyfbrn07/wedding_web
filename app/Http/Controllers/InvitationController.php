<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Services\GuestService;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function __construct(
        private readonly GuestService $guestService
    ) {}

    public function show(
        Request $request,
        string $invitation,
        ?string $guestSlug = null
    ) {
        // Resolve invitation by slug — use $invitation as the final variable name
        // to match what the Blade layout expects
        $invitation = Invitation::active()->where('slug', $invitation)->firstOrFail();

        // Resolve & track guest
        $guest = $this->guestService->resolveAndTrack($invitation, $request, $guestSlug);

        // Build SEO data
        $guestName = $guest?->name ?? 'Tamu Undangan';
        $akadDate  = $invitation->akad_start_at->locale('id')->isoFormat('D MMMM Y');

        $seo = [
            'title'       => "Undangan Pernikahan {$invitation->bride_name} & {$invitation->groom_name}" .
                             ($guest ? " — {$guestName}" : ''),
            'description' => "Anda diundang untuk hadir di pernikahan {$invitation->bride_name} & {$invitation->groom_name} " .
                             "pada {$akadDate} di {$invitation->venue_name}.",
        ];

        return view('invitation.show', compact('invitation', 'guest', 'seo'));
    }
}
