<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENDAWA | Sistem Pendataan Warga</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --teal-deep: #042f2e; /* Teal Tua Sidebar */
            --teal-primary: #0d9488; /* Teal Dashboard */
            --teal-accent: #2dd4bf; /* Teal Terang Logo */
            --bg-dark: #020617;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-dark);
            color: white;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(13, 148, 136, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(4, 47, 46, 0.4) 0%, transparent 40%);
            min-height: 100vh;
        }

        /* Navigasi SIPENDAWA */
        .navbar { padding: 1.5rem 0; }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            color: white !important;
            letter-spacing: 1.5px;
        }
        .navbar-brand i {
            color: var(--teal-accent);
            margin-right: 12px;
            filter: drop-shadow(0 0 10px rgba(45, 212, 191, 0.6));
        }

        /* Hero Content */
        .hero-section { padding: 80px 0; }
        .hero-title {
            font-size: 4.8rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 2rem;
        }
        .hero-title span {
            color: var(--teal-accent);
            display: block;
        }
        .hero-desc {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.65);
            max-width: 550px;
            margin-bottom: 3rem;
            line-height: 1.8;
        }

        /* Card Kendali */
        .admin-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 40px;
            padding: 4rem 3rem;
            backdrop-filter: blur(20px);
            text-align: center;
            transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .admin-card:hover {
            border-color: var(--teal-primary);
            background: rgba(13, 148, 136, 0.08);
            transform: translateY(-15px) scale(1.02);
        }

        .icon-shield {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--teal-primary), var(--teal-deep));
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2.5rem;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 20px 40px rgba(13, 148, 136, 0.4);
        }

        /* Tombol Utama SIPENDAWA */
        .btn-sipendawa {
            background: var(--teal-primary);
            color: white;
            font-weight: 800;
            padding: 16px 40px;
            border-radius: 100px;
            border: none;
            transition: 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 1.1rem;
        }
        .btn-sipendawa:hover {
            background: var(--teal-accent);
            color: var(--teal-deep);
            box-shadow: 0 12px 25px rgba(45, 212, 191, 0.4);
            transform: translateY(-3px);
        }

        /* Badge Fitur */
        .stats-badge {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 18px 28px;
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            margin: 0 10px 15px 0;
            transition: 0.3s;
        }
        .stats-badge i { color: var(--teal-accent); font-size: 1.3rem; }
        .stats-badge:hover { border-color: var(--teal-accent); background: rgba(255, 255, 255, 0.1); }

        @media (max-width: 992px) {
            .hero-title { font-size: 3.2rem; text-align: center; }
            .hero-desc { text-align: center; margin: 0 auto 3rem; }
            .badge-container { text-align: center; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-leaf"></i>SIPENDAWA
        </a>
        <div class="d-none d-md-block">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-sipendawa py-2 px-4 fs-6">DASHBOARD AKTIF</a>
            @else
                <a href="{{ route('login') }}" class="text-white text-decoration-none fw-bold me-4 opacity-75 hover-teal">MASUK</a>
                <a href="{{ route('register') }}" class="btn-sipendawa py-2 px-4 fs-6">DAFTAR</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container hero-section">
    <div class="row align-items-center g-5">
        <div class="col-lg-7">
            <h1 class="hero-title">
                Sistem <span>Pendataan Warga</span>
            </h1>
            <p class="hero-desc">
                Solusi digital terintegrasi untuk pengelolaan basis data kependudukan, statistik warga tetap, mutasi, hingga pemantauan warga sementara secara real-time.
            </p>
            
            <div class="badge-container">
                <div class="stats-badge">
                    <i class="fa-solid fa-database"></i>
                    <span>Database Terpusat</span>
                </div>
                <div class="stats-badge">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Statistik Akurat</span>
                </div>
                <div class="stats-badge">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <span>Pantau Mutasi</span>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="admin-card shadow-lg">
                <div class="icon-shield">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h3 class="fw-800 mb-4">Akses Pusat Kendali</h3>
                <p class="text-white-50 mb-5 px-4">
                    Gunakan hak akses administrator Anda untuk mengelola integrasi data kependudukan dan memantau statistik wilayah.
                </p>
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-sipendawa w-100 py-3 justify-content-center">
                        BUKA PUSAT KENDALI <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-sipendawa w-100 py-3 justify-content-center">
                        MASUK KE DASHBOARD <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endauth
                
                <p class="mt-4 small text-white-50">
                    <i class="fa-solid fa-circle-check text-success me-1"></i> Sistem Terverifikasi Keamanan Data
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>