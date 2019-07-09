<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562675254976TastCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('tast_categories', function (Blueprint $table) {
            $table->string('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tast_categories', function (Blueprint $table) {
        });
    }
}
