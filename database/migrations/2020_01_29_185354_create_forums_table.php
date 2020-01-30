<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('forum_name', 80)->default('New forum');
            $table->text('forum_desc')->nullable();
            $table->string('redirect_url', 100)->nullable();
            $table->text('moderators')->nullable();
            $table->mediumInteger('num_topics')->unsigned()->default(0);
            $table->mediumInteger('num_posts')->unsigned()->default(0);
            $table->integer('last_post')->unsigned()->nullable();
            $table->integer('last_post_id')->unsigned()->nullable();
            $table->string('last_poster', 200)->nullable();
            $table->boolean('sort_by')->default(0);
            $table->integer('disp_position')->default(0);
            $table->integer('cat_id')->unsigned()->default(0);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forums');
    }

}
