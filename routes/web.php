<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\WishController;

/*
|--------------------------------------------------------------------------
| Public Wedding Invitation Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    try {
        $invitation = \App\Models\Invitation::first();
        if ($invitation) {
            return redirect()->route('invitation.show', $invitation->slug);
        }
        return response()->view('errors.no-invitations', [], 200);
    } catch (\Exception $e) {
        return response()->view('errors.no-invitations', ['error' => $e->getMessage()], 200);
    }
});

// Personalized invitation — /i/ikko-fadhly/to/john-doe
Route::get('/i/{invitation}/to/{guestSlug}', [InvitationController::class, 'show'])
    ->name('invitation.show.guest');

// Invitation without personalization — /i/ikko-fadhly
// Also supports ?to=John+Doe query parameter
Route::get('/i/{invitation}', [InvitationController::class, 'show'])
    ->name('invitation.show');

/*
|--------------------------------------------------------------------------
| AJAX Endpoints
|--------------------------------------------------------------------------
*/

Route::post('/rsvp',    [RsvpController::class,  'store'])->name('rsvp.store');
Route::post('/wishes',  [WishController::class,  'store'])->name('wishes.store');
Route::get('/wishes',   [WishController::class,  'index'])->name('wishes.index');

Route::get('/music/wedding-music.mp3', function () {
    try {
        $invitation = \App\Models\Invitation::first();
        $path = null;
        if ($invitation && $invitation->music_path) {
            $path = storage_path('app/public/' . $invitation->music_path);
        }
        
        if (!$path || !file_exists($path)) {
            $path = public_path('music/Banda.mp3');
        }

        if (!file_exists($path)) {
            $path = public_path('music/song.mp3');
        }

        if (!file_exists($path)) {
            abort(404);
        }

        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($path);
        $response->headers->set('Content-Type', 'audio/mpeg');
        return $response;
    } catch (\Exception $e) {
        abort(404);
    }
})->name('music.play');
