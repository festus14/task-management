<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCommentRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('task_comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('task_comment_reply');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
