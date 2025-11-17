<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Mengubah kolom-kolom ini agar boleh diisi NULL
            $table->date('departure_date')->nullable()->change();
            $table->integer('duration_days')->nullable()->change();
            $table->string('airline')->nullable()->change();
            $table->string('departure_city')->nullable()->change();

            // Kita juga buat total_seats dan seats_filled punya nilai default 0
            // jika diisi NULL (untuk keamanan)
            $table->integer('total_seats')->nullable()->default(0)->change();
            $table->integer('seats_filled')->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
};
