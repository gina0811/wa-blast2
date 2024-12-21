<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('auto_replies', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->unique();
            $table->text('response');
            $table->timestamps();
        });
    }       

    public function down()
    {
        Schema::dropIfExists('auto_replies');
    }
}


