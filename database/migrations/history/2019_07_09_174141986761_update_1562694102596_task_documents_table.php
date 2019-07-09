<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694102596TaskDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_163916')->references('id')->on('clients');
        });
    }

    public function down()
    {
        Schema::table('task_documents', function (Blueprint $table) {
        });
    }
}
