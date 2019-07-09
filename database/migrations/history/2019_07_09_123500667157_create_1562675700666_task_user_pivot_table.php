<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562675700666TaskUserPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_user')) {
            Schema::create('task_user', function (Blueprint $table) {
                $table->unsignedInteger('task_id');
                $table->foreign('task_id', 'task_id_fk_163374')->references('id')->on('tasks');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_id_fk_163374')->references('id')->on('users');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_user');
    }
}
