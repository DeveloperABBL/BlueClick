<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // เพิ่มคอลัมน์และ index
            $table->unsignedBigInteger('user_register_id')
                  ->nullable()
                  ->index()
                  ->after('id');  // ตำแหน่งของคอลัมน์ตามต้องการ


            // FK
            $table->foreign('user_register_id')
                  ->references('id')
                  ->on('user_registers')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // ต้องลบ foreign key ก่อน !!!
            $table->dropForeign(['user_register_id']);

            // แล้วค่อยลบ column
            $table->dropColumn('user_register_id');
        });
    }
};

