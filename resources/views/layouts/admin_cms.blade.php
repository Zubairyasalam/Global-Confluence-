<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BioMed Summit 2027</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --admin-bg: #f4f7fb;
            --admin-sidebar: #0f172a;
            --admin-sidebar-hover: rgba(255, 255, 255, 0.05);
            --admin-primary: #00A896;
            --admin-text: #475569;
            --admin-white: #ffffff;
            --admin-border: #e2e8f0;
            --admin-green: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--admin-bg);
            color: var(--admin-text);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--admin-sidebar) 0%, #1e293b 100%);
            color: #94a3b8;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 10;
            transition: transform 0.3s ease;
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        }

        .sidebar-header {
            min-height: 85px;
            padding: 15px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .sidebar-header i {
            color: var(--admin-primary);
            font-size: 1.5rem;
        }

        .nav-links {
            list-style: none;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 5px;
            overflow-y: auto;
            flex: 1;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: rgba(148, 163, 184, 0.3);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(148, 163, 184, 0.5);
        }
        
        .content-area::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
        }

        .nav-links li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 25px;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }

        .nav-links li a:hover, .nav-links li a.active {
            background-color: var(--admin-sidebar-hover);
            color: #fff;
            border-left: 4px solid var(--admin-primary);
        }
        .nav-links li a:hover {
            padding-left: 30px;
        }

        .nav-links li a i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            min-width: 0;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            background-color: var(--admin-bg);
        }

        .topbar {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 5;
            height: 85px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .topbar .title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--admin-sidebar);
        }

        .content-area {
            padding: 30px;
            flex: 1;
            min-width: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Card Styles */
        .card {
            background-color: var(--admin-white);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.03);
            padding: 25px;
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: var(--admin-primary);
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: background 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #008a7a;
        }

        .hamburger-menu {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--admin-sidebar);
            cursor: pointer;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(17, 35, 64, 0.5);
            z-index: 9;
            backdrop-filter: blur(2px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .topbar {
                padding: 0 15px;
            }
            .content-area {
                padding: 15px;
            }
            .hamburger-menu {
                display: block;
            }

            /* Smart Grid Overrides for inline styles */
            .main-content div[style*="grid-template-columns: 1fr 350px"],
            .main-content div[style*="grid-template-columns: 1fr 350px;"],
            .main-content div[style*="grid-template-columns: 2fr 1fr"],
            .main-content div[style*="grid-template-columns: 2fr 1fr;"],
            .main-content div[style*="grid-template-columns: 1fr 1fr"],
            .main-content div[style*="grid-template-columns: 1fr 1fr;"],
            .main-content div[style*="grid-template-columns: 3fr 1fr"],
            .main-content div[style*="grid-template-columns: 3fr 1fr;"],
            .main-content div[style*="grid-template-columns: 1fr 1fr 1fr"],
            .main-content div[style*="grid-template-columns: 1fr 1fr 1fr;"],
            .main-content div[style*="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr))"],
            .main-content div[style*="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));"],
            .main-content div[style*="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr))"],
            .main-content div[style*="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));"],
            .crm-detail-grid {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/MMC-LOGO-2.jpg') }}" alt="MMC Logo" style="height: 70px; width: auto; object-fit: contain; mix-blend-mode: multiply;">
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </a>
            </li>
            
            <li style="padding: 15px 25px 5px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; color: #64748b; margin-top: 10px;">
                Records
            </li>
            <li>
                <a href="{{ route('admin.registrations') }}" class="{{ request()->routeIs('admin.registrations') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i> Registrations
                </a>
            </li>
            <li>
                <a href="{{ route('admin.submissions') }}" class="{{ request()->routeIs('admin.submissions') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-lines"></i> Paper Submissions
                </a>
            </li>

            <li style="padding: 15px 25px 5px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; color: #64748b; margin-top: 10px;">
                Website Pages
            </li>
            <li>
                <a href="{{ route('admin.home') }}" class="{{ request()->routeIs('admin.home') || request()->is('admin/home/*') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin.committee') }}" class="{{ request()->routeIs('admin.committee') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear"></i> Committee
                </a>
            </li>
            <li>
                <a href="{{ route('admin.experts') }}" class="{{ request()->routeIs('admin.experts') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-tie"></i> Experts
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tracks') }}" class="{{ request()->routeIs('admin.tracks') ? 'active' : '' }}">
                    <i class="fa-solid fa-flask"></i> Tracks
                </a>
            </li>
            <li>
                <a href="{{ route('admin.schedule') }}" class="{{ request()->routeIs('admin.schedule') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar-days"></i> Schedule
                </a>
            </li>
            <li>
                <a href="{{ route('admin.awards') }}" class="{{ request()->routeIs('admin.awards') ? 'active' : '' }}">
                    <i class="fa-solid fa-trophy"></i> Awards
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pre_conference') }}" class="{{ request()->routeIs('admin.pre_conference') ? 'active' : '' }}">
                    <i class="fa-solid fa-person-chalkboard"></i> Pre-Conference
                </a>
            </li>
            <li>
                <a href="{{ route('admin.mcc_memorial') }}" class="{{ request()->routeIs('admin.mcc_memorial') ? 'active' : '' }}">
                    <i class="fa-solid fa-landmark"></i> MCC Memorial
                </a>
            </li>
            <li>
                <a href="{{ route('admin.visit') }}" class="{{ request()->routeIs('admin.visit') ? 'active' : '' }}">
                    <i class="fa-solid fa-map-location-dot"></i> Visit
                </a>
            </li>
            
            <li style="padding: 15px 25px 5px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; color: #64748b; margin-top: 10px;">
                Settings
            </li>
            <li>
                <a href="{{ route('admin.theme_settings') }}" class="{{ request()->routeIs('admin.theme_settings') ? 'active' : '' }}">
                    <i class="fa-solid fa-palette"></i> Theme Settings
                </a>
            </li>
            <li>
                <a href="/" target="_blank">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Site
                </a>
            </li>
        </ul>
    </aside>

    <style>
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .topbar .title {
                font-size: 1.1rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .topbar-right {
                gap: 12px;
            }
            .topbar-user-name {
                display: none;
            }
            .topbar-logout-text {
                display: none;
            }
            /* Globally fix flex containers that squish on mobile */
            div[style*="display: flex;"][style*="justify-content: space-between"] {
                flex-wrap: wrap !important;
                gap: 15px !important;
            }
        }
    </style>
    <!-- Main Content -->
    <main class="main-content">
        <header class="topbar">
            <div style="display: flex; align-items: center; gap: 15px; min-width: 0;">
                <button class="hamburger-menu" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">@yield('header_title', 'Dashboard')</div>
            </div>
            <div class="topbar-right">
                <span style="font-weight: 600; color: var(--admin-text); display: flex; align-items: center;">
                    <i class="fa-solid fa-circle-user" style="font-size: 1.5rem; color: var(--admin-sidebar); margin-right: 8px;"></i> 
                    <span class="topbar-user-name" style="white-space: nowrap;">{{ auth()->user()->name ?? 'Administrator' }}</span>
                </span>
                
                <form method="POST" action="{{ route('logout') }}" style="display: flex; margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #ef4444; font-weight: 600; font-size: 0.9rem; cursor: pointer; display: flex; align-items: center; gap: 5px; padding: 0;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="topbar-logout-text">Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <div class="content-area">
            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('open');
            
            if (sidebar.classList.contains('open')) {
                overlay.classList.add('show');
            } else {
                overlay.classList.remove('show');
            }
        }
    </script>
</body>
</html>
