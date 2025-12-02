<div class="profile-foreground position-relative mx-n4 ">
    <div class="profile-wid-bg opacity-75">
        <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-img" class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">นายสมชาย ใจดี</h3>
                <p class="text-white text-opacity-75">Admin</p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i> ปทุมธานี</div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="d-flex profile-wrapper">
                <!-- Nav tabs -->
                <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#profile" role="tab">
                            <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">ข้อมูลส่วนตัว</span>
                        </a>
                    </li>
                    @if (Route::is('profile.*'))
                    <li class="nav-item">
                        <a class="nav-link fs-14" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">เปลี่ยนรหัสผ่าน</span>
                        </a>
                    </li>
                    @endif
                </ul>

                @if (Route::is('profile.*'))
                <div class="flex-shrink-0">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning"><i class="ri-edit-box-line align-bottom"></i> แก้ไขข้อมูลส่วนตัว</a>
                </div>
                @else
                <div class="flex-shrink-0">
                    <a href="{{ route('users.edit') }}" class="btn btn-warning"><i class="ri-edit-box-line align-bottom"></i> แก้ไขข้อมูลส่วนตัว</a>
                </div>
                @endif
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="ps-0 w-25" scope="row">ชื่อ-นามสกุล :</th>
                                            <td class="text-muted">นายสมชาย ใจดี</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">เลขประจำตัวประชาชน :</th>
                                            <td class="text-muted">1234567890123</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">เบอร์โทร :</th>
                                            <td class="text-muted">0812345678</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">E-mail :</th>
                                            <td class="text-muted">example@msn.com</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-0" scope="row">จังหวัดที่สมัคร :</th>
                                            <td class="text-muted">ปทุมธานี</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end tab-pane-->
                <div class="tab-pane fade" id="changePassword" role="tabpanel">
                    <div class="card">
                        <div class="card-body pt-4">
                            <div class="row g-2 justify-content-center">
                                <div class="col-lg-4 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">รหัสผ่านเก่า</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input" placeholder="กรุณาระบุ password เก่า" id="old-password">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button">
                                                <i class="ri-eye-fill align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
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
                                            <input type="password" class="form-control pe-5 password-input" placeholder="กรุณาระบุ password" id="confirm-password">
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

                                    <div class="text-center">
                                        <button type="button" class="btn btn-success">เปลี่ยนรหัสผ่าน</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--end tab-pane-->
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
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


    Array.from(document.querySelectorAll(".auth-pass-inputgroup")).forEach(function (e) {
        Array.from(e.querySelectorAll(".password-addon")).forEach(function (r) {
            r.addEventListener("click", function (r) {
                var o = e.querySelector(".password-input");
                if (o.type === "password") {
                    o.type = "text";
                } else {
                    o.type = "password";
                }
            });
        });
    });

    $('.btn-delete').on('click', function () {
        console.log('delete');

        Swal.fire({
            title: "",
            text: "กรุณายืนยันการทำรายการ",
            icon: "warning",
            showCancelButton: 1,
            customClass: {
                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                cancelButton: "btn btn-danger w-xs mt-2"
            },
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            buttonsStyling: !1,
        }).then(function (t) {
            if (t.value) {
                Swal.fire({
                    title: "สำเร็จ!",
                    text: "ลบข้อมูลผู้ใช้งานเรียบร้อยแล้ว",
                    icon: "success",
                });
            }
        });
    });


</script>


@endpush