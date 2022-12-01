<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int user_id
 * @property int sum
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property User user
 * @property InvoiceRow[] rows
 */
class Invoice extends BaseModel {
    use HasFactory;

    protected $table = "invoices";

    protected $fillable = [
        "user_id", "sum"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function rows(): HasMany {
        return $this->hasMany(CartRow::class, "invoice_id", "id");
    }
}
