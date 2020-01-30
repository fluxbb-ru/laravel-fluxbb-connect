<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumPermsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_perms', function (Blueprint $table) {
            $table->integer('group_id')->default(0);
            $table->integer('forum_id')->default(0);
            $table->boolean('read_forum')->default(1);
            $table->boolean('post_replies')->default(1);
            $table->boolean('post_topics')->default(1);

            $table->primary(['group_id', 'forum_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_perms');
    }

}
