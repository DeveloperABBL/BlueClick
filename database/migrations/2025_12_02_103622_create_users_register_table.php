<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_register', function (Blueprint $table) {
            $table->id();

            // Contact Info
            $table->string('prefix')->nullable();      // คำนำหน้า
            $table->string('firstname');               // ชื่อจริง
            $table->string('surname');                 // นามสกุล
            $table->string('tax_no');                  // เลขผู้เสียภาษี

            $table->date('birthday')->nullable();      // วันเกิด

            $table->string('tal_no');                  // เบอร์โทรศัพท์
            $table->string('email')->unique();         // Email

            $table->string('address1');                // ที่อยู่เลขที่
            $table->string('address2');                // ตำบล อำเภอ จังหวัด รหัสไปรษณีย์

            // user_group = employee, vender, buyer
            $table->enum('user_group', ['employee', 'vender', 'buyer']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_register');
    }
};
