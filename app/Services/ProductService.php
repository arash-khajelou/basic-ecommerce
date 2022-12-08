<?php

namespace App\Services;

use App\Models\Color;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService {
    /**
     * @param bool $paginate
     * @return array|Collection|LengthAwarePaginator
     */
    public static function getAllProducts(bool $paginate = false): array|Collection|LengthAwarePaginator {
        if ($paginate) {
            // select * from products order by id desc limit 10;
            $products = Product::query()->orderBy("id", "DESC")->paginate();
        } else {
            // select * from products order by id desc;
            $products = Product::query()->orderBy("id", "DESC")->get();
        }
        return $products;
    }

    public static function addProduct(
        string $title,
        int    $price,
        int    $count,
        string $description,
        Color  $color,
        bool   $is_available,
        string $image_src
    ): Product {
        return Product::create([
            "title" => $title,
            "price" => $price,
            "count" => $count,
            "description" => $description,
            "color_id" => $color->id,
            "is_available" => $is_available,
            "image_src" => $image_src
        ]);
    }

    public static function updateProduct(
        Product $product,
        string  $title,
        int     $price,
        int     $count,
        string  $description,
        Color   $color,
        bool    $is_available,
        string  $image_src
    ): bool {
        return $product->update([
            "title" => $title,
            "price" => $price,
            "count" => $count,
            "description" => $description,
            "color_id" => $color->id,
            "is_available" => $is_available,
            "image_src" => $image_src
        ]);
    }

    public static function getUploadsPath(string $file_name = "", bool $absolute_path = true): string {
        $file_name = str_starts_with($file_name, "/") ? $file_name : "/{$file_name}";
        $relative_path = "/uploads/products{$file_name}";
        if ($absolute_path)
            return public_path($relative_path);
        return $relative_path;
    }

    public static function uploadImage(UploadedFile $image): string {
        $prefix = Carbon::now()->format("Ymd-His") . Str::random(4);
        $file_name = $prefix . $image->getClientOriginalName();
        $relative_path = ProductService::getUploadsPath($file_name, false);
        $image->move(ProductService::getUploadsPath(), $file_name);
        return $relative_path;
    }

    public static function removeProduct(Product $product): ?bool {
        return $product->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Product[]
     */
    public static function getTopProducts(): \Illuminate\Database\Eloquent\Collection|array {
        return Product::query()->orderByRaw(DB::raw("RAND()"))->take(4)->get();
    }
}