<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubProjectTypeToTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('project_subtype_id')->nullable();
            $table->foreign('project_subtype_id', 'project_subtype_fk_7663923')->references('id')->on('project_sub_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('project_subtype_id')->nullable();
            $table->foreign('project_subtype_id', 'project_subtype_fk_7663923')->references('id')->on('project_sub_types');
        });
    }
}
