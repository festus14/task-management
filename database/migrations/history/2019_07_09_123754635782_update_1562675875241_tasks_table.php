<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562675875241TasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_163401')->references('id')->on('task_statuses');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
        });
    }
}
