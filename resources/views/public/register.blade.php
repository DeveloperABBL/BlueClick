@extends('layouts.auth')
@section('content')
<h1 class="text text-center py-2">ลงทะเบียนผู้ใช้งานระบบ</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                <form id="mangaForm" method="POST" action="/author/insert">
                    @csrf
                    <div id="formUser">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title mb-0 mt-2">
                                    ข้อมูลผู้ติดต่อ
                                </h4>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2 px-2">
                                            <div class="mb-3">
                                                <label for="prefix" class="form-label">
                                                    คำนำหน้าชื่อ<span class="text text-danger">*
                                                    </span>
                                                </label>
                                                <input type="text" name="prefix" class="form-control"
                                                    placeholder="กรอกคำนำหน้า">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 px-2">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">
                                                    ชื่อจริง<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="firstname" class="form-control"
                                                    placeholder="กรอกชื่อจริง">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 px-2">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label">
                                                    นามสกุล<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="surname" class="form-control"
                                                    placeholder="กรอกนามสกุล">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="tax_no" class="form-label">
                                                    เลขประจำตัวผู้เสียภาษี<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="tax_no" class="form-control"
                                                    placeholder="ป้อนหมายเลขโทรศัพท์">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="surname" class="form-label">
                                                    วันเกิด
                                                </label>
                                                <input type="text" name="surname" class="form-control flatpickr-input"
                                                    data-provider="flatpickr" id="birthday" name="birthday"
                                                    data-data-format="d/m/y" placeholder="Select date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="tal_no" class="form-label">
                                                    เบอร์โทรศัพท์<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="tal_no" class="form-control"
                                                    placeholder="ป้อนหมายเลขโทรศัพท์">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">
                                                    Email<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="address1" class="form-label">
                                                    ที่อยู่ เลขที่<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="address1" class="form-control"
                                                    placeholder="ที่อยู่ เลขที่">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="mb-3">
                                                <label for="address2" class="form-label">
                                                    ตำบล อำเภอ จังหวัด รหัสไปษณีย์<span class="text text-danger">*</span>
                                                </label>
                                                <input type="text" name="address2" class="form-control"
                                                    placeholder="ตำบล อำเภอ จังหวัด รหัสไปษณีย์">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 px-2">
                                            <div class="mb-3">
                                                <label for="address2" class="form-label">
                                                    ประเภทการลงทะเบียน<span class="text text-danger">*</span>
                                                </label>
                                                <div class="mb-3 d-flex align-items-center gap-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_group"
                                                            id="user_group_employee" value="employee">
                                                        <label class="form-check-label"
                                                            for="user_group_employee">พนักงาน</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_group"
                                                            id="user_group_vender" value="vender">
                                                        <label class="form-check-label"
                                                            for="user_group_vender">คู่ค้าผู้ขาย</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_group"
                                                            id="user_group_buyer" value="buyer">
                                                        <label class="form-check-label"
                                                            for="user_group_buyer">คู่ค้าผู้ซื้อ</label>
                                                    </div>
                                                </div>
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
@endsection
