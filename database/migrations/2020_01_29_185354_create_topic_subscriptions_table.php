<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicSubscriptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_subscriptions', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('topic_id')->unsigned()->default(0);

            $table->primary(['user_id', 'topic_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topic_subscriptions');
    }

}
