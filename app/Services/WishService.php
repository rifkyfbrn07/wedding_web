<?php

namespace App\Services;

use App\Models\Wish;
use App\Repositories\Contracts\WishRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WishService
{
    public function __construct(
        private readonly WishRepositoryInterface $wishRepository
    ) {}

    /**
     * Validate and store a wish.
     *
     * @throws ValidationException
     */
    public function store(Request $request): Wish
    {
        $data = Validator::make($request->all(), [
            'invitation_id' => ['required', 'integer', 'exists:invitations,id'],
            'name'          => ['required', 'string', 'max:100'],
            'message'       => ['required', 'string', 'max:1000'],
        ])->validate();

        $data['ip_address']  = $request->ip();
        $data['is_approved'] = true; // auto-approve

        return $this->wishRepository->store($data);
    }

    public function paginate(int $invitationId, int $perPage = 10): LengthAwarePaginator
    {
        return $this->wishRepository->paginateForInvitation($invitationId, $perPage);
    }
}
