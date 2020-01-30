<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('bans', function (Blueprint $table) use ($prefix) {
            $table->increments('id');
            $table->string('username', 200)->nullable();
            $table->string('ip')->nullable();
            $table->string('email', 80)->nullable();
            $table->string('message')->nullable();
            $table->integer('expire')->unsigned()->nullable();
            $table->integer('ban_creator')->unsigned()->default(0);

            $table->index([DB::raw('username(25)')], $prefix . 'bans_username_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bans');
    }

}
