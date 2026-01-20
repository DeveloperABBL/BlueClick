{{-- ============================================ --}}
{{-- layouts/app.blade.php --}}
{{-- ============================================ --}}
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'BlueClick')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="BlueClick System" name="description" />
    <meta content="BlueLane" name="author" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --bc-primary: #6fa3d6;
            --bc-primary-dark: #5a8cc2;
            --bc-gradient: linear-gradient(135deg, #b3cae2 0%, #8fb3d8 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bc-gradient);
            min-height: 100vh;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .auth-logo h2 {
            font-size: 42px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--bc-primary) 0%, var(--bc-primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .auth-logo p {
            color: #5a6c7d;
            font-size: 15px;
            margin: 0;
        }

        .auth-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border: none;
            overflow: hidden;
        }

        .auth-card .card-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-label .text-danger {
            color: #e74c3c;
        }

        .form-control,
        .form-select {
            border: 2px solid #e8f1f8;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--bc-primary);
            box-shadow: 0 0 0 4px rgba(111, 163, 214, 0.1);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f4f8;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--bc-primary) 0%, var(--bc-primary-dark) 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(111, 163, 214, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            border: none;
            padding: 12px 32px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(46, 204, 113, 0.3);
        }

        .btn-outline-primary {
            border: 2px solid var(--bc-primary);
            color: var(--bc-primary);
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--bc-primary);
            color: white;
            transform: translateY(-2px);
        }

        .auth-link {
            color: var(--bc-primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .auth-link:hover {
            color: var(--bc-primary-dark);
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e8f1f8, transparent);
            margin: 30px 0;
        }

        @media (max-width: 768px) {
            .auth-card .card-body {
                padding: 30px 20px;
            }

            .auth-logo h2 {
                font-size: 36px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="auth-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-sm-11">

                {{-- LOGO --}}
                <div class="auth-logo">
                    <h2>BlueClick</h2>
                    <p>@yield('subtitle')</p>
                </div>

                {{-- CONTENT --}}
                @yield('content')

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
