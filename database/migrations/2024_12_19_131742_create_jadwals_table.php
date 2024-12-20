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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('hari');
            $table->string('jam');
            // $table->foreignId('mapel')->constrained('mapels')->references('id')->onDelete('cascade');
            $table->foreignId('mapel_id')->constrained('mapels');
            $table->foreignId('kelas_ke')->constrained('kelas')->references('id')->onDelete('cascade');
            $table->string('ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
