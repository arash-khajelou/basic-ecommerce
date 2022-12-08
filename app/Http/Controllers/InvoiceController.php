<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function showCheckout(Request $request, Invoice $invoice) {
        return view("public.invoice-checkout", compact("invoice"));
    }
}
