<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694318336TasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163923')->references('id')->on('projects');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_163924')->references('id')->on('clients');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
        });
    }
}
