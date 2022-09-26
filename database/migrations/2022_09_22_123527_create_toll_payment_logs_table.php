<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTollPaymentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toll_payment_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('last_toll_payment_id')->nullable();
            $table->bigInteger('new_toll_payment_id')->nullable();
            $table->string('ip_address', 100)->nullable();
            $table->bigInteger('activated_by')->nullable();
            $table->bigInteger('deactivated_by')->nullable();
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
        Schema::dropIfExists('toll_payment_logs');
    }
}
