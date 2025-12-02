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
                            <h5 class="text-primary">ตั้งค่ารหัสผ่านใหม่</h5>
                            <p class="text-muted">Laravel Tutorial
                            </p>
                        </div>

                        <div class="mt-4">
                            <form id="form_register" action="#">

                                <div class="mb-3">
                                    <label class="form-label" for="password">รหัสผ่านใหม่</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" placeholder="กรุณาระบุ password" id="password">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button">
                                            <i class="ri-eye-fill align-middle"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="confirm_password">ยืนยันรหัสผ่านใหม่</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" placeholder="กรุณาระบุ password" id="confirm_password">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button">
                                            <i class="ri-eye-fill align-middle"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="password-contain" class="p-3 bg-light mb-2 rounded" style="display: none;">
                                    <h5 class="fs-13">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="button" id="btn-set-password">ตั้งรหัสผ่านใหม่</button>
                                </div>

                            </form>

                            <div class="pt-4 pb-2 text-center" style="display: none;" id="register_success">
                                <div class="mb-4">
                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                </div>
                                <h5>ตั้งรหัสผ่านใหม่สำเร็จ !</h5>
                                <p class="mb-0">ไปหน้า <a href="{{ route('login') }}"class="fw-semibold text-primary text-decoration-underline">เข้าสู่ระบบ</a></p>
                            </div>

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

@push('scripts')
<script>

    document.getElementById('password').addEventListener('change', function () {
        var contain = document.getElementById('password-contain');
        contain.style.display = 'block'; // แสดงช่องกรอกเอง
    });

    Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(function (s) {
        Array.from(s.querySelectorAll(".password-addon")).forEach(function (t) {
            t.addEventListener("click", function (t) { var e = s.querySelector(".password"); "password" === e.type ? e.type = "text" : e.type = "password" })
        })
    });
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm-password");

    function validatePassword() {
        password.value != confirm_password.value ? confirm_password.setCustomValidity("Passwords Don't Match") : confirm_password.setCustomValidity("")
    }

    password.onchange = validatePassword;

    var myInput = document.getElementById("password"),
        letter = document.getElementById("pass-lower"),
        capital = document.getElementById("pass-upper"),
        number = document.getElementById("pass-number"),
        length = document.getElementById("pass-length");


    myInput.onkeyup = function () {
        myInput.value.match(/[a-z]/g) ? (letter.classList.remove("invalid"),
            letter.classList.add("valid")) : (letter.classList.remove("valid"),
                letter.classList.add("invalid")),
            myInput.value.match(/[A-Z]/g) ? (capital.classList.remove("invalid"),
                capital.classList.add("valid")) : (capital.classList.remove("valid"),
                    capital.classList.add("invalid"));
        myInput.value.match(/[0-9]/g) ? (number.classList.remove("invalid"),
            number.classList.add("valid")) : (number.classList.remove("valid"),
                number.classList.add("invalid")),
            8 <= myInput.value.length ? (length.classList.remove("invalid"),
                length.classList.add("valid")) : (length.classList.remove("valid"),
                    length.classList.add("invalid"))
    };

    document.getElementById('btn-set-password').addEventListener('click', function () {
        var form_register = document.getElementById('form_register');
        var register_success = document.getElementById('register_success');
        form_register.style.display = 'none'; // ซ่อนช่องกรอกเอง
        register_success.style.display = 'block'; // แสดงช่องกรอกเอง
    });

</script>
@endpush

@endsection
