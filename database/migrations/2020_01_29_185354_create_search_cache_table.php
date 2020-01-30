<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSearchCacheTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('search_cache', function (Blueprint $table) use ($prefix) {
            $table->integer('id')->unsigned()->default(0);
            $table->string('ident', 200)->default('');
            $table->mediumText('search_data')->nullable();

            $table->primary('id');
            $table->index([DB::raw('ident(8)')], $prefix . 'search_cache_ident_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search_cache');
    }

}
