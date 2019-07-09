<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562675753966TaskStatusesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_statuses')) {
            Schema::create('task_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_statuses');
    }
}
