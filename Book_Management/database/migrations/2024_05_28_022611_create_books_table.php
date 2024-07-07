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
            $table->increments('book_id');
            $table->string('book_name');
            $table->integer('num_of_prints');
            $table->string('publisher_year');
            $table->integer('price');
            $table->string('author');
            $table->string('image');
            $table->unsignedInteger('loan_id')->nullable()->default(null); // Đảm bảo cột loan_id là kiểu unsignedInteger
            $table->foreign('loan_id')->references('loan_id')->on('loan');
            $table->unsignedInteger('publisher_id')->nullable()->default(null);
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers');
            $table->unsignedInteger('warehouse_id')->nullable()->default(null);
            $table->foreign('warehouse_id')->references('warehouse_id')->on('warehouse');
            $table->foreign('author_id')->references('author_id')->on('author');
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
