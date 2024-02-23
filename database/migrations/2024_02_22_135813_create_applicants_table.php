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
            // Demography
            $table->integer('user_id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->string('name_title');
            $table->date('birthday');
            $table->string('marital_status');
            $table->string('reg_no')->unique();
            $table->string('gender', 1);
            // Contact Info
            $table->text('address');
            $table->string('home_town')->nullable();
            $table->string('mobile', 14)->nullable();
            $table->string('state');
            $table->string('city')->nullable();
            $table->string('country');
            // Parent Info
            $table->string('parent_name');
            $table->string('relationship');
            $table->string('parent_address');
            $table->string('parent_occupation');
            $table->string('parent_phone');
            $table->string('parent_email');
            // Next of Kin Info
            $table->string('nok_name');
            $table->string('nok_relationship');
            $table->string('nok_address');
            $table->string('nok_pob');
            $table->string('nok_phone');
            $table->string('nok_email');
            //  Others
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
