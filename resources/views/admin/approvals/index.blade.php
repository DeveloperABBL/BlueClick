@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">รอการอนุมัติ</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('empty') }}">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">รอการอนุมัติ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">รายการรอการอนุมัติ</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>วันที่สมัคร</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>อีเมล</th>
                                        <th>ประเภท</th>
                                        <th>เบอร์โทร</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($registrations as $reg)
                                        <tr>
                                            <td>{{ $reg->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ $reg->prefix }} {{ $reg->firstname }} {{ $reg->surname }}</td>
                                            <td>{{ $reg->email }}</td>
                                            <td>
                                                @if ($reg->reg_type == 'employee')
                                                    <span class="badge bg-info">พนักงาน</span>
                                                @elseif($reg->reg_type == 'vendor')
                                                    <span class="badge bg-warning">คู่ค้าผู้ขาย</span>
                                                @else
                                                    <span class="badge bg-success">คู่ค้าผู้ซื้อ</span>
                                                @endif
                                            </td>
                                            <td>{{ $reg->tal_no }}</td>
                                            <td>
                                                <a href="{{ route('admin.approvals.show', $reg->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ri-eye-line"></i> ดูรายละเอียด
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">ไม่มีรายการรอการอนุมัติ</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
