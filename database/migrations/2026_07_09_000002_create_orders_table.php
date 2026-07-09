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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('game_id')->nullable(); // For top-ups
            $table->string('zone_id')->nullable(); // For top-ups
            
            // For Jasa Joki account login credentials
            $table->string('account_email')->nullable();
            $table->string('account_password')->nullable();
            $table->string('login_via')->nullable(); // 'moonton', 'facebook', 'vk'
            $table->string('hero_request')->nullable(); // custom instructions
            
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'success', 'failed'])->default('pending');
            $table->string('payment_method')->default('dana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
