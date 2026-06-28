<?php

namespace App\Repositories;

use App\Models\Wish;
use App\Repositories\Contracts\WishRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class WishRepository implements WishRepositoryInterface
{
    public function store(array $data): Wish
    {
        return Wish::create($data);
    }

    public function paginateForInvitation(int $invitationId, int $perPage = 10): LengthAwarePaginator
    {
        return Wish::where('invitation_id', $invitationId)
            ->where('is_approved', true)
            ->latest()
            ->paginate($perPage);
    }
}
