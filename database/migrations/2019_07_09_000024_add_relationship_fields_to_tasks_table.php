<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_163371')->references('id')->on('tast_categories');
            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('manager_id', 'manager_fk_163375')->references('id')->on('users');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_163401')->references('id')->on('task_statuses');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163923')->references('id')->on('projects');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_163924')->references('id')->on('clients');
        });
    }
}
