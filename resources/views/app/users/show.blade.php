@extends('layouts.app')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">นายสมชาย ใจดี</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">รายชื่อผู้ใช้งานระบบ</a></li>
                    <li class="breadcrumb-item active">นายสมชาย ใจดี</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@include('app.users.partials.profile')

@endsection
