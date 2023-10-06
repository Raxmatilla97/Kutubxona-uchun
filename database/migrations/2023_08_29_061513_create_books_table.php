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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('book_inventar_number')->nullable();
            $table->string('book_or_article')->nullable();
            $table->string('nashriyot_nomi')->nullable();
            $table->string('chiqarilgan_yili')->nullable();            
            $table->string('isbn_issn')->nullable();
            $table->string('sahifa_soni_va_olcham')->nullable();
            $table->string('nechanchi_nashr')->nullable();
            // $table->string('yozilgan_tili')->nullable();
            // $table->string('kitobga_javobgar')->nullable();
            $table->foreignId('kitobga_javobgar_id')->nullable()->constrained('users')->onDelete('cascade');      
            // $table->string('gmd_name')->nullable();
            $table->text('tags')->nullable();
            $table->string('classificatsiya')->nullable();
            $table->boolean('status')->default(0);
            // $table->integer('uzgaruvchan_soni')->nullable()->default('1');
            // $table->integer('uzgarmas_soni')->nullable()->default('1');
            $table->text('notes')->nullable();
            $table->boolean('tafsiya_etiladi')->default('0');
            $table->integer('korishlar_soni')->nullable()->default('0');
            $table->integer('oqishlar_soni')->nullable()->default('0');
            $table->foreignId('book_category_id')->nullable()->constrained('book_categories')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
