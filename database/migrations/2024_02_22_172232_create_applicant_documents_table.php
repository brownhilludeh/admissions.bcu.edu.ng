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
        Schema::create('applicant_documents', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('applicant_id');
            $table->string('session_id');
            // Jamb
            $table->string('jamb_score');
            $table->string('jamb_reg');
            $table->string('jamb_result');
            // first sitting
            $table->string('ssce_1');
            $table->string('ssce_1_result');
            $table->string('ssce_reg');
            $table->string('school_name_1');
            // second sitting
            $table->string('ssce_2');
            $table->string('ssce_2_result');
            $table->string('ssce_reg');
            $table->string('school_name_2');
            // course choice 
            $table->string('college_id');
            $table->string('department_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_documents');
    }
};
