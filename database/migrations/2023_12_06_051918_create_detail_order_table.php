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
        Schema::create('detail_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 10);
            $table->string('order_jam_id', 10);
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('order');
            $table->foreign('order_jam_id')->references('order_jam_id')->on('order_jam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_order');
    }
};
