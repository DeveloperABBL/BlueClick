<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_register', function (Blueprint $table) {
            $table->id();

            // Contact Info
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

            // Registration Type
            $table->enum('reg_type', ['employee', 'vendor', 'buyer']);

            // Bank Info (สำหรับพนักงาน)
            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();

            // Vendor Info
            $table->string('vendor_entity_type')->nullable();
            $table->string('vendor_certificate_file')->nullable();
            $table->string('vendor_pp20_file')->nullable();
            $table->string('vendor_business_name')->nullable();
            $table->string('vendor_country')->nullable();
            $table->string('vendor_credit_days')->nullable();
            $table->string('vendor_branch_status')->nullable();
            $table->string('vendor_branch_status_no')->nullable();
            $table->string('vendor_branch_status_name')->nullable();
            $table->string('vendor_business_name_en')->nullable();
            $table->string('vendor_address1_en')->nullable();
            $table->string('vendor_address2_en')->nullable();

            // Buyer Info
            $table->string('buyer_entity_type')->nullable();
            $table->string('buyer_certificate_file')->nullable();
            $table->string('buyer_pp20_file')->nullable();
            $table->string('buyer_business_name')->nullable();
            $table->string('buyer_country')->nullable();
            $table->string('buyer_credit_days')->nullable();
            $table->string('buyer_branch_status')->nullable();
            $table->string('buyer_branch_status_no')->nullable();
            $table->string('buyer_branch_status_name')->nullable();
            $table->string('buyer_business_name_en')->nullable();
            $table->string('buyer_address1_en')->nullable();
            $table->string('buyer_address2_en')->nullable();

            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reject_reason')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable()->comment('Admin user ID');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_register');
    }
};
