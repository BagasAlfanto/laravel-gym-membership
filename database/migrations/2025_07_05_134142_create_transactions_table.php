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
            $table->id('id_transaction');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->date('transaction_date');
            $table->foreignId('membership_id')->constrained('memberships', 'id_membership')->onDelete('cascade');
            $table->integer('quota_pt')->default(0);
            $table->foreignId('personal_trainer_id')->nullable()->constrained('personal_trainers', 'id_pt')->onDelete('set null');
            $table->decimal('total_amount', 10, 2);
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
