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
        Schema::create('loan', function (Blueprint $table) {
            $table->increments('loan_id');
            $table->date('borrowed_day');
            $table->date('return_day');
            $table->integer('num_books_on_loan');
            $table->text('phone_number');
            $table->unsignedInteger('reader_id')->nullable()->default(null);
            $table->foreign('reader_id')->references('reader_id')->on('readers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan');
    }
};
