<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('scheduled_messages', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->text('message');
            $table->dateTime('send_at');
            $table->boolean('is_sent')->default(false); // Status pengiriman
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scheduled_messages');
    }
}
