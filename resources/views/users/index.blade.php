@extends('layouts.office')

@section('title', 'ผู้ใช้งานระบบ')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">ผู้ใช้งานระบบ</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>Email</th>
                                <th>บริษัท</th>
                                <th class="text-center">สถานะบริษัท</th>
                                <th>วันที่สมัคร</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $user->prefix }}
                                        {{ $user->firstname }}
                                        {{ $user->lastname }}
                                    </td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        {{ $user->company->phone ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if ($user->company && $user->company->approved_at)
                                            <span class="badge bg-success">อนุมัติแล้ว</span>
                                        @else
                                            <span class="badge bg-warning">รออนุมัติ</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        ไม่มีข้อมูลผู้ใช้งาน
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
