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
        Schema::create('agent_documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->foreignId('agent_id')->constrained('agents', 'agent_id')->onDelete('cascade');
            $table->text('resume')->nullable();
            $table->text('government_id')->nullable();
            $table->text('proof_of_address')->nullable();
            $table->text('nbi_clearance')->nullable();
            $table->text('medical_cert')->nullable();
            $table->text('drug_test')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicatant_documents');
    }
};
