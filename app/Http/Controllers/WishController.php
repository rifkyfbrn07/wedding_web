<?php

namespace App\Http\Controllers;

use App\Services\WishService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WishController extends Controller
{
    public function __construct(
        private readonly WishService $wishService
    ) {}

    /**
     * AJAX: paginated list of approved wishes.
     */
    public function index(Request $request): JsonResponse
    {
        $invitationId = (int) $request->query('invitation_id', 0);
        $page         = (int) $request->query('page', 1);

        if (!$invitationId) {
            return response()->json(['data' => [], 'next_page_url' => null]);
        }

        $paginator = $this->wishService->paginate($invitationId);

        return response()->json($paginator);
    }

    /**
     * AJAX: store a new wish.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $wish = $this->wishService->store($request);

            return response()->json([
                'success' => true,
                'message' => 'Ucapan berhasil dikirim.',
                'data'    => $wish,
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
