<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('project_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comments')->nullable();
            $table->string('action_required')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
