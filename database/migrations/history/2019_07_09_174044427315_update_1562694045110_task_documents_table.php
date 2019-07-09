<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694045110TaskDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_fk_163915')->references('id')->on('projects');
        });
    }

    public function down()
    {
        Schema::table('task_documents', function (Blueprint $table) {
        });
    }
}
