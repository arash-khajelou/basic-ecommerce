<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int user_id
 * @property int product_id
 * @property int count
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property User user
 * @property Product product
 *
 */
class CartRow extends BaseModel {
    use HasFactory;

    protected $table = "cart_rows";

    protected $fillable = [
        "user_id",
        "product_id",
        "count"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
