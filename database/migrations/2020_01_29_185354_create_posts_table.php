<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('posts', function (Blueprint $table) use ($prefix) {
            $table->increments('id');
            $table->string('poster', 200)->default('');
            $table->integer('poster_id')->unsigned()->default(1);
            $table->string('poster_ip', 39)->nullable();
            $table->string('poster_email', 80)->nullable();
            $table->mediumText('message')->nullable();
            $table->boolean('hide_smilies')->default(0);
            $table->integer('posted')->unsigned()->default(0);
            $table->integer('edited')->unsigned()->nullable();
            $table->string('edited_by', 200)->nullable();
            $table->integer('topic_id')->unsigned()->default(0);

            $table->index(['topic_id'], $prefix . 'posts_topic_id_idx');
            $table->index(['poster_id', 'topic_id'], $prefix . 'posts_multi_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }

}
