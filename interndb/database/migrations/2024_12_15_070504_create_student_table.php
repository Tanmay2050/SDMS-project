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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Of_The_Student');
            $table->string('Roll_no');
            $table->string('Branch');
            $table->integer('Year_Of_Study');
            $table->string('Title_Of_Course');
            $table->string('Organizing_Body');
            $table->string('Duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
