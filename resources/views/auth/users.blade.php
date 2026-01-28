@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                <h4 class="mb-sm-0">ข้อมูลบัญชีผู้สมัคร</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">ข้อมูลบัญชีผู้สมัคร</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <h4 class="fs-16 mb-1">ยินดีต้อนรับ</h4>
    <p class="text-muted">รายการข้อมูลบัญชีผู้สมัครทั้งหมด</p>

    <div class="row">
        <div class="col-12">
            @if($users->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เลขประจำตัว</th>
                            <th>วันเกิด</th>
                            <th>เบอร์โทร</th>
                            <th>อีเมล</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->prefix }} {{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->tax_id }}</td>
                                <td>{{ $user->birthday->format('d/m/Y') }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('user_register.show', $user->id) }}"
                                       class="btn btn-sm btn-primary">
                                       <i class="mdi mdi-eye me-1"></i> ดูข้อมูล
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }} <!-- pagination -->
            @else
                <p class="text-muted">ยังไม่มีข้อมูลผู้สมัคร</p>
            @endif
        </div>
    </div>
@endsection
