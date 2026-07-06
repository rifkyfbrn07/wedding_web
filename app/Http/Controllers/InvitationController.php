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

    public function show(Request $request, string $invitation, string $guestSlug = null)
    {
        $invitation = Invitation::where('slug', $invitation)->firstOrFail();
        $guest = $this->guestService->resolveAndTrack($invitation, $request, $guestSlug);

        $title = "The Wedding of " . $invitation->bride_name . " & " . $invitation->groom_name;
        if ($guest && $guest->name) {
            $title = "Undangan Spesial untuk " . $guest->name . " — " . $title;
        }
        
        $description = "Undangan pernikahan " . $invitation->bride_name . " & " . $invitation->groom_name . 
            " pada tanggal " . \Carbon\Carbon::parse($invitation->akad_start_at)->translatedFormat('d F Y') . 
            " di " . $invitation->venue_name . ".";

        return view('invitation.show', [
            'invitation' => $invitation,
            'guest' => $guest,
            'seo' => [
                'title' => $title,
                'description' => $description,
            ],
        ]);
    }
}