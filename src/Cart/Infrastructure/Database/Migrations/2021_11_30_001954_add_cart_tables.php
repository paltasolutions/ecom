<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PaltaSolutions\Currency\Enums\Currency;

class AddCartTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('email');
            $table->string('currency_code')->default(Currency::USD->value);

            $table->unsignedInteger('total_items')->default(0);
            $table->unsignedInteger('total_unique_items')->default(0);

            $table->integer('sub_total_amount')->default(0);
            $table->integer('shipping_total_amount')->default(0);
            $table->integer('tax_total_amount')->default(0);
            $table->integer('grand_total_amount')->default(0);

            $table->boolean('is_empty')->default(true);
            $table->boolean('abandoned')->default(false);

            $table->json('metadata')->nullable();

            $table->text('notes')->nullable();

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
        Schema::dropIfExists('carts');
    }
}
