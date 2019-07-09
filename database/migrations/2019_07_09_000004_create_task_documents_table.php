<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('task_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('document_type');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
