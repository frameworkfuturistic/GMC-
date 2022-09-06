<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_tracks', function (Blueprint $table) {
            // $table->increaments('TrackID');
            $table->bigInteger('TrackID')->primary()->nullable(false);
            $table->mediumText('RenewalID');
            $table->dateTime('TrackDate');
            $table->mediumText('UserID');
            $table->mediumText('Remarks')->nullable();
            $table->smallInteger('IsSMS')->nullable();
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
        Schema::dropIfExists('workflow_tracks');
    }
}
