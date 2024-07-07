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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->increments('warehouse_id');
            $table->string('book_code');
            $table->string('book_title');
            $table->decimal('price_in', 8, 2);
            $table->string('supplier');
            $table->integer('quantity_in_stock');
            $table->integer('num_newly_imported_books');
            $table->date('input_day');
            $table->string('status');
            $table->unsignedInteger('admin_id')->nullable()->default(null);

            $table->foreign('admin_id')->references('admin_id')->on('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse');
    }
};
