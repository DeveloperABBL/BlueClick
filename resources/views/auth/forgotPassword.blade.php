@extends('layouts.auth')
@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
            <div class="row g-0">
                <div class="col-lg-6">
                    @include('layouts.partials.auth.slogan')
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="p-lg-5 p-4">
                        <div>
                            <h5 class="text-primary">ลืมรหัสผ่าน !</h5>
                            <p class="text-muted">Laravel Tutorial
                            </p>
                        </div>

                        <div class="mt-4">
                            <form action="#">

                                <div class="mb-3">
                                    <label for="email" class="form-label">กรอกอีเมลของคุณเพื่อรับลิงก์รีเซ็ตรหัสผ่าน</label>
                                    <input type="text" class="form-control" id="email" placeholder="กรุณากรอก Email">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">ยืนยันส่งลิงก์รีเซ็ตรหัสผ่าน</button>
                                </div>

                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p class="mb-0">กลับไปยังหน้า <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">เข้าสู่ระบบ</a></p>
                        </div>

                        <div class="mt-5 text-center">
                            <p class="mb-0"><a href="{{ route('setPassword') }}" class="fw-semibold text-primary text-decoration-underline">คลิ๊กเพื่อดูตัวอย่างหน้าตั้งค่ารหัสผ่าน</a></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>
@endsection
