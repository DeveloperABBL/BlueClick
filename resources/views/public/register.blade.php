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
                                    <div class="col-lg-2 px-2">
                                        <div class="mb-3">
                                            <label for="prefix" class="form-label">
                                                คำนำหน้าชื่อ<span class="text text-danger"> *
                                                </span>
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
                                    <div class="col-lg-4 px-2">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">
                                                ชื่อจริง<span class="text text-danger"> *</span>
                                            </label>
                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="กรอกชื่อจริง">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 px-2">
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
                                                placeholder="ป้อนหมายเลขโทรศัพท์">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 px-2">
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">
                                                วันเกิด
                                            </label>
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
                                            <input type="text" name="email" class="form-control" placeholder="Email">
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
                                    <div class="col-md-12 mb-3">
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
                                    <!-- ฟิลด์บัญชีธนาคาร (เฉพาะพนักงาน) -->
                                    <div id="employee_bank_section" class="row" style="display:none;">
                                        <div class="col-md-4 mb-3">
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
                                </div>
                                <div class="mb-3 d-flex align-items-start gap-3">
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab">
                                        <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                        ถัดไป</button>

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

            // จัดการการแสดง/ซ่อนส่วนของบัญชีธนาคาร
            const regTypeRadios = document.querySelectorAll('input[name="reg_type"]');
            const bankSection = document.getElementById('employee_bank_section');

            regTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'employee') {
                        bankSection.style.display = 'flex';
                    } else {
                        bankSection.style.display = 'none';
                    }
                });
            });
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
