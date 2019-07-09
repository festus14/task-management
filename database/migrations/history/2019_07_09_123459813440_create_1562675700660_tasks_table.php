<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562675700660TasksTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->unsignedInteger('category_id');
                $table->foreign('category_id', 'category_fk_163371')->references('id')->on('tast_categories');
                $table->datetime('starting_date');
                $table->datetime('ending_date');
                $table->unsignedInteger('manager_id')->nullable();
                $table->foreign('manager_id', 'manager_fk_163375')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
