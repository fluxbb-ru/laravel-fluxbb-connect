<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSearchWordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();
        $charset = DB::getConfig('charset') ?: 'utf8';

        Schema::create('search_words', function (Blueprint $table) use ($prefix, $charset) {
            $table->increments('id');
            $table->string('word', 20)->default('')->collation($charset . '_bin');

            $table->index(['id'], $prefix . 'search_words_id_idx');
            $table->dropPrimary('search_words_id_primary');
            $table->primary('word');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search_words');
    }

}
