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
        Schema::dropIfExists('order');
        Schema::create('order', function (Blueprint $table) {
            $table->string('order_id', 10)->primary();
            $table->string('studio_id', 10);
            $table->string('tema_id', 10);
            $table->string('transaksi_id', 10);
            $table->string('customer_id', 10);
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('studio_id')->references('studio_id')->on('studio');
            $table->foreign('tema_id')->references('tema_id')->on('tema');
            $table->foreign('transaksi_id')->references('transaksi_id')->on('transaksi');
            $table->foreign('customer_id')->references('customer_id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
