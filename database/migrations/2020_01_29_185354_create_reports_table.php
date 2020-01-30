<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();

        Schema::create('reports', function (Blueprint $table) use ($prefix) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->default(0);
            $table->integer('topic_id')->unsigned()->default(0);
            $table->integer('forum_id')->unsigned()->default(0);
            $table->integer('reported_by')->unsigned()->default(0);
            $table->integer('created')->unsigned()->default(0);
            $table->text('message')->nullable();
            $table->integer('zapped')->unsigned()->nullable();
            $table->integer('zapped_by')->unsigned()->nullable();

            $table->index(['zapped'], $prefix . 'reports_zapped_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }

}
