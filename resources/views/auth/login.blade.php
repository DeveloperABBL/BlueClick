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
                                <h5 class="text-primary">ยินดีต้อนรับสู่ !</h5>
                                <p class="text-muted">Laravel Tutorial
                                </p>
                            </div>

                            <div class="mt-4">
                                <form action="index.html">

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="{{ route('forgotPassword') }}" class="text-muted">ลืมรหัสผ่าน ?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input"
                                                placeholder="Enter password" id="password-input">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{ route('empty') }}" class="btn btn-success w-100">เข้าสู่ระบบ</a>
                                        <!-- <button class="btn btn-success w-100" type="submit">เข้าสู่ระบบ</button> -->
                                    </div>

                                </form>
                            </div>

                            <div class="mt-5 text-center">
                                <p class="mb-0"><a href="{{ route('register') }}"
                                        class="fw-semibold text-primary text-decoration-underline">สมัครสมาชิก</a>
                                    เพื่อใช้งานระบบ</p>
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
