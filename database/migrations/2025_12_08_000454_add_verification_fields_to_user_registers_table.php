<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_registers', function (Blueprint $table) {

            $table->string('verification_token', 100)
                  ->nullable()
                  ->after('email');

            $table->boolean('is_verified')
                  ->default(false)
                  ->after('verification_token');

            $table->boolean('is_approved')
                  ->default(false)
                  ->after('is_verified');

            $table->string('password_set_token', 100)
                  ->nullable()
                  ->after('is_approved');
        });
    }

    public function down(): void
    {
        Schema::table('user_registers', function (Blueprint $table) {
            $table->dropColumn([
                'verification_token',
                'is_verified',
                'is_approved',
                'password_set_token',
            ]);
        });
    }
};
