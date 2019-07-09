<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTastCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('tast_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('weight');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
