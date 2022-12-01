<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string full_name
 * @property string email
 * @property Carbon email_verified_at
 * @property string password
 * @property bool is_admin
 * @property bool is_customer
 * @property string remember_token
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property CartRow[] cartRows
 * @property Product[] inCartProducts
 *
 * @method static static find(int $id)
 */
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'is_customer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'bool',
        'is_customer' => 'bool',
    ];

    public function getFullNameAttribute(): string {
        return $this->first_name . " " . $this->last_name;
    }

    public function cartRows(): HasMany {
        return $this->hasMany(CartRow::class, "user_id", "id");
    }

    public function inCartProducts(): BelongsToMany {
        return $this->belongsToMany(
            Product::class,
            "cart_rows",
            "user_id",
            "product_id",
            "id",
            "id"
        );
    }
}
