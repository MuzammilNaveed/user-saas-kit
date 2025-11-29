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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->nullable()->default(0);
            $table->boolean('is_admin')->default(false);
            $table->json('social_login')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('onboarding_step')->default(0);
            $table->integer('invited_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
