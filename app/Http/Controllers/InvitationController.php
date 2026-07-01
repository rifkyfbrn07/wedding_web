<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function show(Request $request, string $invitation)
    {
        $invitation = Invitation::where('slug', $invitation)->firstOrFail();

        return view('invitation.show', [
            'invitation' => $invitation,
            'guest' => null,
            'seo' => [
                'title' => 'Test',
                'description' => 'Test',
            ],
        ]);
    }
}