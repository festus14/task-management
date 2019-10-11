<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollLettersTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_letters', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');

            $table->string('contact_person');

            $table->string('company_short_name');

            $table->string('staff_name')->nullable();

            $table->longText('client_summary')->nullable();

            $table->longText('fees_table')->nullable();

            $table->longText('fees_footer')->nullable();

            $table->longText('other_services_charges')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
