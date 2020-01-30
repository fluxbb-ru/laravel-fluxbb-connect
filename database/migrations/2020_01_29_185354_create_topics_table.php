<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('topics', function (Blueprint $table) use ($prefix) {
            $table->increments('id');
            $table->string('poster', 200)->default('');
            $table->string('subject')->default('');
            $table->integer('posted')->unsigned()->default(0);
            $table->integer('first_post_id')->unsigned()->default(0);
            $table->integer('last_post')->unsigned()->default(0);
            $table->integer('last_post_id')->unsigned()->default(0);
            $table->string('last_poster', 200)->nullable();
            $table->mediumInteger('num_views')->unsigned()->default(0);
            $table->mediumInteger('num_replies')->unsigned()->default(0);
            $table->boolean('closed')->default(0);
            $table->boolean('sticky')->default(0);
            $table->integer('moved_to')->unsigned()->nullable();
            $table->integer('forum_id')->unsigned()->default(0);

            $table->index(['forum_id'], $prefix . 'topics_forum_id_idx');
            $table->index(['moved_to'], $prefix . 'topics_moved_to_idx');
            $table->index(['last_post'], $prefix . 'topics_last_post_idx');
            $table->index(['first_post_id'], $prefix . 'topics_first_post_id_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }

}
