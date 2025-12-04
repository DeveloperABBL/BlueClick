@extends('layouts.auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="ri-checkbox-circle-line display-1 text-success"></i>
                    </div>

                    <h2 class="text-success mb-3">ลงทะเบียนสำเร็จ!</h2>

                    <div class="alert alert-info" role="alert">
                        <h5 class="alert-heading">ขั้นตอนต่อไป</h5>
                        <hr>
                        <p class="mb-2">ข้อมูลการลงทะเบียนของคุณได้ถูกส่งไปยังผู้ดูแลระบบเรียบร้อยแล้ว</p>
                        <p class="mb-2">กรุณารอการอนุมัติจากผู้ดูแลระบบ</p>
                        <p class="mb-0">เมื่อได้รับการอนุมัติแล้ว ระบบจะส่งอีเมลพร้อมรหัสผ่านชั่วคราวไปให้คุณ</p>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <i class="ri-time-line display-6 text-primary"></i>
                                        <h5 class="mt-3">รอการอนุมัติ</h5>
                                        <p class="text-muted mb-0">ใช้เวลาประมาณ 1-3 วันทำการ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <i class="ri-mail-line display-6 text-primary"></i>
                                        <h5 class="mt-3">รับอีเมล</h5>
                                        <p class="text-muted mb-0">ตรวจสอบกล่องจดหมายของคุณ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            <i class="ri-arrow-left-line me-2"></i>กลับไปหน้าเข้าสู่ระบบ
                        </a>
                    </div>

                    <div class="mt-4 text-muted">
                        <p class="mb-0">หากมีคำถามหรือต้องการความช่วยเหลือ</p>
                        <p>กรุณาติดต่อ: <a href="mailto:support@example.com">support@example.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
