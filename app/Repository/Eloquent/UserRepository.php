<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Eloquent\EloquentRepository;

/**
 * Description of PharmaciesRepository
 */
class UserRepository extends EloquentRepository
{
    public function getModelName(): string
    {
        return User::class;
    }
}
