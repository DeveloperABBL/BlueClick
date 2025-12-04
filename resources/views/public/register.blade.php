@extends('layouts.auth')
@section('content')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- เพิ่มบรรทัดนี้ - ไฟล์ภาษาไทย -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <div class="mb-5 text-white-50 text-center">
        <h1 class="dislay-5 coming-soon-text">ลงทะเบียนผู้ใช้งานระบบ</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                <!-- แสดง Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="registerForm" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                    @csrf
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
                                                id="reg_type_employee" value="employee"
                                                {{ old('reg_type') == 'employee' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reg_type_employee">พนักงาน</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reg_type"
                                                id="reg_type_vendor" value="vendor"
                                                {{ old('reg_type') == 'vendor' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reg_type_vendor">คู่ค้าผู้ขาย</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reg_type"
                                                id="reg_type_buyer" value="buyer"
                                                {{ old('reg_type') == 'buyer' ? 'checked' : '' }}>
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
                                            <option value="กรุงเทพ" {{ old('bank_name') == 'กรุงเทพ' ? 'selected' : '' }}>
                                                กรุงเทพ จำกัด (มหาชน)</option>
                                            <option value="กสิกรไทย" {{ old('bank_name') == 'กสิกรไทย' ? 'selected' : '' }}>
                                                กสิกรไทย จำกัด (มหาชน)</option>
                                            <option value="กรุงไทย" {{ old('bank_name') == 'กรุงไทย' ? 'selected' : '' }}>
                                                กรุงไทย จำกัด (มหาชน)</option>
                                            <option value="กรุงศรีอยุธยา"
                                                {{ old('bank_name') == 'กรุงศรีอยุธยา' ? 'selected' : '' }}>กรุงศรีอยุธยา
                                                จำกัด (มหาชน)</option>
                                            <option value="ไทยพาณิชย์"
                                                {{ old('bank_name') == 'ไทยพาณิชย์' ? 'selected' : '' }}>ไทยพาณิชย์ จำกัด
                                                (มหาชน)</option>
                                            <option value="ทหารไทยธนชาต"
                                                {{ old('bank_name') == 'ทหารไทยธนชาต' ? 'selected' : '' }}>ทหารไทยธนชาต
                                                จำกัด (มหาชน)</option>
                                            <option value="ทิสโก้" {{ old('bank_name') == 'ทิสโก้' ? 'selected' : '' }}>
                                                ทิสโก้ จำกัด (มหาชน)</option>
                                            <option value="ซีไอเอ็มบีไทย"
                                                {{ old('bank_name') == 'ซีไอเอ็มบีไทย' ? 'selected' : '' }}>ซีไอเอ็มบีไทย
                                                จำกัด (มหาชน)</option>
                                            <option value="เกียรตินาคิน"
                                                {{ old('bank_name') == 'เกียรตินาคิน' ? 'selected' : '' }}>เกียรตินาคิน
                                                จำกัด (มหาชน)</option>
                                            <option value="ไทยเครดิตเพื่อรายย่อย"
                                                {{ old('bank_name') == 'ไทยเครดิตเพื่อรายย่อย' ? 'selected' : '' }}>
                                                ไทยเครดิตเพื่อรายย่อย จำกัด (มหาชน)</option>
                                            <option value="ยูโอบี" {{ old('bank_name') == 'ยูโอบี' ? 'selected' : '' }}>
                                                ยูโอบี จำกัด (มหาชน)</option>
                                            <option value="แลนด์ แอนด์ เฮ้าส์"
                                                {{ old('bank_name') == 'แลนด์ แอนด์ เฮ้าส์' ? 'selected' : '' }}>แลนด์
                                                แอนด์ เฮ้าส์ จำกัด (มหาชน)</option>
                                            <option value="ไอซีบีซี (ไทย)"
                                                {{ old('bank_name') == 'ไอซีบีซี (ไทย)' ? 'selected' : '' }}>ไอซีบีซี (ไทย)
                                                จำกัด (มหาชน)</option>
                                            <option value="ธ.ก.ส." {{ old('bank_name') == 'ธ.ก.ส.' ? 'selected' : '' }}>
                                                ธ.ก.ส.</option>
                                            <option value="ธนาคารออมสิน"
                                                {{ old('bank_name') == 'ธนาคารออมสิน' ? 'selected' : '' }}>ธนาคารออมสิน
                                            </option>
                                            <option value="ธอส." {{ old('bank_name') == 'ธอส.' ? 'selected' : '' }}>ธอส.
                                            </option>
                                            <option value="ธนาคารอิสลามแห่งประเทศไทย"
                                                {{ old('bank_name') == 'ธนาคารอิสลามแห่งประเทศไทย' ? 'selected' : '' }}>
                                                ธนาคารอิสลามแห่งประเทศไทย</option>
                                            <option value="ธนาคารแห่งประเทศไทย"
                                                {{ old('bank_name') == 'ธนาคารแห่งประเทศไทย' ? 'selected' : '' }}>
                                                ธนาคารแห่งประเทศไทย</option>
                                            <option value="เดอะรอยัลแบงก์อ๊อฟสกอตแลนด์"
                                                {{ old('bank_name') == 'เดอะรอยัลแบงก์อ๊อฟสกอตแลนด์' ? 'selected' : '' }}>
                                                เดอะรอยัลแบงก์อ๊อฟสกอตแลนด์</option>
                                            <option value="ธนาคารเจพี มอร์แกน เชส"
                                                {{ old('bank_name') == 'ธนาคารเจพี มอร์แกน เชส' ? 'selected' : '' }}>
                                                ธนาคารเจพี มอร์แกน เชส</option>
                                            <option value="ธนาคารซิตี้แบงค์"
                                                {{ old('bank_name') == 'ธนาคารซิตี้แบงค์' ? 'selected' : '' }}>
                                                ธนาคารซิตี้แบงค์</option>
                                            <option value="ชูมิโตโม มิตซุย แบงกิ้ง คอร์ปอเรชั่น"
                                                {{ old('bank_name') == 'ชูมิโตโม มิตซุย แบงกิ้ง คอร์ปอเรชั่น' ? 'selected' : '' }}>
                                                ชูมิโตโม มิตซุย แบงกิ้ง คอร์ปอเรชั่น</option>
                                            <option value="สแตนดาร์ดชาร์เตอร์ด (ไทย)"
                                                {{ old('bank_name') == 'สแตนดาร์ดชาร์เตอร์ด (ไทย)' ? 'selected' : '' }}>
                                                สแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                                            <option value="เมกะ สากลพาณิชย์"
                                                {{ old('bank_name') == 'เมกะ สากลพาณิชย์' ? 'selected' : '' }}>เมกะ
                                                สากลพาณิชย์</option>
                                            <option value="แบงก์ออฟอเมริกา"
                                                {{ old('bank_name') == 'แบงก์ออฟอเมริกา' ? 'selected' : '' }}>
                                                แบงก์ออฟอเมริกา</option>
                                            <option value="HSBC" {{ old('bank_name') == 'HSBC' ? 'selected' : '' }}>HSBC
                                            </option>
                                            <option value="ดอยซ์แบงก์"
                                                {{ old('bank_name') == 'ดอยซ์แบงก์' ? 'selected' : '' }}>ดอยซ์แบงก์
                                            </option>
                                            <option value="มิซูโฮ" {{ old('bank_name') == 'มิซูโฮ' ? 'selected' : '' }}>
                                                มิซูโฮ</option>
                                            <option value="บีเอ็นพี พารีบาส์"
                                                {{ old('bank_name') == 'บีเอ็นพี พารีบาส์' ? 'selected' : '' }}>บีเอ็นพี
                                                พารีบาส์</option>
                                            <option value="ธนาคารแห่งประเทศจีน (ไทย)"
                                                {{ old('bank_name') == 'ธนาคารแห่งประเทศจีน (ไทย)' ? 'selected' : '' }}>
                                                ธนาคารแห่งประเทศจีน (ไทย)</option>
                                            <option value="ANZ (ไทย)"
                                                {{ old('bank_name') == 'ANZ (ไทย)' ? 'selected' : '' }}>ANZ (ไทย)</option>
                                            <option value="China Construction Bank"
                                                {{ old('bank_name') == 'China Construction Bank' ? 'selected' : '' }}>China
                                                Construction Bank</option>
                                            <option value="PromptPay"
                                                {{ old('bank_name') == 'PromptPay' ? 'selected' : '' }}>PromptPay</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">ชื่อบัญชี</label>
                                        <span class="text text-danger"> *</span>
                                        <input type="text" class="form-control" name="bank_account_name"
                                            value="{{ old('bank_account_name') }}" placeholder="ชื่อบัญชี">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">เลขที่บัญชี</label>
                                        <span class="text text-danger"> *</span>
                                        <input type="text" class="form-control" name="bank_account_number"
                                            value="{{ old('bank_account_number') }}" placeholder="เลขที่บัญชี">
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
                                                <label class="form-check-label" for="vendor_branch_status2">สาขา</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="vendor_en_status"
                                                    id="vendor_en_status">
                                                <label class="form-check-label" for="vendor_en_status">Add English
                                                    Information</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="vendor_branch_form col-md-5 mb-3 px-2" style="display:none;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="vendor_branch_status_no"
                                                name="vendor_branch_status_no" placeholder="รหัสสาขา">
                                            <input type="text" class="form-control" id="vendor_branch_status_name"
                                                name="vendor_branch_status_name" placeholder="ชื่อสาขา">
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
                                                <input class="form-check-input" type="radio" name="buyer_branch_status"
                                                    id="buyer_branch_status1" value="0">
                                                <label class="form-check-label"
                                                    for="buyer_branch_status1">สำนักงานใหญ่</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="buyer_branch_status"
                                                    id="buyer_branch_status2" value="1">
                                                <label class="form-check-label" for="buyer_branch_status2">สาขา</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="buyer_en_status"
                                                    id="buyer_en_status">
                                                <label class="form-check-label" for="buyer_en_status">Add English
                                                    Information</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="buyer_branch_form col-md-5 mb-3 px-2" style="display:none;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="buyer_branch_status_no"
                                                name="buyer_branch_status_no" placeholder="รหัสสาขา">
                                            <input type="text" class="form-control" id="buyer_branch_status_name"
                                                name="buyer_branch_status_name" placeholder="ชื่อสาขา">
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
                                        <select name="prefix" id="prefix_select" class="form-select">
                                            <option value="" disabled selected>เลือก</option>
                                            <option value="นาย" {{ old('prefix') == 'นาย' ? 'selected' : '' }}>นาย
                                            </option>
                                            <option value="นาง" {{ old('prefix') == 'นาง' ? 'selected' : '' }}>นาง
                                            </option>
                                            <option value="นางสาว" {{ old('prefix') == 'นางสาว' ? 'selected' : '' }}>
                                                นางสาว</option>
                                            <option value="อื่นๆ" {{ old('prefix') == 'อื่นๆ' ? 'selected' : '' }}>อื่นๆ
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 px-2" id="prefix_other_field" style="display:none;">
                                    <div class="mb-3">
                                        <label for="prefix_other" class="form-label">
                                            ระบุคำนำหน้า<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="prefix_other" id="prefix_other_input"
                                            class="form-control" value="{{ old('prefix_other') }}"
                                            placeholder="กรอกคำนำหน้า">
                                    </div>
                                </div>

                                <div class="col-lg-5 px-2">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">
                                            ชื่อจริง<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="firstname" class="form-control"
                                            value="{{ old('firstname') }}" placeholder="กรอกชื่อจริง">
                                    </div>
                                </div>

                                <div class="col-lg-5 px-2">
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">
                                            นามสกุล<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="surname" class="form-control"
                                            value="{{ old('surname') }}" placeholder="กรอกนามสกุล">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="tax_no" class="form-label">
                                            เลขประจำตัวผู้เสียภาษี<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="tax_no" class="form-control"
                                            value="{{ old('tax_no') }}" placeholder="เลขประจำตัวผู้เสียภาษี">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">วันเกิด</label>
                                        <input type="text" name="birthday" class="form-control"
                                            data-provider="flatpickr" id="birthday" value="{{ old('birthday') }}"
                                            placeholder="วว/ดด/ปปปป">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="tal_no" class="form-label">
                                            เบอร์โทรศัพท์<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="tal_no" class="form-control"
                                            value="{{ old('tal_no') }}" placeholder="ป้อนหมายเลขโทรศัพท์">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="address1" class="form-label">
                                            ที่อยู่ เลขที่<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="address1" class="form-control"
                                            value="{{ old('address1') }}" placeholder="ที่อยู่ เลขที่">
                                    </div>
                                </div>

                                <div class="col-lg-6 px-2">
                                    <div class="mb-3">
                                        <label for="address2" class="form-label">
                                            ตำบล อำเภอ จังหวัด รหัสไปษณีย์<span class="text text-danger"> *</span>
                                        </label>
                                        <input type="text" name="address2" class="form-control"
                                            value="{{ old('address2') }}" placeholder="ตำบล อำเภอ จังหวัด รหัสไปษณีย์">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3 d-flex align-items-start gap-3">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">
                                    <i class="ri-check-line label-icon align-middle fs-16 ms-2"></i>
                                    ลงทะเบียน
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
                dateFormat: "Y-m-d", // เปลี่ยนเป็นรูปแบบ YYYY-MM-DD
                altInput: true, // เพิ่มบรรทัดนี้
                altFormat: "d/m/Y", // แสดงผลเป็น DD/MM/YYYY
                allowInput: true,
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
            function setupBranchAndEnglish(sectionId, branchRadioName, englishCheckboxId, branchFormClass,
                englishSectionId) {
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
