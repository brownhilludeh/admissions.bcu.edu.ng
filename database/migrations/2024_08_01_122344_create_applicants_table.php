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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            // fKeys
            $table->integer('user_id');
            $table->integer('session_id');

            // discipline
            $table->string('college')->nullable();
            $table->string('programme')->nullable();

            // Registration No
            $table->string('jamb_reg_no')->nullable()->unique();
            $table->string('jamb_score')->nullable();
            $table->string('o_level_reg_1')->nullable();
            $table->string('o_level_reg_2')->nullable();

            // Result Upload
            $table->string('jamb_result')->nullable();
            $table->string('o_level_1')->nullable();
            $table->string('o_level_2')->nullable();
            $table->string('birth_certificate')->nullable();

            // Note
            $table->string('decision')->default('In Progress');
            $table->longText('comment')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
