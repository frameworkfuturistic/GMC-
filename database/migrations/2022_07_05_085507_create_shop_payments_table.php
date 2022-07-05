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
            $table->integer('ShopID')->nullable();
            $table->date('From')->nullable();
            $table->date('To')->nullable();
            $table->integer('Amount')->nullable();
            $table->mediumText('PmtMode')->nullable();
            $table->date('PmtDate')->nullable();
            $table->smallInteger('CollectedBy')->nullable();
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
