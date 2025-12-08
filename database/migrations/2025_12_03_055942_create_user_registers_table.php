<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_registers', function (Blueprint $table) {
            $table->id();
            $table->enum('prefix', ['นาย','นาง','นางสาว','อื่นๆ']);
            $table->string('other_prefix', 50)->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('tax_id', 20);
            $table->date('birthday');
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('address', 255);
            $table->string('district', 255);
            $table->enum('type', ['พนักงาน','คู่ค้าผู้ขาย','คู่ค้าผู้ซื้อ']);
            $table->string('bank', 50)->nullable();
            $table->string('account_name', 100)->nullable();
            $table->string('account_number', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_registers');
    }
};
