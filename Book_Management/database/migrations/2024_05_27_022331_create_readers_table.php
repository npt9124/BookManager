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
        Schema::create('readers', function (Blueprint $table) {
            $table->increments('reader_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('gender');
            $table->text('phone_number');
            $table->integer('total_num_books_borrowed');
            $table->date('birthday');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readers');
    }
};
