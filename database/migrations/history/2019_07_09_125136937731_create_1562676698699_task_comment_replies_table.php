<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562676698699TaskCommentRepliesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('task_comment_replies')) {
            Schema::create('task_comment_replies', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('task_comment_id');
                $table->foreign('task_comment_id', 'task_comment_fk_163500')->references('id')->on('task_comments');
                $table->longText('task_comment_reply');
                $table->unsignedInteger('reply_by_id');
                $table->foreign('reply_by_id', 'reply_by_fk_163502')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('task_comment_replies');
    }
}
