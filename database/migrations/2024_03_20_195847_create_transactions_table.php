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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('transaction_status');
            $table->string('payment_type');
            $table->string('order_id');
            $table->string('issuer')->nullable();
            $table->string('va_number')->nullable();
            $table->string('bank')->nullable();
            $table->string('merchant_id');
            $table->string('gross_amount');
            $table->string('currency');
            $table->timestamp('transaction_time');
            $table->timestamp('expiry_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
