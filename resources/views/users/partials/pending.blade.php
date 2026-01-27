@extends('layouts.office')

@section('title', 'รายการรออนุมัติบริษัท')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">รายการรออนุมัติ</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-nowrap align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ชื่อผู้สมัคร</th>
                            <th>Email</th>
                            <th>เบอร์โทร</th>
                            <th>วันที่สมัคร</th>
                            <th width="160">การอนุมัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendings as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $user->prefix }}
                                    {{ $user->first_name }}
                                    {{ $user->last_name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_no }}</td>
                                <td>
                                    {{ $user->created_at?->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        อนุมัติ
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        ปฏิเสธ
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    ไม่มีรายการรออนุมัติ
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
