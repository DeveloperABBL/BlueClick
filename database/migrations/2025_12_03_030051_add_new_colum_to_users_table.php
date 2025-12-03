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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('prefix', ['นาย', 'นาง', 'นางสาว', 'อื่นๆ'])->default('นาย')->comment('คำนำหน้าชื่อ');
            $table->string('custom_prefix')->nullable()->comment('คำนำหน้าชื่อแบบกำหนดเอง ถ้าเลือก "อื่นๆ"');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
