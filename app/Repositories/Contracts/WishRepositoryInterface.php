<?php

namespace App\Repositories\Contracts;

use App\Models\Wish;
use Illuminate\Pagination\LengthAwarePaginator;

interface WishRepositoryInterface
{
    public function store(array $data): Wish;
    public function paginateForInvitation(int $invitationId, int $perPage = 10): LengthAwarePaginator;
}
