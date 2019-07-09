<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562676497385TaskCommentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_comments')) {
            Schema::create('task_comments', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('comments');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_fk_163466')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_comments');
    }
}
