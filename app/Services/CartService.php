<?php

namespace App\Services;

use App\Models\CartRow;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class CartService {
    /**
     * @param User $user
     * @param Product $product
     * @param int $count
     * @return Collection|CartRow
     */
    public static function addProductToCart(User $user, Product $product, int $count = 1): Collection|array {
        $user->cartRows()->create([
            "product_id" => $product->id,
            "count" => $count
        ]);

        return static::getCart($user);
    }

    /**
     * @param User $user
     * @return Collection|CartRow[]
     */
    public static function getCart(User $user): Collection|array {
        return $user->cartRows()->with(["product"])->get();
    }

    public static function getCartCount(User $user): int {
        return $user->cartRows()->count();
    }

    public static function removeProductFromCart(User $user, Product $product): int {
        return $user->cartRows()->where("product_id", $product->id)->delete();
    }

    /**
     * @param User $user
     * @param Product $product
     * @param int $count
     * @return Collection|CartRow[]
     */
    public static function updateCartRow(User $user, Product $product, int $count): Collection|array {
        $cart_row = $user->cartRows()->where("product_id", $product->id)->first();
        if ($cart_row !== null) {
            $cart_row->update([
                "product_id" => $product->id,
                "count" => $count
            ]);
        } else {
            static::addProductToCart($user, $product, $count);
        }
        return static::getCart($user);
    }

    public static function isProductInCart(User $user, Product $product): bool {
        return $user->cartRows()->where("product_id", $product->id)->count() > 0;
    }
}