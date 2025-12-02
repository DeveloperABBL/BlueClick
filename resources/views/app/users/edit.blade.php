@extends('layouts.app')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">แก้ไขข้อมูล</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">รายชื่อผู้ใช้งานระบบ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.show') }}">นายสมชาย ใจดี</a></li>
                    <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        @include('app.users.partials.form')
    </div>
    <!--end col-->
</div>


@endsection