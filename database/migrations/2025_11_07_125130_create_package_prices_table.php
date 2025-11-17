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
        Schema::create('package_prices', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel 'packages'
            $table->foreignId('package_id')->constrained()->onDelete('cascade');

            $table->string('name'); // Cth: "Quad (1 Kamar ber-4)"
            $table->bigInteger('price'); // Cth: 23000000
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_prices');
    }
};
