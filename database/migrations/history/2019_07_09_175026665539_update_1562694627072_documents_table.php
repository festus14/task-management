<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562694627072DocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_163927')->references('id')->on('clients');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_163928')->references('id')->on('project_comments');
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
        });
    }
}
