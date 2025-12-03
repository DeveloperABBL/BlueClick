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
            $table->enum('prefix', ['นาย', 'นาง', 'นางสาว', 'อื่นๆ'])->default('นาย')->comment('คำนำหน้าชื่อ');
            $table->string('custom_prefix')->nullable()->comment('คำนำหน้าชื่อแบบกำหนดเอง ถ้าเลือก "อื่นๆ"');
            $table->string('firstname')->comment('ชื่อจริง');
            $table->string('surname')->comment('นามสกุล');
            $table->string('tax_no')->comment('เลขประจำตัวผู้เสียภาษี');
            $table->date('birthday')->nullable()->comment('วันเกิด');
            $table->string('tal_no')->comment('เบอร์โทรศัพท์');
            $table->string('email')->unique()->comment('Email');
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
