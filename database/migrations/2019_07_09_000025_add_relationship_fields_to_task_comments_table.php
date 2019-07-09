<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaskCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_163466')->references('id')->on('users');
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id', 'task_fk_163920')->references('id')->on('tasks');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_163921')->references('id')->on('clients');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163922')->references('id')->on('projects');
        });
    }
}
