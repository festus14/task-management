<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562605352718DocumentProjectPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('document_project')) {
            Schema::create('document_project', function (Blueprint $table) {
                $table->unsignedInteger('project_id');
                $table->foreign('project_id', 'project_id_fk_161437')->references('id')->on('projects');
                $table->unsignedInteger('document_id');
                $table->foreign('document_id', 'document_id_fk_161437')->references('id')->on('documents');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('document_project');
    }
}
