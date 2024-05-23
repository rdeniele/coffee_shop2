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
        Schema::create('tbl_add_ons', function (Blueprint $table) {
            $table->id();
            $table->string('add_on_name');
            $table->decimal('add_on_price', 8,2);
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_add_ons');
    }
};
