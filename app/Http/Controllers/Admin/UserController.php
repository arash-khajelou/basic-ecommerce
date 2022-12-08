<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index(Request $request): Factory|View|Application {
        $users = UserService::getAllUsers(true);
        return view("admin.user.index", compact("users"));
    }

    public function store(UserStoreRequest $request): RedirectResponse {
        UserService::addUser(
            $request->get("first_name"),
            $request->get("last_name"),
            $request->get("email"),
            $request->get("is_admin"),
            $request->get("is_customer"),
            $request->get("password"),
        );

        return redirect()->route("admin.user.index");
    }

    public function create(): Factory|View|Application {
        return view("admin.user.create");
    }

    public function edit(Request $request, User $user): Factory|View|Application {
        return view("admin.user.edit", compact("user"));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse {
        UserService::updateUser(
            $user,
            $request->get("first_name"),
            $request->get("last_name"),
            $request->get("email"),
            $request->get("is_admin") ?? false,
            $request->get("is_customer") ?? false,
            $request->get("password") ?? null
        );

        return redirect()->route("admin.user.index");
    }

    public function destroy(Request $request, User $user) {
        UserService::deleteUser($user);
    }
}