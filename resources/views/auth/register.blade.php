@extends('layouts.app')

@section('title', 'สมัครเข้าใช้งานระบบ')
@section('subtitle', 'ลงทะเบียนผู้ใช้งานระบบ')
@section('content')
    <div class="auth-card card">
        <div class="card-body">

            <form method="POST" action="{{ route('registerUser') }}">
                @csrf

                {{-- ข้อมูลผู้ติดต่อ --}}
                <h6 class="section-title">ข้อมูลผู้ติดต่อ</h6>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">คำนำหน้า <span class="text-danger">*</span></label>
                        <select name="prefix" id="prefixSelect" class="form-select @error('prefix') is-invalid @enderror"
                            required>
                            <option value="">เลือก</option>
                            <option value="นาย" {{ old('prefix') == 'นาย' ? 'selected' : '' }}>นาย</option>
                            <option value="นาง" {{ old('prefix') == 'นาง' ? 'selected' : '' }}>นาง</option>
                            <option value="นางสาว" {{ old('prefix') == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                            <option value="อื่นๆ" {{ old('prefix') == 'อื่นๆ' ? 'selected' : '' }}>อื่น ๆ</option>
                        </select>
                        @error('prefix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- other_prefix --}}
                    <div class="col-md-4 d-none" id="otherPrefixWrapper">
                        <label class="form-label">คำนำหน้าอื่น <span class="text-danger">*</span></label>
                        <input type="text" name="other_prefix" id="otherPrefixInput"
                            class="form-control @error('other_prefix') is-invalid @enderror"
                            value="{{ old('other_prefix') }}" placeholder="ระบุคำนำหน้า">
                        @error('other_prefix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                        <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror"
                            value="{{ old('phone_no') }}" placeholder="0812345678" required>
                        @error('phone_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">ชื่อจริง <span class="text-danger">*</span></label>
                        <input type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                            required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">นามสกุล <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control w-50 @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="example@email.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="divider"></div>

                {{-- รหัสผ่าน --}}
                <h6 class="section-title">ตั้งรหัสผ่าน</h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="mdi mdi-arrow-left"></i> กลับหน้า Login
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        ลงทะเบียน <i class="mdi mdi-check"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const prefixSelect = document.getElementById('prefixSelect');
            const otherWrapper = document.getElementById('otherPrefixWrapper');
            const otherInput = document.getElementById('otherPrefixInput');
            const form = document.querySelector('form');

            // ===== แสดง / ซ่อน คำนำหน้าอื่น =====
            function toggleOtherPrefix() {
                if (prefixSelect.value === 'อื่นๆ') {
                    otherWrapper.classList.remove('d-none');
                    otherInput.required = true;
                } else {
                    otherWrapper.classList.add('d-none');
                    otherInput.required = false;
                    otherInput.value = '';
                }
            }

            toggleOtherPrefix();
            prefixSelect.addEventListener('change', toggleOtherPrefix);

            // ===== submit =====
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // 1️⃣ เช็คฟอร์มก่อน
                if (!form.checkValidity()) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'กรอกข้อมูลไม่ครบ',
                        text: 'กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน',
                        confirmButtonText: 'ตกลง'
                    });
                    return;
                }

                // 2️⃣ ยืนยันการลงทะเบียน
                Swal.fire({
                    title: 'ยืนยันการลงทะเบียน',
                    text: 'ตรวจสอบข้อมูลเรียบร้อยแล้วใช่หรือไม่?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: true,
                    confirmButtonColor: '#2ecc71',
                    cancelButtonColor: '#95a5a6'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // submit ฟอร์มจริง
                        form.submit();

                        // 3️⃣ สำเร็จ + โหลด 3 วิ
                        Swal.fire({
                            icon: 'success',
                            title: 'ลงทะเบียนสำเร็จ',
                            text: 'ระบบกำลังพากลับหน้าเข้าสู่ระบบ',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = "{{ route('login') }}";
                        });
                    }
                });
            });

        });
    </script>
@endpush
