<?php

namespace App\Services;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

class ColorService {
    /**
     * @return Collection|Color[]
     */
    public static function getAllColors(): Collection|array {
        return Color::all();
    }

    public static function findById(int $color_id): Color {
        return Color::find($color_id);
    }
}