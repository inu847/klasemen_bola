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
        Schema::create('skor_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->integer('skor_klub_1');
            $table->integer('skor_klub_2');
            $table->unsignedBigInteger('klub_id_1')->index();
            $table->unsignedBigInteger('klub_id_2')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_pertandingans');
    }
};
