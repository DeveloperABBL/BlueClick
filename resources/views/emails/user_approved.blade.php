<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>สวัสดีคุณ {{ $user->first_name }}</h2>

    <p>
        บัญชีของคุณได้รับการอนุมัติเรียบร้อยแล้ว 🎉
    </p>

    <p>
        คุณสามารถเข้าสู่ระบบได้ทันทีที่:
        <br>
        <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
    </p>

    <p>
        ขอบคุณที่ใช้บริการ<br>
        ทีมงานระบบ
    </p>
</body>
</html>
