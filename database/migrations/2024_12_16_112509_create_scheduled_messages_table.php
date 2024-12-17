<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasTable('scheduled_messages')) {
        Schema::create('scheduled_messages', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_type');
            $table->boolean('is_blast')->default(false);
            $table->string('caption')->nullable();
            $table->string('number');
            $table->string('message');
            $table->dateTime('start_in');
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }
}

    public function down()
    {
        Schema::dropIfExists('scheduled_messages');
    }
};
