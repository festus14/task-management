<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectReportsTable extends Migration
{
    public function up()
    {
        Schema::create('project_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('project_report')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
