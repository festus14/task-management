<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPayrollLettersTable extends Migration
{
    public function up()
    {
        Schema::table('payroll_letters', function (Blueprint $table) {
            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'client_fk_451854')->references('id')->on('clients');

            $table->unsignedInteger('project_id');

            $table->foreign('project_id', 'project_fk_452038')->references('id')->on('projects');

            $table->unsignedInteger('type_id');

            $table->foreign('type_id', 'type_fk_456160')->references('id')->on('letter_types');
        });
    }
}
