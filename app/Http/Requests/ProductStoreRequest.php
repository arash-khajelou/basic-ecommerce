<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        $max_int = PHP_INT_MAX;
        return [
            "title" => "required|string|min:2|max:255",
            "price" => "required|int|min:0|max:{$max_int}",
            "count" => "required|int|min:0|max:{$max_int}",
            "description" => "required|string",
            "color_id" => "required|exists:colors,id",
            "is_available" => "bool",
            "image" => "required|file|mimes:jpg,jpeg,png,bmp,tiff"
        ];
    }
}
