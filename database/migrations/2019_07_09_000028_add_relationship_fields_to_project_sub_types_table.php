<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectSubTypesTable extends Migration
{
    public function up()
    {
        Schema::table('project_sub_types', function (Blueprint $table) {
            $table->unsignedInteger('project_type_id');
            $table->foreign('project_type_id', 'project_type_fk_161357')->references('id')->on('project_types');
        });
    }
}
