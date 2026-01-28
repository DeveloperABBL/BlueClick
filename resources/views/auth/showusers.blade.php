@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h4>ข้อมูลผู้สมัคร</h4>

        <p><strong>คำนำหน้าชื่อ:</strong> {{ $user->prefix }}</p>
        @if($user->other_prefix)
            <p><strong>คำนำหน้าชื่ออื่น ๆ:</strong> {{ $user->other_prefix }}</p>
        @endif
        <p><strong>ชื่อจริง:</strong> {{ $user->first_name }}</p>
        <p><strong>นามสกุล:</strong> {{ $user->last_name }}</p>
        <p><strong>เลขประจำตัวผู้เสียภาษี:</strong> {{ $user->tax_id }}</p>
        <p><strong>วันเกิด:</strong> {{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</p>
        <p><strong>เบอร์โทรศัพท์:</strong> {{ $user->phone }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>ที่อยู่:</strong> {{ $user->address }} {{ $user->district }}</p>
        <p><strong>ประเภทผู้สมัคร:</strong> {{ $user->type }}</p>
        <p><strong>บัญชีธนาคาร:</strong> {{ $user->bank }}</p>
        <p><strong>ชื่อบัญชี:</strong> {{ $user->account_name }}</p>
        <p><strong>เลขที่บัญชี:</strong> {{ $user->account_number }}</p>
        <a href="{{ route('user_register.index') }}" class="btn btn-primary mt-3">ย้อนกลับ</a>
    </div>
</div>
@endsection
