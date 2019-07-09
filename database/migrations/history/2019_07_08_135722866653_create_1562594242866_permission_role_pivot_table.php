<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562594242866PermissionRolePivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permission_role')) {
            Schema::create('permission_role', function (Blueprint $table) {
                $table->unsignedInteger('role_id');
                $table->foreign('role_id', 'role_id_fk_161227')->references('id')->on('roles');
                $table->unsignedInteger('permission_id');
                $table->foreign('permission_id', 'permission_id_fk_161227')->references('id')->on('permissions');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
