<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562693533783TaskDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->foreign('task_id', 'task_fk_163910')->references('id')->on('tasks');
        });
    }

    public function down()
    {
        Schema::table('task_documents', function (Blueprint $table) {
        });
    }
}
