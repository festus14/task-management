<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_161419')->references('id')->on('clients');
            $table->unsignedInteger('project_type_id');
            $table->foreign('project_type_id', 'project_type_fk_161421')->references('id')->on('project_types');
            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('manager_id', 'manager_fk_161436')->references('id')->on('users');
        });
    }
}
