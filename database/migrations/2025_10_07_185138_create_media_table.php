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
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            // Polymorphic owner
            $table->string('mediable_type', 100);
            $table->unsignedBigInteger('mediable_id');

            // File identity
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('collection', 50)->nullable();

            // Storage
            $table->string('disk', 50)->default('public');
            $table->string('path', 255);
            $table->string('orig_url', 255)->nullable();

            // File metadata
            $table->string('type', 50)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('size')->nullable();

            // Audit
            $table->timestamps();

            // Performance indexes
            $table->index(['mediable_type', 'mediable_id'], 'media_mediable_index');
            $table->index('collection', 'media_collection_index');
            $table->index('type', 'media_type_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
