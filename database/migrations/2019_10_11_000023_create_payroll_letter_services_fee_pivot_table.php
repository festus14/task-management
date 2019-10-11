<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollLetterServicesFeePivotTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_letter_services_fee', function (Blueprint $table) {
            $table->unsignedInteger('payroll_letter_id');

            $table->foreign('payroll_letter_id', 'payroll_letter_id_fk_452491')->references('id')->on('payroll_letters')->onDelete('cascade');

            $table->unsignedInteger('services_fee_id');

            $table->foreign('services_fee_id', 'services_fee_id_fk_452491')->references('id')->on('services_fees')->onDelete('cascade');
        });
    }
}
