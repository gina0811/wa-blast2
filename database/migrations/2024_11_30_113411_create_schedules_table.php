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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('phone_number'); // Nomor telepon penerima
            $table->text('message'); // Isi pesan
            $table->dateTime('scheduled_time'); // Waktu pengiriman terjadwal
            $table->string('status')->default('pending'); // Status (pending/sent)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
