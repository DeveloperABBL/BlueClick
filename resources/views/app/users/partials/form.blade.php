<div class="card">
    <div class="card-body">

        <form id="form_register" action="#">

            <div class="text-center">
                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow image-profile" alt="user-profile-image">
                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">

                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                            </label>
                    </div>
                </div>
            </div>
            <input id="profile-img-file-input" name="image" type="file" class="profile-img-file-input d-none">

            <div class="mb-3">
                <label for="citizen_id" class="form-label">เลขประจำตัวประชาชน</label>
                <input type="text" class="form-control" id="citizen_id" name="citizen_id" placeholder="กรุณาระบุเลขประจำตัวประชาชน" value="1234567890123">
            </div>

            <div class="mb-3">
                <label for="prefix" class="form-label">คำนำหน้าชื่อ</label>
                <div class="input-group">
                    <select class="form-select" id="prefix" name="prefix" aria-label="Default select example">
                        <option value="1" selected>นาย</option>
                        <option value="2">นางสาว</option>
                        <option value="3">นาง</option>
                        <option value="0">อื่นๆ</option>
                    </select>
                    <input type="text" class="form-control w-75" id="other_prefix" name="other_prefix" style="display:none;" placeholder="กรุณาระบุคำนำหน้าชื่อ">
                </div>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">ชื่อจริง</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรุณาระบุชื่อจริง" value="สมชาย">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรุณาระบุนามสกุล" value="ใจดี">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">เบอร์โทรติดต่อ</label>
                <input type="text" class="form-control" id="phone" placeholder="กรุณาระบุเบอร์โทรติดต่อ" value="0812345678">
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="กรุณาระบุ Email" disabled value="example@msn.com">
            </div>

            <div class="mt-4">
                @if (Route::is('profile.*'))
                <div class="row">
                    <div class="col-6"><a href="{{ route('profile.index') }}" class="btn btn-warning">ย้อนกลับ</a></div>
                    <div class="col-6 text-end"><a href="{{ route('profile.index') }}" class="btn btn-success">บันทึกข้อมูล</a></div>
                </div>
                @else
                <div class="row">
                    <div class="col-6"><a href="{{ route('users.show') }}" class="btn btn-warning">ย้อนกลับ</a></div>
                    <div class="col-6 text-end"><a href="{{ route('users.show') }}" class="btn btn-success">บันทึกข้อมูล</a></div>
                </div>
                @endif


            </div>


        </form>


    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/pages/profile-setting.init.js') }}"></script>
<script>

    var prefix = document.getElementById('prefix');

    prefix.addEventListener('change', function () {
        var otherPrefix = document.getElementById('other_prefix');
        if (this.value === '0') {   // ถ้าเลือก "อื่นๆ"
            otherPrefix.style.display = 'block';
        } else {
            otherPrefix.style.display = 'none';
        }
    });

    // สั่งให้ trigger change ตอนโหลดหน้า
    prefix.dispatchEvent(new Event('change'));

</script>
@endpush