<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ตั้งรหัสผ่าน</title>
</head>
<body>
    <h2>สวัสดีคุณ {{ $name }}</h2>

    <p>
        ผู้ดูแลระบบได้อนุมัติบัญชีของคุณแล้ว คุณสามารถตั้งรหัสผ่านเพื่อใช้งานระบบได้โดยคลิกที่ลิงก์ด้านล่าง:
    </p>

    <p>
        <a href="{{ $url }}" style="padding: 10px 20px; background: #007bff; color: white; text-decoration:none;">
            ตั้งรหัสผ่านตอนนี้
        </a>
    </p>

    <p>หากคุณไม่ได้ร้องขอหรือไม่รู้จักอีเมลนี้ กรุณาเพิกเฉย</p>

    <p>ขอบคุณค่ะ</p>
</body>
</html>
