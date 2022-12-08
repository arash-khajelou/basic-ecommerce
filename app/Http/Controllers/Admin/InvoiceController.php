<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index(Request $request): Factory|View|Application {
        return view("admin.user.index");
    }

    public function show() {

    }

    public function destroy() {

    }
}