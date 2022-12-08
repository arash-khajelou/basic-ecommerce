<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\InvoiceRow;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class InvoiceService {
    /**
     * @param bool $paginate
     * @return Invoice[]|Collection|LengthAwarePaginator
     */
    public static function getAllInvoices(bool $paginate = false): array|Collection|LengthAwarePaginator {
        if ($paginate) {
            $invoices = Invoice::query()->orderBy("id", "DESC")->with(["user"])->paginate();
        } else {
            $invoices = Invoice::query()->orderBy("id", "DESC")->with(["user"])->get();
        }
        return $invoices;
    }

    /**
     * @param User $user
     * @param Collection|InvoiceRow[] $rows
     * @return void
     */
    public static function createInvoice(User $user, Collection|array $rows = []): Invoice {
        /** @var Invoice $invoice */
        $invoice = $user->invoices()->create([
            "sum" => 0
        ]);

        foreach ($rows as $row) {
            static::addRowToInvoice($invoice, $row);
        }

        return $invoice;
    }

    public static function addRowToInvoice(Invoice $invoice, InvoiceRow $invoice_row): void {
        $invoice_row->invoice()->associate($invoice);
        $invoice_row->save();
        $invoice->load("rows");
        static::recalculateInvoice($invoice);
    }

    public static function recalculateInvoice(Invoice $invoice): void {
        $sum = 0;

        foreach ($invoice->rows as $row) {
            $row_sum = $row->product->price * $row->product_count;
            $sum += $row_sum;
        }

        $invoice->update([
            "sum" => $sum
        ]);
    }
}