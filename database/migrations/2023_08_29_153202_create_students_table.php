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
        Schema::create('students', function (Blueprint $table) {
            $table->id();            
            $table->string('fish');
            $table->string('img')->nullable();
            $table->string('millati')->nullable();
            $table->string('student_or_ticher')->nullable();
            $table->string('tugulgan_yili')->nullable();
            $table->string('fakultet')->nullable();
            $table->string('yonalish')->nullable();
            $table->string('guruh')->nullable();
            $table->string('uy_manzili')->nullable();
            $table->string('telefoni')->nullable();
            $table->string('pass_info')->nullable();
            $table->boolean('status')->default(1);                     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
