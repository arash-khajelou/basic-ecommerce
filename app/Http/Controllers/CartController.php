<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller {

    public function index(Request $request): Factory|View|Application {
        /** @var User $user */
        $user = $request->user();
        $cart_rows = CartService::getCart($user);
        return view("public.cart", compact("cart_rows"));
    }

    public function addProductToCart(Request $request, Product $product): RedirectResponse {
        /** @var User $user */
        $user = $request->user();
        CartService::addProductToCart($user, $product);

        return redirect()->back();
    }

    public function removeProductFromCart(Request $request, Product $product): RedirectResponse {
        /** @var User $user */
        $user = $request->user();
        CartService::removeProductFromCart($user, $product);
        return redirect()->back();
    }

    public function updateProductInCart(Request $request, Product $product): RedirectResponse {
        /** @var User $user */
        $user = $request->user();
        CartService::updateCartRow($user, $product, $request->get("count"));
        return redirect()->back();
    }

    public function submitCart(Request $request): RedirectResponse {
        /** @var User $user */
        $user = $request->user();
        $invoice = CartService::submitCart($user);
        return redirect()->route("invoice.checkout", $invoice);
    }
}
