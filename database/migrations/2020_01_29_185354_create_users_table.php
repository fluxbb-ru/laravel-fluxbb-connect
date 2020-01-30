<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('users', function (Blueprint $table) use ($prefix) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->default(3);
            $table->string('username', 200)->default('');
            $table->string('password', 40)->default('');
            $table->string('email', 80)->default('');
            $table->string('title', 50)->nullable();
            $table->string('realname', 40)->nullable();
            $table->string('url', 100)->nullable();
            $table->string('jabber', 80)->nullable();
            $table->string('icq', 12)->nullable();
            $table->string('msn', 80)->nullable();
            $table->string('aim', 30)->nullable();
            $table->string('yahoo', 30)->nullable();
            $table->string('location', 30)->nullable();
            $table->text('signature')->nullable();
            $table->boolean('disp_topics')->nullable();
            $table->boolean('disp_posts')->nullable();
            $table->boolean('email_setting')->default(1);
            $table->boolean('notify_with_post')->default(0);
            $table->boolean('auto_notify')->default(0);
            $table->boolean('show_smilies')->default(1);
            $table->boolean('show_img')->default(1);
            $table->boolean('show_img_sig')->default(1);
            $table->boolean('show_avatars')->default(1);
            $table->boolean('show_sig')->default(1);
            $table->float('timezone', 10, 0)->default(0);
            $table->boolean('dst')->default(0);
            $table->boolean('time_format')->default(0);
            $table->boolean('date_format')->default(0);
            $table->string('language', 25)->default('English');
            $table->string('style', 25)->default('Air');
            $table->integer('num_posts')->unsigned()->default(0);
            $table->integer('last_post')->unsigned()->nullable();
            $table->integer('last_search')->unsigned()->nullable();
            $table->integer('last_email_sent')->unsigned()->nullable();
            $table->integer('last_report_sent')->unsigned()->nullable();
            $table->integer('registered')->unsigned()->default(0);
            $table->string('registration_ip', 39)->default('0.0.0.0');
            $table->integer('last_visit')->unsigned()->default(0);
            $table->string('admin_note', 30)->nullable();
            $table->string('activate_string', 80)->nullable();
            $table->string('activate_key', 8)->nullable();

            $table->unique([DB::raw('username(25)')], $prefix . 'users_username_idx');
            $table->index(['registered'], $prefix . 'users_registered_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
