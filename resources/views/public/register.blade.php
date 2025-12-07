@extends('layouts.auth')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-white">ลงทะเบียนผู้ใช้งานระบบ</h3>
        </div>
        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
            <div class="row g-0">
                <div class="p-lg-5 p-4">
                    <div>
                        <h5 class="text-primary">ข้อมูลผู้ติดต่อ</h5>
                        <p class="text-muted">กรุณากรอกข้อมูลให้ครบถ้วน</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="form_register" action="{{ route('signup') }}" method="POST">
                        @csrf
                        <!-- ประเภทการลงทะเบียน -->
                        <div class="mb-3">
                            <label class="form-label d-block">ประเภทการลงทะเบียน *</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="employee" value="พนักงาน">
                                <label class="form-check-label" for="employee">พนักงาน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="partner_seller" value="คู่ค้าผู้ขาย">
                                <label class="form-check-label" for="partner_seller">คู่ค้าผู้ขาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="partner_buyer" value="คู่ค้าผู้ซื้อ">
                                <label class="form-check-label" for="partner_buyer">คู่ค้าผู้ซื้อ</label>
                            </div>
                        </div>
                        <!-- ฟิลด์เฉพาะพนักงาน -->
                        <div id="employee-fields" style="display: none;">

                            <div class="row mt-3">

                                <div class="col-md-4 mb-3">
                                    <label for="bank" class="form-label">บัญชีธนาคาร (สำหรับรับเงินเดือน) *</label>
                                    <select class="form-control" id="bankSelect" name="bank">
                                        <option value="">เลือกธนาคาร</option>
                                        <option value="kbank">กสิกรไทย</option>
                                        <option value="scb">ไทยพาณิชย์</option>
                                        <option value="bbl">กรุงเทพ</option>
                                        <option value="ktb">กรุงไทย</option>
                                        <option value="tmb">ทหารไทยธนชาต</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="account_name" class="form-label">ชื่อบัญชี *</label>
                                    <input type="text" id="account_name" name="account_name" class="form-control"
                                        placeholder="กรอกชื่อบัญชี">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="account_number" class="form-label">เลขที่บัญชี *</label>
                                    <input type="text" id="account_number" name="account_number" class="form-control"
                                        placeholder="กรอกเลขที่บัญชี">
                                </div>

                            </div>

                        </div>
                        <!-- คำนำหน้าชื่อ -->
                        <div class="mb-3">
                            <label for="prefix" class="form-label">คำนำหน้าชื่อ *</label>
                            <div class="input-group">
                                <select class="form-select" id="prefix" name="prefix">
                                    <option selected disabled>เลือกคำนำหน้าชื่อ</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                                <input type="text" class="form-control w-75" id="other_prefix" name="other_prefix" style="display:none;" placeholder="กรุณาระบุคำนำหน้าชื่อ">
                            </div>
                        </div>

                        <!-- ชื่อจริง / นามสกุล -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="form-label">ชื่อจริง *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรอกชื่อจริง">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="form-label">นามสกุล *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรอกนามสกุล">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tax_id" class="form-label">เลขประจำตัวผู้เสียภาษี *</label>
                                <input type="text" class="form-control" id="tax_id" name="tax_id" placeholder="กรอกเลขประจำตัวผู้เสียภาษี">
                            </div>
                        </div>

                        <!-- วันเกิด / เบอร์โทรศัพท์ / Email -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="birthday" class="form-label">วันเกิด</label>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone" class="form-label">เบอร์โทรศัพท์ *</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="ป้อนหมายเลขโทรศัพท์">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>

                        <!-- ที่อยู่ -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">ที่อยู่ เลขที่ *</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่ เลขที่">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="district" class="form-label">ตำบล อำเภอ จังหวัด รหัสไปรษณีย์ *</label>
                                <input type="text" class="form-control" id="district" name="district" placeholder="ตำบล อำเภอ จังหวัด รหัสไปรษณีย์">
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button class="btn btn-success" type="submit">ถัดไป <i class="ri-arrow-right-line"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('prefix').addEventListener('change', function () {
        var otherPrefix = document.getElementById('other_prefix');
        otherPrefix.style.display = this.value === 'อื่นๆ' ? 'block' : 'none';
    });
    document.addEventListener("DOMContentLoaded", function () {

    const employeeRadio = document.getElementById('employee');
    const sellerRadio = document.getElementById('partner_seller');
    const buyerRadio = document.getElementById('partner_buyer');
    const employeeFields = document.getElementById('employee-fields');

    function toggleEmployeeFields() {
        if (employeeRadio.checked) {
            employeeFields.style.display = "block";
        } else {
            employeeFields.style.display = "none";
        }
    }

    employeeRadio.addEventListener('change', toggleEmployeeFields);
    sellerRadio.addEventListener('change', toggleEmployeeFields);
    buyerRadio.addEventListener('change', toggleEmployeeFields);

});
    $(document).ready(function() {
        $('#bankSelect').select2({
            placeholder: "เลือกธนาคาร",
            allowClear: true
        });
    });
</script>
@endpush
@endsection
