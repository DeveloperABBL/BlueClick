<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Basic Info
            $table->string('prefix')->nullable();
            $table->string('prefix_other')->nullable();
            $table->string('firstname');
            $table->string('surname');
            $table->string('tax_no')->unique();
            $table->date('birthday')->nullable();
            $table->string('tal_no');
            $table->string('email')->unique();
            $table->string('address1');
            $table->string('address2');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Registration Type
            $table->enum('reg_type', ['employee', 'vendor', 'buyer']);
            
            // Bank Info
            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();

            // Vendor/Buyer Info (เก็บทั้งหมดแบบเดียวกับ users_register)
            $table->string('entity_type')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('pp20_file')->nullable();
            $table->string('business_name')->nullable();
            $table->string('country')->nullable();
            $table->string('credit_days')->nullable();
            $table->string('branch_status')->nullable();
            $table->string('branch_status_no')->nullable();
            $table->string('branch_status_name')->nullable();
            $table->string('business_name_en')->nullable();
            $table->string('address1_en')->nullable();
            $table->string('address2_en')->nullable();

            // Status & Metadata
            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->foreignId('registration_id')->nullable()->constrained('users_register')->onDelete('set null');
            
            $table->rememberToken();
            $table->timestamps();
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

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};