<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOnlineTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('online', function (Blueprint $table) use ($prefix) {
            $table->integer('user_id')->unsigned()->default(1);
            $table->string('ident', 200)->default('');
            $table->integer('logged')->unsigned()->default(0);
            $table->boolean('idle')->default(0);
            $table->integer('last_post')->unsigned()->nullable();
            $table->integer('last_search')->unsigned()->nullable();

            $table->unique(['user_id', DB::raw('ident(25)')], $prefix . 'online_user_id_ident_idx');
            $table->index([DB::raw('ident(25)')], $prefix . 'online_ident_idx');
            $table->index(['logged'], $prefix . 'online_logged_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('online');
    }

}
