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
                        <select name="prefix" class="form-select @error('prefix') is-invalid @enderror" required>
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

                    {{-- other_prefix (ใช้เฉพาะกรณีเลือก "อื่นๆ") --}}
                    <div class="col-md-4">
                        <label class="form-label">คำนำหน้าอื่น</label>
                        <input type="text" name="other_prefix"
                            class="form-control @error('other_prefix') is-invalid @enderror"
                            value="{{ old('other_prefix') }}" placeholder="ระบุคำนำหน้า (ถ้ามี)">
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
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
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
