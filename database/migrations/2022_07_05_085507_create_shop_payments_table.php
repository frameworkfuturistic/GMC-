<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('ShopId')->nullable();
            $table->date('From')->nullable();
            $table->date('To')->nullable();
            $table->integer('Amount')->nullable();
            $table->mediumText('PmtMode')->nullable();
            $table->integer('Rate')->nullable();
            $table->integer('Months')->nullable();
            $table->date('PaymentDate')->nullable();
            $table->integer('UserId')->nullable();
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
        Schema::dropIfExists('shop_payments');
    }
}
