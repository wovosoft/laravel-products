<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Wovosoft\LaravelProducts\Enums\ProductTypes;
use Wovosoft\LaravelProducts\Models\Product;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(Product::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('type')->default(ProductTypes::Product->value);
            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            //when product has external resource.
            $table->string('url')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists(Product::getTableName());
    }
};
