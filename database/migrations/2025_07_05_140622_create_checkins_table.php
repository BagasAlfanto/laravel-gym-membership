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
        Schema::create('checkins', function (Blueprint $table) {
            $table->id('id_checkin');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->date('checkin_date');
            $table->integer('lockers_used');
            $table->time('checkin_time');
            $table->time('checkout_time')->nullable();
            $table->boolean('used_pt')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};
