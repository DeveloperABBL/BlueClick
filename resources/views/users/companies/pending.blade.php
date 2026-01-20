@extends('layouts.office')

@section('title', 'รายการรออนุมัติบริษัท')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">รายการรออนุมัติบริษัท</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>วันที่สมัคร</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->phone ?? '-' }}</td>
                                    <td>{{ $company->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-warning">
                                            รออนุมัติ
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('companies.approve', $company->id) }}" method="POST"
                                            onsubmit="return confirm('ยืนยันการอนุมัติบริษัทนี้ ?')">
                                            @csrf
                                            <button class="btn btn-success btn-sm">
                                                อนุมัติ
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        ไม่มีรายการรออนุมัติ
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
