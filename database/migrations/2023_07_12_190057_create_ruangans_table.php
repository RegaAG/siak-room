<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('room_type');
            $table->integer('capacity');
            $table->string('location');
            $table->string('foto');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
