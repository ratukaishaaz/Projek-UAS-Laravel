<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIPENDAWA | Professional Integrated System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --teal-primary: #0d9488; 
            --teal-sidebar: #042f2e;
            --bg-body: #f0fdfa; 
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg-body); overflow-x: hidden; transition: 0.3s ease; }

        .sidebar { 
            width: var(--sidebar-width); height: 100vh; position: fixed; 
            background: linear-gradient(180deg, var(--teal-sidebar) 0%, #022c22 100%); 
            z-index: 1051; left: 0; transition: 0.3s ease;
        }

        .brand-logo { padding: 3.5rem 1rem 2rem 1rem; text-align: center; }
        .brand-logo h4 { 
            font-weight: 800 !important; 
            color: white;
            margin-top: 10px;
        }
        
        .brand-icon {
            display: block !important;
            font-size: 4.5rem !important; 
            color: #2dd4bf !important; 
            margin: 0 auto 15px auto;
            filter: drop-shadow(0 0 15px rgba(45, 212, 191, 0.7));
        }

        .clock-container {
            background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px; padding: 10px; margin: 0 1.2rem 2rem 1.2rem; text-align: center;
        }
        .clock-badge { font-family: 'JetBrains Mono', monospace; color: #2dd4bf; font-weight: 600; font-size: 1.2rem; }

        header {
            padding: 1rem 3rem;
            background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(13, 148, 136, 0.1); position: sticky; top: 0; z-index: 1000;
            margin-left: var(--sidebar-width); transition: 0.3s ease;
        }

        .main-content { margin-left: var(--sidebar-width); padding: 2.5rem; transition: 0.3s ease; }

        .nav-link { 
            color: #99f6e4; font-weight: 500; padding: 0.9rem 1.5rem; margin: 0.2rem 1.2rem;
            border-radius: 12px; transition: 0.3s; display: flex; align-items: center; text-decoration: none;
        }
        .nav-link:hover { color: white; background: rgba(45, 212, 191, 0.1); }
        .nav-link.active { 
            background: var(--teal-primary); 
            color: white !important; 
            font-weight: 800 !important; 
        }

        .dropdown-toggle::after { display: none !important; content: none !important; }

        .profile-btn {
            border: 2px solid white; background: var(--teal-primary);
            width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;
            cursor: pointer;
        }

        /* --- PERBAIKAN TOMBOL LOG OUT --- */
        .dropdown-item.text-danger:focus, 
        .dropdown-item.text-danger:active {
            background-color: rgba(220, 53, 69, 0.1) !important;
            color: #dc3545 !important;
            /* Mengganti cahaya biru dengan pendaran hijau teal tipis agar nyambung */
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.25) !important; 
            outline: none !important;
        }
        /* -------------------------------------------------------- */

        body.sidebar-closed .sidebar { left: calc(-1 * var(--sidebar-width)); }
        body.sidebar-closed header, body.sidebar-closed .main-content { margin-left: 0; }

        @media (max-width: 992px) {
            header, .main-content { margin-left: 0 !important; }
            .sidebar { left: calc(-1 * var(--sidebar-width)); }
            body.sidebar-open .sidebar { left: 0; }
        }
    </style>
</head>
<body id="body-app">
    <aside class="sidebar shadow-lg">
        <div class="brand-logo">
            <i class="fa-solid fa-leaf brand-icon"></i>
            <h4 class="fw-800">SIPENDAWA</h4>
            <p class="small fw-bold opacity-75 mt-1" style="color: #2dd4bf; letter-spacing: 1.5px; font-size: 0.6rem; text-transform: uppercase;">Sistem Pendataan Warga</p>
        </div>

        <div class="clock-container">
            <small class="text-white-50 d-block mb-1" style="font-size: 0.65rem; letter-spacing: 3px; font-weight: 800;">TIMES</small>
            <span class="clock-badge" id="live-clock">00:00:00</span>
        </div>

        <nav class="nav flex-column mt-2">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house-chimney me-3"></i> Dashboard
            </a>
            <a href="{{ route('kartukeluarga.index') }}" class="nav-link {{ request()->routeIs('kartukeluarga.*') ? 'active' : '' }}">
                <i class="fa-solid fa-address-card me-3"></i> Data KK
            </a>
            <a href="{{ route('warga.index') }}" class="nav-link {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-3"></i> Data Warga
            </a>
            <a href="{{ route('mutasi.index') }}" class="nav-link {{ request()->routeIs('mutasi.*') ? 'active' : '' }}">
                <i class="fa-solid fa-right-left me-3"></i> Data Mutasi
            </a>
            <a href="{{ route('wargasementara.index') }}" class="nav-link {{ request()->routeIs('wargasementara.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-clock me-3"></i> Warga Sementara
            </a>
        </nav>
    </aside>

    <header class="d-flex justify-content-between align-items-center shadow-sm">
        <div class="d-flex align-items-center">
            <button class="btn btn-light rounded-3 me-3 border shadow-sm" id="btn-toggle-sidebar" style="color: var(--teal-primary);">
                <i class="fa-solid fa-bars fs-4"></i>
            </button>
            <h5 class="fw-800 mb-0 text-dark">Hello, {{ explode(' ', Auth::user()->name)[0] }} 👋</h5>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown profile-dropdown">
                <div class="profile-btn rounded-circle shadow-sm dropdown-toggle" 
                     id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user text-white fs-5"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2" aria-labelledby="profileMenu">
                    <li class="px-3 py-2 border-bottom">
                        <p class="mb-0 fw-bold small text-dark">{{ Auth::user()->name }}</p>
                        <small class="text-muted" style="font-size: 0.7rem;">Administrator</small>
                    </li>
                    <li class="p-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-bold rounded-2">
                                <i class="fa-solid fa-power-off me-2"></i> Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="main-content">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateClock() {
            const clock = document.getElementById('live-clock');
            if(clock) clock.innerText = new Date().toLocaleTimeString('id-ID', { hour12: false });
        }
        setInterval(updateClock, 1000);
        updateClock();

        const btnToggle = document.getElementById('btn-toggle-sidebar');
        const bodyApp = document.getElementById('body-app');

        btnToggle.addEventListener('click', () => {
            if (window.innerWidth > 992) {
                bodyApp.classList.toggle('sidebar-closed');
            } else {
                bodyApp.classList.toggle('sidebar-open');
            }
        });
    </script>
</body>
</html>