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
        Schema::create('paper', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roll');
            $table->string('dept');
            $table->string('year');
            $table->string('title');
            $table->string('year_p');
            $table->string('publisher');
            $table->string('paper')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper');
    }
};
