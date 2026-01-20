@extends('layouts.app')

@section('title', 'เข้าสู่ระบบ')
@section('subtitle', 'ระบบบริหารจัดการ BlueClick')

@section('content')
<div class="auth-card card">
    <div class="card-body">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="example@blueclick.com"
                       required
                       autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="••••••••"
                       required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    จดจำการเข้าสู่ระบบ
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">
                เข้าสู่ระบบ
            </button>

            <div class="text-center">
                <a href="#" class="auth-link me-3">ลืมรหัสผ่าน?</a>
                <span class="text-muted">|</span>
                <a href="{{ route('register') }}" class="auth-link ms-3">สมัครใช้งาน</a>
            </div>

        </form>

    </div>
</div>
@endsection
