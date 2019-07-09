<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562605244244ProjectCommentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('project_comments')) {
            Schema::create('project_comments', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_fk_161429')->references('id')->on('users');
                $table->unsignedInteger('project_id');
                $table->foreign('project_id', 'project_fk_161430')->references('id')->on('projects');
                $table->unsignedInteger('client_id');
                $table->foreign('client_id', 'client_fk_161431')->references('id')->on('clients');
                $table->longText('comments')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_comments');
    }
}
