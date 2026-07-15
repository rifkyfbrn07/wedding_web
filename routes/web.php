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

// Home redirect
Route::get('/', fn () => redirect('/i/ikko-fadhly'));

Route::get('/debug-db', function () {
    try {
        \DB::connection()->getPdo();
        $invitations = \App\Models\Invitation::all();
        return response()->json([
            'status' => 'connected',
            'invitations_count' => $invitations->count(),
            'invitations' => $invitations,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
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
