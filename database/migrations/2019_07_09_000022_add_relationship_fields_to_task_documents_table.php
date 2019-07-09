<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaskDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->foreign('task_id', 'task_fk_163910')->references('id')->on('tasks');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_fk_163915')->references('id')->on('projects');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_163916')->references('id')->on('clients');
        });
    }
}
