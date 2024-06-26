<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('send_from', 50)->nullable();
            $table->string('send_to', 50)->nullable();
            $table->string('message', 250)->nullable();
            $table->string('purl_confirmation', 100)->nullable();
            $table->dateTime('purl_confirmation_sent')->nullable();
            $table->string('purl_read', 100)->nullable();
            $table->dateTime('purl_read_sent')->nullable();
            $table->dateTime('message_readed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
