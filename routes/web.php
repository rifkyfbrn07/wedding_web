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

Route::get('/music/wedding-music.{ext}', function ($ext) {
    try {
        $invitation = \App\Models\Invitation::first();
        $path = null;
        if ($invitation && $invitation->music_path) {
            $path = storage_path('app/public/' . $invitation->music_path);
        }
        
        if (!$path || !file_exists($path)) {
            $path = public_path('music/BandaNeira.m4a');
        }

        if (!file_exists($path)) {
            $path = public_path('music/song.mp3');
        }

        if (!file_exists($path)) {
            abort(404);
        }

        $fileExt = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $contentType = ($fileExt === 'm4a' || $fileExt === 'mp4' || $fileExt === 'aac') ? 'audio/mp4' : 'audio/mpeg';

        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($path);
        $response->headers->set('Content-Type', $contentType);
        return $response;
    } catch (\Exception $e) {
        abort(404);
    }
})->where('ext', 'mp3|m4a')->name('music.play');
