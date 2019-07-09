<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694251148TaskCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_comments', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163922')->references('id')->on('projects');
        });
    }

    public function down()
    {
        Schema::table('task_comments', function (Blueprint $table) {
        });
    }
}
