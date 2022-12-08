<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ColorService;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request): Factory|View|Application {
        $products = ProductService::getAllProducts(true);
        return view("admin.product.index", compact("products"));
    }

    public function store(ProductStoreRequest $request) {
        $relative_path = ProductService::uploadImage($request->file("image"));
        $color = ColorService::findById($request->get("color_id"));
        ProductService::addProduct(
            $request->get("title"),
            $request->get("price"),
            $request->get("count"),
            $request->get("description"),
            $color,
            $request->get("is_available") ?? false,
            $relative_path
        );

        return redirect()->route("admin.product.index");
    }

    public function create(): Factory|View|Application {
        $colors = ColorService::getAllColors();
        return view("admin.product.create", compact("colors"));
    }

    public function edit(Request $request, Product $product): Factory|View|Application {
        $colors = ColorService::getAllColors();
        return view("admin.product.edit", compact("product", "colors"));
    }

    public function update(ProductUpdateRequest $request, Product $product) {
        if ($request->hasFile("image")) {
            $relative_path = ProductService::uploadImage($request->file("image"));
        } else {
            $relative_path = $product->image_src;
        }
        $color = ColorService::findById($request->get("color_id"));
        ProductService::updateProduct(
            $product,
            $request->get("title"),
            $request->get("price"),
            $request->get("count"),
            $request->get("description"),
            $color,
            $request->get("is_available") ?? false,
            $relative_path
        );
        return redirect()->route("admin.product.index");
    }

    public function destroy(Request $request, Product $product): RedirectResponse {
        ProductService::removeProduct($product);

        return redirect()->back();
    }
}