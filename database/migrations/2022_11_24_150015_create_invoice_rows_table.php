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
        Schema::create('invoice_rows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("invoice_id")->nullable();
            $table->foreign("invoice_id")->references("id")->on("invoices")
                ->nullOnDelete();

            $table->unsignedBigInteger("product_id")->nullable();
            $table->foreign("product_id")->references("id")->on("products")
                ->nullOnDelete();

            $table->unsignedInteger("product_price");
            $table->unsignedInteger("product_count");
            $table->unsignedInteger("sum");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('invoice_rows');
    }
};
