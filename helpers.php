<?php

use App\Models\CartRow;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists("get_cart")) {
    /**
     * @return Collection|CartRow[]
     */
    function get_cart(): Collection|array {
        /** @var User $user */
        $user = auth()->user();
        if ($user == null)
            return [];
        return CartService::getCart($user);
    }
}

if (!function_exists("get_cart_count")) {
    function get_cart_count(): int {
        /** @var User $user */
        $user = auth()->user();
        if ($user == null)
            return 0;
        return CartService::getCartCount($user);
    }
}

if (!function_exists("is_product_in_cart")) {
    function is_product_in_cart(Product $product): bool {
        /** @var User $user */
        $user = auth()->user();
        if ($user == null)
            return false;
        return CartService::isProductInCart($user, $product);
    }
}
