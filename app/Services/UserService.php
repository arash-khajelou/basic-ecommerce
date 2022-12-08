<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserService {
    public static function getUserHome(User|Authenticatable $user): string {
        if ($user->is_admin)
            return "/admin";
        else
            return "/";
    }

    /**
     * @param bool $paginate
     * @return array|Collection|LengthAwarePaginator
     */
    public static function getAllUsers(bool $paginate = false): array|Collection|LengthAwarePaginator {
        if ($paginate) {
            $users = User::query()->orderBy("id", "DESC")->paginate();
        } else {
            $users = User::query()->orderBy("id", "DESC")->get();
        }
        return $users;
    }

    public static function addUser(
        string $first_name,
        string $last_name,
        string $email,
        bool   $is_admin,
        bool   $is_customer,
        string $password
    ): User {
        return User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => $is_admin,
            'is_customer' => $is_customer
        ]);
    }

    public static function updateUser(
        User    $user,
        string  $first_name,
        string  $last_name,
        string  $email,
        bool    $is_admin,
        bool    $is_customer,
        ?string $password
    ): bool {
        return $user->update([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password != null ? Hash::make($password) : $user->password,
            'is_admin' => $is_admin,
            'is_customer' => $is_customer
        ]);
    }

    public static function deleteUser(User $user): ?bool {
        return $user->delete();
    }
}