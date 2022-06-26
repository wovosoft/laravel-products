<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Wovosoft\LaravelProducts\Models\PriceAndCost;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(PriceAndCost::getTableName(), function (Blueprint $table) {
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
        Schema::dropIfExists(PriceAndCost::getTableName());
    }
};
