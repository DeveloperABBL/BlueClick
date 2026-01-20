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
                    <select name="prefix"
                            class="form-select @error('prefix') is-invalid @enderror"
                            required>
                        <option value="">เลือก</option>
                        <option value="นาย" {{ old('prefix') == 'นาย' ? 'selected' : '' }}>นาย</option>
                        <option value="นาง" {{ old('prefix') == 'นาง' ? 'selected' : '' }}>นาง</option>
                        <option value="นางสาว" {{ old('prefix') == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                    </select>
                    @error('prefix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">ชื่อจริง <span class="text-danger">*</span></label>
                    <input type="text"
                           name="firstname"
                           class="form-control @error('firstname') is-invalid @enderror"
                           value="{{ old('firstname') }}"
                           placeholder="ชื่อ"
                           required>
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">นามสกุล <span class="text-danger">*</span></label>
                    <input type="text"
                           name="lastname"
                           class="form-control @error('lastname') is-invalid @enderror"
                           value="{{ old('lastname') }}"
                           placeholder="นามสกุล"
                           required>
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">E-mail <span class="text-danger">*</span></label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="example@company.com"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">วันเกิด <span class="text-danger">*</span></label>
                    <input type="date"
                           name="birth_date"
                           class="form-control @error('birth_date') is-invalid @enderror"
                           value="{{ old('birth_date') }}"
                           required>
                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                    <input type="text"
                           name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}"
                           placeholder="0812345678"
                           required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="divider"></div>

            {{-- ข้อมูลบริษัท --}}
            <h6 class="section-title">ข้อมูลบริษัท</h6>

            <div class="mb-3">
                <label class="form-label">ชื่อบริษัท <span class="text-danger">*</span></label>
                <input type="text"
                       name="company_name"
                       class="form-control @error('company_name') is-invalid @enderror"
                       value="{{ old('company_name') }}"
                       placeholder="ชื่อบริษัท"
                       required>
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">เบอร์โทรศัพท์บริษัท <span class="text-danger">*</span></label>
                <input type="text"
                       name="company_phone"
                       class="form-control @error('company_phone') is-invalid @enderror"
                       value="{{ old('company_phone') }}"
                       placeholder="021234567"
                       required>
                @error('company_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="divider"></div>

            {{-- รหัสผ่าน --}}
            <h6 class="section-title">ตั้งรหัสผ่าน</h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="อย่างน้อย 8 ตัวอักษร"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="กรอกรหัสผ่านอีกครั้ง"
                           required>
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
