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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100);
            $table->string('first_name', 100);
            $table->string('other_name', 100)->nullable();
            $table->string('username', 25)->nullable()->unique();
            $table->string('email', 100)->nullable()->unique();
            $table->string('phone', 15)->nullable()->unique();
            $table->string('user_type', 50)->default('Applicant');
            $table->tinyInteger('is_active')->default(1);
            $table->string('gender');
            $table->string('image', 50)->default('avatar.png');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('random_code', 15)->nullable()->unique();
            $table->text('notificationToken')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
