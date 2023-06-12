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
        Schema::create('dokter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('spesialisasi_id');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->timestamps();

            $table->foreign('spesialisasi_id')
                ->references('id')
                ->on('spesialisasi')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
