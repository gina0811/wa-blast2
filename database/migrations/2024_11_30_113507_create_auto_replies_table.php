<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('auto_replies', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('trigger_word'); // Kata kunci untuk auto-reply
            $table->text('reply_message'); // Pesan balasan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_replies');
    }
};
