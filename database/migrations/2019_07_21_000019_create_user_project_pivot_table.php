<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('user_project', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_1781437')->references('id')->on('projects');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_1781437')->references('id')->on('users');
        });
    }
}
