<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTastCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('tast_categories', function (Blueprint $table) {
            $table->unsignedInteger('project_type_id');
            $table->foreign('project_type_id', 'project_type_fk_163333')->references('id')->on('project_types');
            $table->unsignedInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_163334')->references('id')->on('project_sub_types');
        });
    }
}
