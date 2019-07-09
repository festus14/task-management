<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562605352716ProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('manager_id', 'manager_fk_161436')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
        });
    }
}
