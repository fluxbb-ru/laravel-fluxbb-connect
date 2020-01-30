<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('g_id');
            $table->string('g_title', 50)->default('');
            $table->string('g_user_title', 50)->nullable();
            $table->integer('g_promote_min_posts')->unsigned()->default(0);
            $table->integer('g_promote_next_group')->unsigned()->default(0);
            $table->boolean('g_moderator')->default(0);
            $table->boolean('g_mod_edit_users')->default(0);
            $table->boolean('g_mod_rename_users')->default(0);
            $table->boolean('g_mod_change_passwords')->default(0);
            $table->boolean('g_mod_ban_users')->default(0);
            $table->boolean('g_mod_promote_users')->default(0);
            $table->boolean('g_read_board')->default(1);
            $table->boolean('g_view_users')->default(1);
            $table->boolean('g_post_replies')->default(1);
            $table->boolean('g_post_topics')->default(1);
            $table->boolean('g_edit_posts')->default(1);
            $table->boolean('g_delete_posts')->default(1);
            $table->boolean('g_delete_topics')->default(1);
            $table->boolean('g_post_links')->default(1);
            $table->boolean('g_set_title')->default(1);
            $table->boolean('g_search')->default(1);
            $table->boolean('g_search_users')->default(1);
            $table->boolean('g_send_email')->default(1);
            $table->smallInteger('g_post_flood')->default(30);
            $table->smallInteger('g_search_flood')->default(30);
            $table->smallInteger('g_email_flood')->default(60);
            $table->smallInteger('g_report_flood')->default(60);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }

}
