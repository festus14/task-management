<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562677452029TaskDocumentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_documents')) {
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

    public function down()
    {
        Schema::dropIfExists('task_documents');
    }
}
