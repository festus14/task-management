<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694209655TaskCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_comments', function (Blueprint $table) {
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id', 'task_fk_163920')->references('id')->on('tasks');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_163921')->references('id')->on('clients');
        });
    }

    public function down()
    {
        Schema::table('task_comments', function (Blueprint $table) {
        });
    }
}
