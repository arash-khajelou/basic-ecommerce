<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PublicController extends Controller {
    public function index(Request $request): Factory|View|Application {
        $top_products = ProductService::getTopProducts();
        return view("public.index", compact("top_products"));
    }

    public function contactUs(): Factory|View|Application {
        return view("public.contacts");
    }

    public function productIndex(Request $request): Factory|View|Application {
        $products = ProductService::getAllProducts(true);
        return view("public.product.index", compact("products"));
    }

    public function productShow(Request $request, Product $product): Factory|View|Application {
        return view("public.product.show", compact("product"));
    }
}
