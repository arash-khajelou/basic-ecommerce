<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string title
 * @property int price
 * @property int count
 * @property string description
 * @property int color_id
 * @property bool is_available
 * @property string image_src
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Color color
 * @property CartRow[] cartRows
 * @property User[] inCartUsers
 *
 */
class Product extends BaseModel {
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "title",
        "price",
        "count",
        "description",
        "color_id",
        "is_available",
        "image_src"
    ];

    protected $attributes = [
        "description" => ""
    ];

    protected $casts = [
        "is_available" => "bool"
    ];

    public function color(): BelongsTo {
        return $this->belongsTo(Color::class, "color_id", "id");
    }

    public function cartRows(): HasMany {
        return $this->hasMany(CartRow::class, "product_id", "id");
    }

    public function inCartUsers(): BelongsToMany {
        return $this->belongsToMany(
            User::class,
            "cart_rows",
            "product_id",
            "user_id",
            "id",
            "id"
        );
    }
}
