<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562603197627ProjectsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('client_id');
                $table->foreign('client_id', 'client_fk_161419')->references('id')->on('clients');
                $table->string('name');
                $table->unsignedInteger('project_type_id');
                $table->foreign('project_type_id', 'project_type_fk_161421')->references('id')->on('project_types');
                $table->date('starting_date');
                $table->datetime('deadline');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
