<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTableHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments',function(Blueprint $table){
            $table->unsignedBigInteger('hour_id')->after('user_id');
            $table->foreign('hour_id','foreign_appointments_hours_id_hours_id')
                ->references('id')->on('hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments',function(Blueprint $table){
            $table->dropForeign('foreign_appointments_hours_id_hours_id');
            $table->dropColumn('hour_id');
        });
    }
}
