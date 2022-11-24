<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string title
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Product[] products
 */
class Color extends Model {
    use HasFactory;

    protected $table = "colors";

    protected $fillable = [
        "title"
    ];

    public function products(): HasMany {
        return $this->hasMany(Product::class, "color_id", "id");
    }
}
