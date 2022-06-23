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
    public function up(): void
    {
        Schema::create(config("laravel-products.table.prefix") . 'price_and_costs', function (Blueprint $table) {
            $table->id();
            $table->morphs("owner");
            $table->double("cost", null, 2)->nullable();
            $table->double("price", null, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config("laravel-products.table.prefix") . 'price_and_costs');
    }
};
