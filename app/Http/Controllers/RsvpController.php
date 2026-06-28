<?php

namespace App\Http\Controllers;

use App\Services\RsvpService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RsvpController extends Controller
{
    public function __construct(
        private readonly RsvpService $rsvpService
    ) {}

    public function store(Request $request): JsonResponse
    {
        try {
            $rsvp = $this->rsvpService->store($request);

            return response()->json([
                'success' => true,
                'message' => 'RSVP berhasil disimpan.',
                'data'    => $rsvp,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => collect($e->errors())->flatten()->first(),
                'errors'  => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan. Silakan coba lagi.',
            ], 500);
        }
    }
}
