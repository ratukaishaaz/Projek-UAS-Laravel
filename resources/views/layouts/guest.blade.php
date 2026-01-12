<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIPENDAWA | Professional Integrated System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --teal-bright: #2dd4bf; /* Warna logo daun */
            --teal-primary: #0d9488;
            --bg-dark: #020617;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Ganti background biru kusam ke Dark Mode mewah */
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(45, 212, 191, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(13, 148, 136, 0.08) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        /* Branding Logo Styling */
        .brand-icon-wrapper {
            font-size: 4rem;
            color: var(--teal-bright);
            filter: drop-shadow(0 0 15px rgba(45, 212, 191, 0.5));
            transition: 0.3s;
        }

        .brand-title {
            font-weight: 800 !important; /* Kunci ketebalan */
            color: white;
            letter-spacing: 2px;
            margin-top: 10px;
            text-transform: uppercase;
        }

        .brand-subtitle {
            color: var(--teal-bright);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: 0.8;
        }

        /* Container Slot agar rapi */
        .auth-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        /* Hilangkan background putih kaku, pakai Glassmorphism */
        .glass-card {
            background: rgba(15, 23, 42, 0.8) !important;
            backdrop-filter: blur(16px);
            border-radius: 35px !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
        }

        .copyright {
            color: rgba(255, 255, 255, 0.3);
            font-weight: 600;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="text-center mb-5">
        <a href="/" class="text-decoration-none">
            <div class="brand-icon-wrapper mb-2">
                <i class="fa-solid fa-leaf"></i> </div>
            <h2 class="brand-title">SIPENDAWA</h2>
            <p class="brand-subtitle">Sistem Pendataan Warga</p>
        </a>
    </div>

    <div class="card glass-card">
        <div class="card-body p-4 p-md-5">
            {{ $slot }}
        </div>
    </div>
    
    <p class="text-center copyright mt-5 small">
    &copy; 2026 SIPENDAWA | RATU KAISHA AZ - UINSU
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>