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
                                    <button class="btn btn-sm btn-success btn-approve" data-id="{{ $user->id }}">
                                        อนุมัติ
                                    </button>

                                    <button class="btn btn-sm btn-danger btn-reject" data-id="{{ $user->id }}">
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // ================== APPROVE ==================
            document.querySelectorAll('.btn-approve').forEach(btn => {
                btn.addEventListener('click', function() {

                    const userId = this.dataset.id;

                    Swal.fire({
                        title: 'ยืนยันการอนุมัติ',
                        text: 'ต้องการอนุมัติผู้ใช้งานรายนี้หรือไม่?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'อนุมัติ',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonColor: '#28a745',
                        reverseButtons: true
                    }).then(result => {
                        if (result.isConfirmed) {
                            sendAction(userId, 'approve');
                        }
                    });
                });
            });

            // ================== REJECT ==================
            document.querySelectorAll('.btn-reject').forEach(btn => {
                btn.addEventListener('click', function() {

                    const userId = this.dataset.id;

                    Swal.fire({
                        title: 'ปฏิเสธการสมัคร',
                        text: 'คุณแน่ใจหรือไม่ว่าต้องการปฏิเสธ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'ปฏิเสธ',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonColor: '#dc3545',
                        reverseButtons: true
                    }).then(result => {
                        if (result.isConfirmed) {
                            sendAction(userId, 'reject');
                        }
                    });
                });
            });

            // ================== AJAX FUNCTION ==================
            function sendAction(userId, action) {

                Swal.fire({
                    title: 'กำลังดำเนินการ',
                    text: 'กรุณารอสักครู่...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });

                fetch(`/users/${userId}/${action}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw res;
                        return res.json();
                    })
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: data.message ?? 'ดำเนินการเรียบร้อย',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            // ลบแถวออกจากตาราง
                            const btn = document.querySelector(`[data-id="${userId}"]`);
                            btn.closest('tr').remove();
                        });
                    })
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'ไม่สามารถดำเนินการได้'
                        });
                    });
            }

        });
    </script>
@endpush
