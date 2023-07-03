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
        Schema::create('data_otdps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kepolisian');
            $table->string('umur');
            $table->string('ttl');
            $table->string('pekerjaan');
            $table->string('destinasi_tujuan');
            $table->string('destinasi_pulau')->nullable(); ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_otdps');
    }
};
