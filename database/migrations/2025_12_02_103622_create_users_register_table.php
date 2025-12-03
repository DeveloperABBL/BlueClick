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
            $table->string('prefix')->nullable();
            $table->string('firstname');
            $table->string('surname');
            $table->string('tax_no');
            $table->date('birthday')->nullable();
            $table->string('tal_no');
            $table->string('email')->unique();
            $table->string('address1');
            $table->string('address2');

            // Registration Type (แก้ไขให้ตรงกับฟอร์ม)
            $table->enum('reg_type', ['employee', 'vendor', 'buyer']);

            // Bank Info (สำหรับพนักงาน)
            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_register');
    }
};
