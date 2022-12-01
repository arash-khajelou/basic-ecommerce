<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService {
    public static function getUserHome(User|Authenticatable $user): string {
        if ($user->is_admin)
            return "/admin";
        else
            return "/";
    }
}