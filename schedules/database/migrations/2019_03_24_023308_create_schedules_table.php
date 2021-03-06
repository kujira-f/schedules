<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            //しおりID (id) /SERIAL
            $table->increments('id');
            //しおりタイトル (title)/VARCHAR(20)
            $table->string('title', 20);
            //行きの日付('go_date')/DATE
            $table->date('go_date');
            //帰りの日付('return_date')/DATE
            $table->date('return_date');
            //所有ユーザID (user_id) /INTEGER
            $table->integer('user_id')->unsigned();
            //招待ユーザID1 
            $table->string('invite_user_id_1')->default("");
            //招待ユーザID2
            $table->string('invite_user_id_2')->default("");
            //招待ユーザID3
            $table->string('invite_user_id_3')->default("");
            //招待ユーザID4
            $table->string('invite_user_id_4')->default("");
            //招待ユーザID5
            $table->string('invite_user_id_5')->default("");
            //更新日
            $table->timestamps();
            
            //外部キー
            $table->engine = 'InnoDB';
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
