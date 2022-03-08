<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PaltaSolutions\Cart\Domain\Models\Cart;
use PaltaSolutions\Cart\Contracts\Enums\CartItemType;
use PaltaSolutions\Currency\Enums\Currency;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('currency')->default(Currency::USD->value);
            $table->string('type')->default(CartItemType::SKU->value);

            $table->text('description')->nullable();

            $table->unsignedInteger('sequence')->default(0);
            $table->unsignedInteger('line_total_amount')->default(0);
            $table->unsignedInteger('unit_total_amount')->default(0);

            $table->unsignedInteger('quantity')->default(0);

            $table->foreignIdFor(Cart::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
