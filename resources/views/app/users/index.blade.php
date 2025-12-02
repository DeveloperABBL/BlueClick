@extends('layouts.app')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">รายชื่อผู้ใช้งานระบบ</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">รายชื่อผู้ใช้งานระบบ</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="invoiceList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">รายชื่อผู้ใช้งาน 200 รายการ</h5>
                </div>
            </div>
            <div class="card-body bg-light-subtle border border-dashed border-start-0 border-end-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-8 col-sm-12">
                            <div class="search-box">
                                <input type="text" class="form-control search bg-light border-light" placeholder="ค้นหาข้อมูลผู้ใช้งานระบบ... (ชื่อ นามสกุล เบอร์โทร Email เลขประจำตัวประชาชน)" id="search-invoice" />
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-sm-4">
                            <div class="input-light">
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                    <option value="">ทุกสถานะ</option>
                                    <option value="active" selected>พร้อมใช้งาน</option>
                                    <option value="inactive">ระงับการใช้งาน</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-xxl-1 col-sm-4">
                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                <i class="ri-equalizer-fill me-1 align-bottom"></i> กรองข้อมูล
                            </button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-card">
                        <table class="table align-middle table-nowrap" id="userTable">
                            <thead class="text-muted">
                                <tr>
                                    <th class="sort text-uppercase">ลำดับ</th>
                                    <th class="sort text-uppercase">รูปภาพ</th>
                                    <th class="sort text-uppercase">เลขประจำตัวประชาชน</th>
                                    <th class="sort text-uppercase">คำนำหน้าชื่อ</th>
                                    <th class="sort text-uppercase">ชื่อจริง</th>
                                    <th class="sort text-uppercase">นามสกุล</th>
                                    <th class="sort text-uppercase">เบอร์โทรติดต่อ</th>
                                    <th class="sort text-uppercase">Email</th>
                                    <th class="sort text-uppercase">จังหวัด</th>
                                    <th class="sort text-uppercase">ประเภทผู้ใช้งาน</th>
                                    <th class="sort text-uppercase text-center">สถานะการใช้งาน</th>
                                    <th class="sort text-uppercase">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript:void(0);" class="fw-medium link-primary">1</a></td>
                                    <td>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle object-fit-cover">
                                            </span>
                                        </div>
                                    </td>
                                    <td>1234567890123</td>
                                    <td>นาย</td>
                                    <td>สมชาย</td>
                                    <td>ใจดี</td>
                                    <td>0812345678</td>
                                    <td>example@msn.com</td>
                                    <td>ปทุมธานี</td>
                                    <td>Admin</td>
                                    <td class="text-center"><span class="badge bg-success-subtle text-success text-uppercase">พร้อมใช้งาน</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('users.show') }}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> ดูข้อมูล</a>
                                                <a class="dropdown-item" href="{{ route('users.edit') }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> แก้ไขข้อมูล</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-unfollow-fill align-bottom me-2 text-muted"></i> ระงับการใช้งาน</a>
                                                <a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> ลบข้อมูล</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="javascript:void(0);" class="fw-medium link-primary">2</a></td>
                                    <td>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle object-fit-cover">
                                            </span>
                                        </div>
                                    </td>
                                    <td>1234567890123</td>
                                    <td>นาย</td>
                                    <td>สมชาย</td>
                                    <td>ใจดี</td>
                                    <td>0812345678</td>
                                    <td>example@msn.com</td>
                                    <td>ปทุมธานี</td>
                                    <td>Staff</td>
                                    <td class="text-center"><span class="badge bg-danger-subtle text-danger text-uppercase">ระงับการใช้งาน</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('users.show') }}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> ดูข้อมูล</a>
                                                <a class="dropdown-item" href="{{ route('users.edit') }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> แก้ไขข้อมูล</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-follow-fill align-bottom me-2 text-muted"></i> เปิดใช้งาน</a>
                                                <a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> ลบข้อมูล</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>

@push('scripts')
<script>
    $('.btn-delete').on('click', function () {
        console.log('delete');

        Swal.fire({
            title: "",
            text: "กรุณายืนยันการทำรายการ",
            icon: "warning",
            showCancelButton: 1,
            customClass: {
                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                cancelButton: "btn btn-danger w-xs mt-2"
            },
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            buttonsStyling: !1,
        }).then(function (t) {
            if (t.value) {
                Swal.fire({
                    title: "สำเร็จ!",
                    text: "ลบข้อมูลผู้ใช้งานเรียบร้อยแล้ว",
                    icon: "success",
                });
            }
        });
    });
</script>
@endpush

@endsection
