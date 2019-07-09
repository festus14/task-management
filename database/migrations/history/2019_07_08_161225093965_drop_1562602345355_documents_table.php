<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1562602345355DocumentsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('documents');
    }
}
