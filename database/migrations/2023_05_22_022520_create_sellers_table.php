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
        Schema::create('sellers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->timestamps();

            $table->foreign('village_id')->references('id')->on('indonesia_villages');
            $table->foreign('district_id')->references('id')->on('indonesia_districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
