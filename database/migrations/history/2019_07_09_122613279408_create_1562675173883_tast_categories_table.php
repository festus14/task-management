<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562675173883TastCategoriesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tast_categories')) {
            Schema::create('tast_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->unsignedInteger('project_type_id');
                $table->foreign('project_type_id', 'project_type_fk_163333')->references('id')->on('project_types');
                $table->unsignedInteger('sub_category_id')->nullable();
                $table->foreign('sub_category_id', 'sub_category_fk_163334')->references('id')->on('project_sub_types');
                $table->string('weight');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('tast_categories');
    }
}
