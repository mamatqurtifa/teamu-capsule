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
        Schema::create('capsules-post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('image');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('capsule_type', ['public', 'private'])->default('private');
            $table->timestamps();
            $table->timestamp('future_time');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsules-post');
    }
};
