@extends('layouts.app')

@section('title', 'เข้าสู่ระบบ')
@section('subtitle', 'BlueClick')
@include('import.script')
@section('content')
<div class="auth-card card shadow-sm">
    <div class="card-body">

        <form id="loginForm">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control">
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

@push('scripts')
<script>
document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    Swal.fire({
        title: 'กำลังเข้าสู่ระบบ',
        text: 'กรุณารอสักครู่...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const response = await fetch("{{ route('login') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();

        if (!response.ok) {
            throw data;
        }

        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: 'เข้าสู่ระบบเรียบร้อย',
            timer: 1500,
            showConfirmButton: false
        }).then(() => {
            window.location.href = data.redirect ?? "{{ route('select.company') }}";
        });

    } catch (error) {
        let message = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';

        if (error?.errors) {
            message = Object.values(error.errors)[0][0];
        }

        Swal.fire({
            icon: 'error',
            title: 'เข้าสู่ระบบไม่สำเร็จ',
            text: message
        });
    }
});
</script>
@endpush
