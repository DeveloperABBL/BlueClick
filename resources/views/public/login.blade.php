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
                                <p class="text-muted">Laravel Tutorial</p>
                            </div>

                            <div class="mt-4">
                                <!-- แสดง Error Messages -->
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- แสดง Success Messages -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- เปลี่ยนเป็น POST และใช้ route login -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="Enter email"
                                               required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="{{ route('forgotPassword') }}" class="text-muted">ลืมรหัสผ่าน ?</a>
                                        </div>
                                        <label class="form-label" for="password">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" 
                                                   class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                   placeholder="Enter password" 
                                                   id="password"
                                                   name="password"
                                                   required>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                type="button" id="password-addon">
                                                <i class="ri-eye-fill align-middle"></i>
                                            </button>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            จดจำฉันไว้
                                        </label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">เข้าสู่ระบบ</button>
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

    <!-- Script สำหรับแสดง/ซ่อน Password -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordAddon = document.getElementById('password-addon');
            const passwordInput = document.querySelector('.password-input');
            
            if (passwordAddon && passwordInput) {
                passwordAddon.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('ri-eye-fill');
                        icon.classList.add('ri-eye-off-fill');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('ri-eye-off-fill');
                        icon.classList.add('ri-eye-fill');
                    }
                });
            }
        });
    </script>
@endsection