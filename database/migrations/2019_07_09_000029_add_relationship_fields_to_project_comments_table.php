<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('project_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_161429')->references('id')->on('users');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_fk_161430')->references('id')->on('projects');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_161431')->references('id')->on('clients');
        });
    }
}
