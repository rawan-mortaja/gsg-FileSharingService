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
        Schema::create('file_downloads', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->string('ip_address', 15)
                ->nullable(); //ipv4
            $table->string('user_agent', 512)
                ->nullable();
            $table->string('country');
            $table->foreignId('file_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_downloads');
    }
};
