<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Sarabun', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .content {
            padding: 30px;
        }

        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
        }

        .password-box {
            background: #fff3cd;
            border: 2px dashed #ffc107;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
            border-radius: 8px;
        }

        .password {
            font-size: 24px;
            font-weight: bold;
            color: #d63384;
            letter-spacing: 2px;
            font-family: 'Courier New', monospace;
        }

        .button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .warning {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ยินดีต้อนรับสู่ระบบ</h1>
        </div>

        <div class="content">
            <p>เรียน คุณ{{ $user->firstname }} {{ $user->surname }}</p>

            <p>ยินดีด้วย! บัญชีของคุณได้รับการอนุมัติแล้ว</p>

            <div class="info-box">
                <p><strong>ข้อมูลการเข้าสู่ระบบ:</strong></p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>

            <div class="password-box">
                <p style="margin: 0 0 10px 0;">รหัสผ่านชั่วคราวของคุณคือ:</p>
                <div class="password">{{ $temporaryPassword }}</div>
            </div>

            <p class="warning">⚠️ กรุณาเปลี่ยนรหัสผ่านทันทีหลังจากเข้าสู่ระบบครั้งแรก</p>

            <p style="text-align: center;">
                <a href="{{ route('login') }}" class="button">เข้าสู่ระบบ</a>
            </p>

            <div class="info-box">
                <p><strong>ขั้นตอนการใช้งาน:</strong></p>
                <ol>
                    <li>คลิกปุ่ม "เข้าสู่ระบบ" ด้านบน</li>
                    <li>ใส่อีเมลและรหัสผ่านชั่วคราว</li>
                    <li>ระบบจะให้คุณตั้งรหัสผ่านใหม่</li>
                    <li>เริ่มใช้งานระบบได้ทันที</li>
                </ol>
            </div>

            <p>หากคุณมีคำถามหรือต้องการความช่วยเหลือ กรุณาติดต่อทีมสนับสนุน</p>
        </div>

        <div class="footer">
            <p>อีเมลนี้ถูกส่งโดยอัตโนมัติ กรุณาอย่าตอบกลับ</p>
            <p>© 2024 BLUELANE OneClick. สงวนลิขสิทธิ์</p>
        </div>
    </div>
</body>

</html>
