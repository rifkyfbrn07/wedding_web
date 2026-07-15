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
        try {
            $invitationModel = Invitation::where('slug', $invitation)->first();

            if (! $invitationModel) {
                $firstInvitation = Invitation::first();
                if ($firstInvitation) {
                    return redirect()->route('invitation.show', [
                        'invitation' => $firstInvitation->slug,
                        'to' => $request->query('to')
                    ]);
                }
                return response()->view('errors.no-invitations', [], 200);
            }

            $guest = $this->guestService->resolveAndTrack($invitationModel, $request, $guestSlug);

            $title = "The Wedding of " . $invitationModel->bride_name . " & " . $invitationModel->groom_name;
            if ($guest && $guest->name) {
                $title = "Undangan Spesial untuk " . $guest->name . " — " . $title;
            }
            
            $description = "Undangan pernikahan " . $invitationModel->bride_name . " & " . $invitationModel->groom_name . 
                " pada tanggal " . \Carbon\Carbon::parse($invitationModel->akad_start_at)->translatedFormat('d F Y') . 
                " di " . $invitationModel->venue_name . ".";

            return view('invitation.show', [
                'invitation' => $invitationModel,
                'guest' => $guest,
                'seo' => [
                    'title' => $title,
                    'description' => $description,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->view('errors.no-invitations', ['error' => $e->getMessage()], 200);
        }
    }
}