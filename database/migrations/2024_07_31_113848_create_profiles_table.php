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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('birthday')->nullable();
            $table->string('marital_status', 30)->nullable();
            $table->date('date_joined')->nullable()->default(date('Y-m-d'));
            $table->string('religion', 20)->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('country', 56)->nullable();
            $table->string('qualification', 20)->nullable();

            // address
            $table->string('current_address', 500)->nullable();
            $table->string('permanent_address', 500)->nullable();
            $table->string('contract_type', 25)->nullable();

            // about
            $table->longText('about')->nullable();

            // socials
            $table->string('portfolio_url', 100)->nullable();
            $table->string('facebook_url', 100)->nullable();
            $table->string('twitter_url', 100)->nullable();
            $table->string('instagram_url', 100)->nullable();

            // Hobbies
            $table->string('skills')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
