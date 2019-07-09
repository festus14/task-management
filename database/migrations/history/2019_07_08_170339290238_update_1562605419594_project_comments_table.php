<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562605419594ProjectCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('project_comments', function (Blueprint $table) {
            $table->string('action_required')->nullable();
        });
    }

    public function down()
    {
        Schema::table('project_comments', function (Blueprint $table) {
        });
    }
}
