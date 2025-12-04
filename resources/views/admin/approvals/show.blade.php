@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">รายละเอียดการสมัครสมาชิก</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title text-white mb-0">ข้อมูลผู้สมัคร</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-3 text-primary">ข้อมูลส่วนตัว</h6>
                                <table class="table table-sm">
                                    <tr>
                                        <th width="40%">ชื่อ-นามสกุล:</th>
                                        <td>{{ $registration->prefix }} {{ $registration->firstname }}
                                            {{ $registration->surname }}</td>
                                    </tr>
                                    <tr>
                                        <th>เลขประจำตัวผู้เสียภาษี:</th>
                                        <td>{{ $registration->tax_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>วันเกิด:</th>
                                        <td>{{ $registration->birthday ? $registration->birthday->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>เบอร์โทรศัพท์:</th>
                                        <td>{{ $registration->tal_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>อีเมล:</th>
                                        <td>{{ $registration->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>ที่อยู่:</th>
                                        <td>{{ $registration->address1 }} {{ $registration->address2 }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <h6 class="mb-3 text-primary">ประเภทการลงทะเบียน</h6>
                                <div class="alert alert-info">
                                    @if ($registration->reg_type == 'employee')
                                        <strong>พนักงาน</strong>
                                    @elseif($registration->reg_type == 'vendor')
                                        <strong>คู่ค้าผู้ขาย</strong>
                                    @else
                                        <strong>คู่ค้าผู้ซื้อ</strong>
                                    @endif
                                </div>

                                @if ($registration->reg_type == 'employee')
                                    <h6 class="mb-3 text-primary mt-4">ข้อมูลบัญชีธนาคาร</h6>
                                    <table class="table table-sm">
                                        <tr>
                                            <th width="40%">ธนาคาร:</th>
                                            <td>{{ $registration->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>ชื่อบัญชี:</th>
                                            <td>{{ $registration->bank_account_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>เลขที่บัญชี:</th>
                                            <td>{{ $registration->bank_account_number }}</td>
                                        </tr>
                                    </table>
                                @endif

                                @if ($registration->reg_type == 'vendor')
                                    <h6 class="mb-3 text-primary mt-4">ข้อมูลธุรกิจ</h6>
                                    <table class="table table-sm">
                                        <tr>
                                            <th width="40%">ชื่อธุรกิจ:</th>
                                            <td>{{ $registration->vendor_business_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>ประเภท:</th>
                                            <td>{{ $registration->vendor_entity_type == '1' ? 'นิติบุคคล' : 'บุคคลธรรมดา' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ประเทศ:</th>
                                            <td>{{ $registration->vendor_country }}</td>
                                        </tr>
                                        <tr>
                                            <th>เครดิต:</th>
                                            <td>{{ $registration->vendor_credit_days }} วัน</td>
                                        </tr>
                                    </table>
                                @endif

                                @if ($registration->reg_type == 'buyer')
                                    <h6 class="mb-3 text-primary mt-4">ข้อมูลธุรกิจ</h6>
                                    <table class="table table-sm">
                                        <tr>
                                            <th width="40%">ชื่อธุรกิจ:</th>
                                            <td>{{ $registration->buyer_business_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>ประเภท:</th>
                                            <td>{{ $registration->buyer_entity_type == '1' ? 'นิติบุคคล' : 'บุคคลธรรมดา' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ประเทศ:</th>
                                            <td>{{ $registration->buyer_country }}</td>
                                        </tr>
                                        <tr>
                                            <th>เครดิต:</th>
                                            <td>{{ $registration->buyer_credit_days }} วัน</td>
                                        </tr>
                                    </table>
                                @endif
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-3 text-primary">การจัดการ</h6>
                                <div class="d-flex gap-2">
                                    <form action="{{ route('admin.approvals.approve', $registration->id) }}" method="POST"
                                        onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการอนุมัติการลงทะเบียนนี้?')">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <i class="ri-check-line me-1"></i>อนุมัติ
                                        </button>
                                    </form>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#rejectModal">
                                        <i class="ri-close-line me-1"></i>ปฏิเสธ
                                    </button>

                                    <a href="{{ route('admin.approvals.index') }}" class="btn btn-secondary">
                                        <i class="ri-arrow-left-line me-1"></i>กลับ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ปฏิเสธ -->
    <div class="modal fade" id="rejectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.approvals.reject', $registration->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">ปฏิเสธการลงทะเบียน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">เหตุผลในการปฏิเสธ<span class="text-danger">*</span></label>
                            <textarea name="reject_reason" class="form-control" rows="4" required placeholder="กรุณาระบุเหตุผล"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ยืนยันการปฏิเสธ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
