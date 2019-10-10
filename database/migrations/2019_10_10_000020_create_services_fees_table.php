<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesFeesTable extends Migration
{
    public function up()
    {
        Schema::create('services_fees', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->decimal('amount', 15, 2);

            $table->string('currency')->nullable();

            $table->float('currency_rate', 20, 2)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
