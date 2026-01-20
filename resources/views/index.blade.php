@extends('layouts.office')

@section('title', 'Dashboard')
@include('import.style')

@section('content')
    {{-- Header --}}
    <div class="dashboard-header">
        <h1>{{ auth()->user()->name ?? 'ผู้ใช้งาน' }}</h1>
        <h2>{{ auth()->user()->}} ?? ไม่ทราบบริษัท</h2>
        <p>เลือกเมนูด้านล่างเพื่อเริ่มใช้งานระบบ BlueClick</p>
    </div>

    {{-- Shortcut Menu --}}
    <div class="shortcut-grid">
        <a href="#" class="shortcut-card blue">
            <div class="shortcut-icon">
                <i class="mdi mdi-account-group"></i>
            </div>
            <h3 class="shortcut-title">จัดการผู้ใช้</h3>
            <p class="shortcut-desc">เพิ่ม แก้ไข ลบข้อมูลผู้ใช้งานในระบบ</p>
        </a>

        <a href="#" class="shortcut-card green">
            <div class="shortcut-icon">
                <i class="mdi mdi-file-document-multiple"></i>
            </div>
            <h3 class="shortcut-title">เอกสาร</h3>
            <p class="shortcut-desc">จัดการเอกสารและไฟล์ต่างๆ ในระบบ</p>
        </a>

        <a href="#" class="shortcut-card orange">
            <div class="shortcut-icon">
                <i class="mdi mdi-chart-line"></i>
            </div>
            <h3 class="shortcut-title">รายงาน</h3>
            <p class="shortcut-desc">ดูรายงานสรุปและวิเคราะห์ข้อมูล</p>
        </a>

        <a href="#" class="shortcut-card purple">
            <div class="shortcut-icon">
                <i class="mdi mdi-calendar-check"></i>
            </div>
            <h3 class="shortcut-title">ตารางงาน</h3>
            <p class="shortcut-desc">จัดการตารางงานและนัดหมาย</p>
        </a>

        <a href="#" class="shortcut-card teal">
            <div class="shortcut-icon">
                <i class="mdi mdi-cog"></i>
            </div>
            <h3 class="shortcut-title">ตั้งค่า</h3>
            <p class="shortcut-desc">ปรับแต่งการตั้งค่าระบบ</p>
        </a>
    </div>

    {{-- Stats Section --}}
    <div class="stats-section">
        <h2 class="stats-title">สถิติภาพรวม</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">1,234</div>
                <div class="stat-label">ผู้ใช้งานทั้งหมด</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">567</div>
                <div class="stat-label">เอกสาร</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">89</div>
                <div class="stat-label">งานที่กำลังดำเนินการ</div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>

</script>
@endpush
