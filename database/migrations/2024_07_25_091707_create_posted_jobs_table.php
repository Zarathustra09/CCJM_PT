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
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
//            $table->string('looking_for')->nullable();
//            $table->string('exp_requirement')->nullable();
//            $table->string('job_feature')->nullable();
//            $table->string('educ_requirement')->nullable();
            $table->unsignedBigInteger('category_id')->constrained('categories','category_id')->onDelete('cascade');;
            $table->integer('status')->default(0);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('users',)->onDelete('cascade');
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
