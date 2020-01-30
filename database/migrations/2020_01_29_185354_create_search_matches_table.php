<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSearchMatchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('search_matches', function (Blueprint $table) use ($prefix) {
            $table->integer('post_id')->unsigned()->default(0);
            $table->integer('word_id')->unsigned()->default(0);
            $table->boolean('subject_match')->default(0);

            $table->index(['word_id'], $prefix . 'search_matches_word_id_idx');
            $table->index(['post_id'], $prefix . 'search_matches_post_id_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search_matches');
    }

}
