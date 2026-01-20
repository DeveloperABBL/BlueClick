<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <title>BlueClick | เลือกธุรกิจ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="BlueClick System" name="description" />
    <meta content="BlueClick" name="author" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #b3cae2 0%, #8fb3d8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #6fa3d6 0%, #5a8cc2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .card-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .card-header p {
            font-size: 15px;
            opacity: 0.95;
        }

        .card-body {
            padding: 50px 40px;
        }

        .business-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            max-width: 900px;
            margin: 0 auto;
        }

        .business-card {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .business-item {
            background: white;
            border: 2px solid #e8f1f8;
            border-radius: 16px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .business-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #6fa3d6, #5a8cc2);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .business-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
            border-color: #b3cae2;
        }

        .business-item:hover::before {
            transform: scaleX(1);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            transition: all 0.3s ease;
        }

        .business-item:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        .bg-primary {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1976d2;
        }

        .bg-success {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #388e3c;
        }

        .bg-secondary {
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
            color: #616161;
        }

        .business-name {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .business-code {
            font-size: 13px;
            color: #95a5a6;
            font-weight: 500;
        }

        .add-business {
            background: #fafbfc;
            border: 2px dashed #c5d9e8;
            border-radius: 16px;
            padding: 30px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }

        .add-business:hover {
            background: white;
            border-color: #6fa3d6;
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        }

        .add-business .icon-wrapper {
            background: linear-gradient(135deg, #f0f4f8 0%, #e1e8ed 100%);
            color: #6fa3d6;
        }

        .add-business:hover .icon-wrapper {
            background: linear-gradient(135deg, #6fa3d6 0%, #5a8cc2 100%);
            color: white;
        }

        .add-text {
            font-size: 16px;
            font-weight: 600;
            color: #6fa3d6;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            color: white;
            padding: 30px 20px;
            font-size: 14px;
        }

        footer a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .card-header h1 {
                font-size: 24px;
            }

            .card-body {
                padding: 30px 20px;
            }

            .business-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .business-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-card">
            <div class="card-header">
                <h1>เลือกธุรกิจที่ต้องการเข้าใช้งาน</h1>
            </div>

            <div class="card-body">
                <div class="business-grid">
                    <!-- ธุรกิจ 1 -->
                    <a href="{{ route('home') }}">
                        <div class="business-item">
                            <div class="icon-wrapper bg-primary">
                                <i class="ri-building-2-fill"></i>
                            </div>
                            <h6 class="business-name">บริษัท A จำกัด</h6>
                            <p class="business-code">รหัส: BIZ001</p>
                        </div>
                    </a>
                    <!-- ธุรกิจ 2 -->
                    <a href="#" class="business-card">
                        <div class="business-item">
                            <div class="icon-wrapper bg-success">
                                <i class="ri-building-2-fill"></i>
                            </div>
                            <h6 class="business-name">บริษัท B จำกัด</h6>
                            <p class="business-code">รหัส: BIZ002</p>
                        </div>
                    </a>

                    <!-- เพิ่มธุรกิจใหม่ -->
                    <a href="#" class="business-card">
                        <div class="add-business">
                            <div class="icon-wrapper">
                                <i class="ri-add-line"></i>
                            </div>
                            <h6 class="add-text">เพิ่มธุรกิจใหม่</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <footer>
            <p>© 2025 BlueClick | Designed & Developed by BlueLane</p>
        </footer>
    </div>
</body>

</html>
