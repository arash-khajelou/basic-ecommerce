<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->unsignedInteger("price")->default(0);
            $table->unsignedInteger("count")->default(0);
            $table->text("description");

            $table->unsignedBigInteger("color_id")->nullable();
            $table->foreign("color_id")->references("id")->on("colors")
                ->nullOnDelete();

            $table->boolean("is_available")->default(true);
            $table->string("image_src")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
};
