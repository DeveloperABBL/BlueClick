@extends('layouts.auth')
@section('content')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <div class="mb-5 text-white-50 text-center">
        <h1 class="dislay-5 coming-soon-text">ลงทะเบียนผู้ใช้งานระบบ</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                <form id="mangaForm" method="POST" action="/author/insert">
                    @csrf
                    <div id="formUser">

                        <div class="card-header border-bottom">
                            <h4 class="card-title mb-0 mt-2">
                                ข้อมูลผู้ติดต่อ
                            </h4>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 px-2 mb-3">
                                        <label class="form-label">ประเภทการลงทะเบียน</label>
                                        <span class="text text-danger"> *</span>
                                        <div class="d-flex gap-4 mt-1">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reg_type"
                                                    id="reg_type_employee" value="employee">
                                                <label class="form-check-label" for="reg_type_employee">พนักงาน</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reg_type"
                                                    id="reg_type_vendor" value="vendor">
                                                <label class="form-check-label" for="reg_type_vendor">คู่ค้าผู้ขาย</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reg_type"
                                                    id="reg_type_buyer" value="buyer">
                                                <label class="form-check-label" for="reg_type_buyer">คู่ค้าผู้ซื้อ</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <!-- Employee Bank Section -->
                                    <div id="employee_bank_section" class="row" style="display:none;">
                                        <div class="col-md-4 px-2 mb-3">
                                            <label class="form-label">บัญชีธนาคาร (สำหรับรับเงินเดือน)</label>
                                            <span class="text text-danger"> *</span>
                                            <select class="form-select" name="bank_name">
                                                <option value="">กรุณาเลือก</option>
                                                <option value="1">กรุงเทพ จำกัด (มหาชน)</option>
                                                <option value="2">กสิกรไทย จำกัด (มหาชน)</option>
                                                <option value="3">กรุงไทย จำกัด (มหาชน)</option>
                                                <option value="4">กรุงศรีอยุธยา จำกัด (มหาชน)</option>
                                                <option value="5">ไทยพาณิชย์ จำกัด (มหาชน)</option>
                                                <option value="6">ทหารไทยธนชาต จำกัด (มหาชน)</option>
                                                <option value="7">ทิสโก้ จำกัด (มหาชน)</option>
                                                <option value="8">ซีไอเอ็มบีไทย จำกัด (มหาชน)</option>
                                                <option value="9">เกียรตินาคิน จำกัด (มหาชน)</option>
                                                <option value="10">ไทยเครดิตเพื่อรายย่อย จำกัด (มหาชน)</option>
                                                <option value="11">ยูโอบี จำกัด (มหาชน)</option>
                                                <option value="12">แลนด์ แอนด์ เฮ้าส์ จำกัด (มหาชน)</option>
                                                <option value="13">ไอซีบีซี (ไทย) จำกัด (มหาชน)</option>
                                                <option value="14">ธ.ก.ส.</option>
                                                <option value="15">ธนาคารออมสิน</option>
                                                <option value="16">ธอส.</option>
                                                <option value="17">ธนาคารอิสลามแห่งประเทศไทย</option>
                                                <option value="18">ธนาคารแห่งประเทศไทย</option>
                                                <option value="19">เดอะรอยัลแบงก์อ๊อฟสกอตแลนด์</option>
                                                <option value="20">ธนาคารเจพี มอร์แกน เชส</option>
                                                <option value="21">ธนาคารซิตี้แบงค์</option>
                                                <option value="22">ชูมิโตโม มิตซุย แบงกิ้ง คอร์ปอเรชั่น</option>
                                                <option value="23">สแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                                                <option value="24">เมกะ สากลพาณิชย์</option>
                                                <option value="25">แบงก์ออฟอเมริกา</option>
                                                <option value="26">HSBC</option>
                                                <option value="27">ดอยซ์แบงก์</option>
                                                <option value="28">มิซูโฮ</option>
                                                <option value="29">บีเอ็นพี พารีบาส์</option>
                                                <option value="30">ธนาคารแห่งประเทศจีน (ไทย)</option>
                                                <option value="31">ANZ (ไทย)</option>
                                                <option value="32">China Construction Bank</option>
                                                <option value="33">PromptPay</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">ชื่อบัญชี</label>
                                            <span class="text text-danger"> *</span>
                                            <input type="text" class="form-control" name="bank_account_name"
                                                placeholder="ชื่อบัญชี">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">เลขที่บัญชี</label>
                                            <span class="text text-danger"> *</span>
                                            <input type="text" class="form-control" name="bank_account_number"
                                                placeholder="เลขที่บัญชี">
                                        </div>
                                    </div>

                                    <!-- Vendor Section -->
                                    <div id="vendor_section" class="row" style="display:none;">
                                        <div class="col-lg-4 px-2 mb-3">
                                            <label class="form-label">รูปแบบ</label>
                                            <select class="form-select" name="vendor_entity_type">
                                                <option value="">กรุณาเลือก</option>
                                                <option value="1">นิติบุคคล</option>
                                                <option value="2">บุคคลธรรมดา</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">หนังสือรับรอง หรือสำเนาบัตรประชาชน</label>
                                            <input type="file" class="form-control" name="vendor_certificate_file">
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">ภพ.20</label>
                                            <input type="file" class="form-control" name="vendor_pp20_file">
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <div class="mb-3">
                                                <label for="vendor_business_name" class="form-label">
                                                    ชื่อธุรกิจ<span class="text text-danger"> *</span>
                                                </label>
                                                <input type="text" name="vendor_business_name" class="form-control"
                                                    placeholder="ชื่อธุรกิจ">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">ประเทศ </label>
                                            <span class="text text-danger"> *</span>
                                            <select class="form-select" name="vendor_country">
                                                <option value="">กรุณาเลือกประเทศ</option>
                                                <option value="173">[TH] Thailand ไทย</option>
                                                <option value="1">[AF] Afghanistan อัฟกานิสถาน</option>
                                                <option value="2">[AL] Albania แอลเบเนีย</option>
                                                <!-- เพิ่มตัวเลือกอื่นๆ ตามต้องการ -->
                                            </select>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">เครดิต (วัน) </label>
                                            <span class="text text-danger"> *</span>
                                            <select class="form-select" name="vendor_credit_days">
                                                <option value="">0 วัน</option>
                                                <option value="30">30 วัน</option>
                                                <option value="60">60 วัน</option>
                                                <option value="90">90 วัน</option>
                                                <option value="120">120 วัน</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">สำนักงาน/สาขา</label>
                                            <span class="text text-danger"> *</span>
                                            <div class="d-flex gap-4 mt-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="vendor_branch_status" id="vendor_branch_status1"
                                                        value="0">
                                                    <label class="form-check-label"
                                                        for="vendor_branch_status1">สำนักงานใหญ่</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="vendor_branch_status" id="vendor_branch_status2"
                                                        value="1">
                                                    <label class="form-check-label"
                                                        for="vendor_branch_status2">สาขา</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="vendor_en_status" id="vendor_en_status">
                                                    <label class="form-check-label" for="vendor_en_status">Add English
                                                        Information</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="vendor_branch_form col-md-5 mb-3 px-2" style="display:none;">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="vendor_branch_status_no"
                                                    name="vendor_branch_status_no" placeholder="รหัสสาขา">
                                                <input type="text" class="form-control"
                                                    id="vendor_branch_status_name" name="vendor_branch_status_name"
                                                    placeholder="ชื่อสาขา">
                                            </div>
                                        </div>

                                        <div id="vendor_english_section" class="row" style="display:none;">
                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="vendor_business_name_en" class="form-label">
                                                        Contact Name <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="vendor_business_name_en" class="form-control"
                                                        placeholder="Business Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="vendor_address1_en" class="form-label">
                                                        Address 1 <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="vendor_address1_en" class="form-control"
                                                        placeholder="Village No. Soi">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="vendor_address2_en" class="form-label">
                                                        Address 2 <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="vendor_address2_en" class="form-control"
                                                        placeholder="Subdistrict, District, Province, Postal Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buyer Section -->
                                    <div id="buyer_section" class="row" style="display:none;">
                                        <div class="col-lg-4 px-2 mb-3">
                                            <label class="form-label">รูปแบบ</label>
                                            <select class="form-select" name="buyer_entity_type">
                                                <option value="">กรุณาเลือก</option>
                                                <option value="1">นิติบุคคล</option>
                                                <option value="2">บุคคลธรรมดา</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">หนังสือรับรอง หรือสำเนาบัตรประชาชน</label>
                                            <input type="file" class="form-control" name="buyer_certificate_file">
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">ภพ.20</label>
                                            <input type="file" class="form-control" name="buyer_pp20_file">
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <div class="mb-3">
                                                <label for="buyer_business_name" class="form-label">
                                                    ชื่อธุรกิจ<span class="text text-danger"> *</span>
                                                </label>
                                                <input type="text" name="buyer_business_name" class="form-control"
                                                    placeholder="ชื่อธุรกิจ">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">ประเทศ </label>
                                            <span class="text text-danger"> *</span>
                                            <select class="form-select" name="buyer_country">
                                                <option value="">กรุณาเลือกประเทศ</option>
                                                <option value="173">[TH] Thailand ไทย</option>
                                                <option value="1">[AF] Afghanistan อัฟกานิสถาน</option>
                                                <option value="2">[AL] Albania แอลเบเนีย</option>
                                                <!-- เพิ่มตัวเลือกอื่นๆ ตามต้องการ -->
                                            </select>
                                        </div>

                                        <div class="col-lg-4 px-2">
                                            <label class="form-label">เครดิต (วัน) </label>
                                            <span class="text text-danger"> *</span>
                                            <select class="form-select" name="buyer_credit_days">
                                                <option value="">0 วัน</option>
                                                <option value="30">30 วัน</option>
                                                <option value="60">60 วัน</option>
                                                <option value="90">90 วัน</option>
                                                <option value="120">120 วัน</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">สำนักงาน/สาขา</label>
                                            <span class="text text-danger"> *</span>
                                            <div class="d-flex gap-4 mt-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="buyer_branch_status" id="buyer_branch_status1"
                                                        value="0">
                                                    <label class="form-check-label"
                                                        for="buyer_branch_status1">สำนักงานใหญ่</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="buyer_branch_status" id="buyer_branch_status2"
                                                        value="1">
                                                    <label class="form-check-label"
                                                        for="buyer_branch_status2">สาขา</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="buyer_en_status" id="buyer_en_status">
                                                    <label class="form-check-label" for="buyer_en_status">Add English
                                                        Information</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="buyer_branch_form col-md-5 mb-3 px-2" style="display:none;">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="buyer_branch_status_no"
                                                    name="buyer_branch_status_no" placeholder="รหัสสาขา">
                                                <input type="text" class="form-control"
                                                    id="buyer_branch_status_name" name="buyer_branch_status_name"
                                                    placeholder="ชื่อสาขา">
                                            </div>
                                        </div>

                                        <div id="buyer_english_section" class="row" style="display:none;">
                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="buyer_business_name_en" class="form-label">
                                                        Contact Name <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="buyer_business_name_en" class="form-control"
                                                        placeholder="Business Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="buyer_address1_en" class="form-label">
                                                        Address 1 <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="buyer_address1_en" class="form-control"
                                                        placeholder="Village No. Soi">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 px-2">
                                                <div class="mb-3">
                                                    <label for="buyer_address2_en" class="form-label">
                                                        Address 2 <span class="text text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="buyer_address2_en" class="form-control"
                                                        placeholder="Subdistrict, District, Province, Postal Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ข้อมูลส่วนบุคคลทั่วไป -->
                                    <div class="col-lg-2 px-2">
                                        <div class="mb-3">
                                            <label for="prefix" class="form-label">
                                                คำนำหน้าชื่อ<span class="text text-danger"> *</span>
                                            </label>
                                            <select name="prefix" id="prefix_select" class="form-select"
                                                style="cursor: pointer;">
                                                <option value="" disabled selected>เลือก</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                                <option value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 px-2" id="prefix_other_field" style="display:none;">
                                        <div class="mb-3">
                                            <label for="prefix_other" class="form-label">
                                                ระบุคำนำหน้า<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="prefix_other" id="prefix_other_input"
                                                class="form-control" placeholder="กรอกคำนำหน้า">
                                        </div>
                                    </div>

                                    <div class="col-lg-5 px-2">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">
                                                ชื่อจริง<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="กรอกชื่อจริง">
                                        </div>
                                    </div>

                                    <div class="col-lg-5 px-2">
                                        <div class="mb-3">
                                            <label for="surname" class="form-label">
                                                นามสกุล<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="surname" class="form-control"
                                                placeholder="กรอกนามสกุล">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="tax_no" class="form-label">
                                                เลขประจำตัวผู้เสียภาษี<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="tax_no" class="form-control"
                                                placeholder="เลขประจำตัวผู้เสียภาษี">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">วันเกิด</label>
                                            <input type="text" name="birthday" class="form-control"
                                                data-provider="flatpickr" id="birthday" placeholder="วว/ดด/ปปปป">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="tal_no" class="form-label">
                                                เบอร์โทรศัพท์<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="tal_no" class="form-control"
                                                placeholder="ป้อนหมายเลขโทรศัพท์">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">
                                                Email<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="address1" class="form-label">
                                                ที่อยู่ เลขที่<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="address1" class="form-control"
                                                placeholder="ที่อยู่ เลขที่">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="address2" class="form-label">
                                                ตำบล อำเภอ จังหวัด รหัสไปษณีย์<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="address2" class="form-control"
                                                placeholder="ตำบล อำเภอ จังหวัด รหัสไปษณีย์">
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 d-flex align-items-start gap-3">
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab">
                                        <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                        ถัดไป
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // เริ่มต้น Flatpickr
            flatpickr("#birthday", {
                dateFormat: "d/m/Y",
                locale: "th",
                allowInput: false,
                maxDate: "today"
            });

            // จัดการการแสดง/ซ่อนช่องคำนำหน้าอื่นๆ
            const prefixSelect = document.getElementById('prefix_select');
            const prefixOtherField = document.getElementById('prefix_other_field');
            const prefixOtherInput = document.getElementById('prefix_other_input');

            prefixSelect.addEventListener('change', function() {
                if (this.value === 'อื่นๆ') {
                    prefixOtherField.style.display = 'block';
                    prefixOtherInput.required = true;
                } else {
                    prefixOtherField.style.display = 'none';
                    prefixOtherInput.required = false;
                    prefixOtherInput.value = '';
                }
            });

            // จัดการการแสดง/ซ่อนส่วนของประเภทการลงทะเบียน
            const regTypeRadios = document.querySelectorAll('input[name="reg_type"]');
            const bankSection = document.getElementById('employee_bank_section');
            const vendorSection = document.getElementById('vendor_section');
            const buyerSection = document.getElementById('buyer_section');

            regTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // ซ่อนทุกส่วน
                    bankSection.style.display = 'none';
                    vendorSection.style.display = 'none';
                    buyerSection.style.display = 'none';

                    // แสดงส่วนที่เลือก
                    if (this.value === 'employee') {
                        bankSection.style.display = 'flex';
                    } else if (this.value === 'vendor') {
                        vendorSection.style.display = 'flex';
                    } else if (this.value === 'buyer') {
                        buyerSection.style.display = 'flex';
                    }
                });
            });

            // ฟังก์ชันสำหรับจัดการสาขาและ English Info
            function setupBranchAndEnglish(sectionId, branchRadioName, englishCheckboxId, branchFormClass, englishSectionId) {
                const section = document.getElementById(sectionId);
                if (!section) return;

                // จัดการสาขา
                const branchRadios = section.querySelectorAll(`input[name="${branchRadioName}"]`);
                const branchForm = section.querySelector(`.${branchFormClass}`);
                
                if (branchForm) {
                    branchForm.style.display = 'none';
                }

                branchRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === '1') { // สาขา
                            branchForm.style.display = 'block';
                            const inputs = branchForm.querySelectorAll('input');
                            inputs.forEach(input => input.required = true);
                        } else { // สำนักงานใหญ่
                            branchForm.style.display = 'none';
                            const inputs = branchForm.querySelectorAll('input');
                            inputs.forEach(input => {
                                input.required = false;
                                input.value = '';
                            });
                        }
                    });
                });

                // จัดการ English Information
                const englishCheckbox = section.querySelector(`#${englishCheckboxId}`);
                const englishSection = section.querySelector(`#${englishSectionId}`);

                if (englishCheckbox && englishSection) {
                    englishSection.style.display = 'none';
                    
                    englishCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            englishSection.style.display = 'flex';
                        } else {
                            englishSection.style.display = 'none';
                            const englishInputs = englishSection.querySelectorAll('input');
                            englishInputs.forEach(input => input.value = '');
                        }
                    });
                }
            }

            // Setup สำหรับ Vendor Section
            setupBranchAndEnglish(
                'vendor_section',
                'vendor_branch_status',
                'vendor_en_status',
                'vendor_branch_form',
                'vendor_english_section'
            );

            // Setup สำหรับ Buyer Section
            setupBranchAndEnglish(
                'buyer_section',
                'buyer_branch_status',
                'buyer_en_status',
                'buyer_branch_form',
                'buyer_english_section'
            );
        });
    </script>

    <style>
        /* ปรับแต่ง select dropdown ให้สวยงาม */
        .form-select {
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        .form-select option {
            padding: 8px 12px;
        }

        .form-select option:hover {
            background-color: #f8f9fa;
        }

        /* ซ่อน option แรกหลังจากเลือกแล้ว */
        .form-select:valid option[value=""] {
            display: none;
        }
    </style>
@endsection