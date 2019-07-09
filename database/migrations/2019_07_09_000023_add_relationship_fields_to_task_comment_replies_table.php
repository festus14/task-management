<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaskCommentRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('task_comment_replies', function (Blueprint $table) {
            $table->unsignedInteger('task_comment_id');
            $table->foreign('task_comment_id', 'task_comment_fk_163500')->references('id')->on('task_comments');
            $table->unsignedInteger('reply_by_id');
            $table->foreign('reply_by_id', 'reply_by_fk_163502')->references('id')->on('users');
        });
    }
}
