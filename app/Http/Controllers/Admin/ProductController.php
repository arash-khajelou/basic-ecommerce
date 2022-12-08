<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request): Factory|View|Application {
        return view("admin.user.index");
    }

    public function store() {

    }

    public function create() {

    }

    public function edit(){

    }

    public function update() {

    }

    public function destroy() {

    }
}