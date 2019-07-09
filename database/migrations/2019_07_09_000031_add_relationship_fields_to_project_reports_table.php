<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectReportsTable extends Migration
{
    public function up()
    {
        Schema::table('project_reports', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163925')->references('id')->on('projects');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_163926')->references('id')->on('clients');
        });
    }
}
