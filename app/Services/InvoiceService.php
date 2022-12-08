<?php

namespace App\Services;

use App\Models\Invoice;
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
}