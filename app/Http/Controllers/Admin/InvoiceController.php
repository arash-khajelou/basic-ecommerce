<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\InvoiceService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index(Request $request): Factory|View|Application {
        $invoices = InvoiceService::getAllInvoices(true);
        return view("admin.invoice.index", compact("invoices"));
    }

    public function show() {

    }

    public function destroy() {

    }
}