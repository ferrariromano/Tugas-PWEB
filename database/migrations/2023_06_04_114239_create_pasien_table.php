<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            DB::statement("
            CREATE TABLE pasien (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nama VARCHAR(255) NOT NULL,
                alamat TEXT,
                no_telepon VARCHAR(20),
                created_at TIMESTAMP NULL DEFAULT NULL,
                updated_at TIMESTAMP NULL DEFAULT NULL
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE pasien;");

    }
};
