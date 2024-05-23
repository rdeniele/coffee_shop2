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
        Schema::create('tbl_item_lists', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('item_description');
            $table->integer('item_amount');
            $table->decimal('item_price', 8,2);
            $table->timestamps();
        });
    }
 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_item_lists');
    }
};
