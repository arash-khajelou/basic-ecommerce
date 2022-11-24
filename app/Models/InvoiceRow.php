<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int invoice_id
 * @property int product_id
 * @property int product_price
 * @property int product_count
 * @property int sum
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Invoice invoice
 * @property Product product
 */
class InvoiceRow extends Model {
    use HasFactory;

    protected $table = "invoice_rows";

    protected $fillable = [
        "invoice_id",
        "product_id",
        "product_price",
        "product_count",
        "sum"
    ];

    public function invoice(): BelongsTo {
        return $this->belongsTo(Invoice::class, "invoice_id", "id");
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
