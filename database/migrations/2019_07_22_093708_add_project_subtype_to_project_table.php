<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectSubtypeToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('project_subtype_id')->nullable();
            $table->foreign('project_subtype_id', 'project_subtype_fk_268845')->references('id')->on('project_sub_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('project_subtype_id')->nullable();
            $table->foreign('project_subtype_id', 'project_subtype_fk_268845')->references('id')->on('project_sub_types');
        });
    }
}
