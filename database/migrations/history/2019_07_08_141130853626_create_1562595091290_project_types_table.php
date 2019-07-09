<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562595091290ProjectTypesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('project_types')) {
            Schema::create('project_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_types');
    }
}
