@extends('layouts.auth')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">ตั้งรหัสผ่านใหม่</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('password.set.submit') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3">
            <label class="form-label">รหัสผ่านใหม่</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button class="btn btn-primary w-100">ตั้งรหัสผ่าน</button>
    </form>

</div>
@endsection
