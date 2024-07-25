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
        Schema::create('posted_jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_title');
            $table->text('job_description')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('status', 50)->nullable();
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posted_jobs');
    }
};