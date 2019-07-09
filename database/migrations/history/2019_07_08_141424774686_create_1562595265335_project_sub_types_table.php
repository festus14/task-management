<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562595265335ProjectSubTypesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('project_sub_types')) {
            Schema::create('project_sub_types', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('project_type_id');
                $table->foreign('project_type_id', 'project_type_fk_161357')->references('id')->on('project_types');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_sub_types');
    }
}
