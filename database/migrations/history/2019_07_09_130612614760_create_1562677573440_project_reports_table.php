<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562677573440ProjectReportsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('project_reports')) {
            Schema::create('project_reports', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('project_report')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_reports');
    }
}
