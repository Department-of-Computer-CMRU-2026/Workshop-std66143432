<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel — Senior-to-Junior Workshop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #818cf8;
            --primary-dark: #6366f1;
            --accent: #fbbf24;
            --success: #34d399;
            --danger: #f87171;
            --bg: #06061a;
            --glass-bg: rgba(255, 255, 255, .05);
            --glass-border: rgba(255, 255, 255, .12);
            --glass-shadow: 0 8px 40px rgba(0, 0, 0, .5);
            --text: #f0f4ff;
            --text-muted: #94a3b8;
            --text-dim: #546178;
            --radius: 1.125rem;
        }

        html,
        body {
            min-height: 100vh;
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        /* Aurora background */
        .aurora {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .aurora-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(110px);
            animation: drift 20s ease-in-out infinite alternate;
        }

        .orb1 {
            width: 65vw;
            height: 60vh;
            background: radial-gradient(ellipse, rgba(99, 102, 241, .45) 0%, transparent 70%);
            top: -20%;
            left: -15%;
        }

        .orb2 {
            width: 55vw;
            height: 55vh;
            background: radial-gradient(ellipse, rgba(168, 85, 247, .35) 0%, transparent 70%);
            bottom: -15%;
            right: -10%;
            animation-delay: -10s;
        }

        .orb3 {
            width: 40vw;
            height: 38vh;
            background: radial-gradient(ellipse, rgba(6, 182, 212, .25) 0%, transparent 70%);
            bottom: 20%;
            left: 40%;
            animation-delay: -6s;
            filter: blur(90px);
        }

        @keyframes drift {
            0% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(3%, 5%) scale(1.06);
            }

            66% {
                transform: translate(-4%, 2%) scale(.95);
            }

            100% {
                transform: translate(2%, -4%) scale(1.03);
            }
        }

        .layout {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* ── SIDEBAR ─────────────────────────────────────── */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: rgba(6, 6, 26, .75);
            backdrop-filter: blur(28px) saturate(160%);
            -webkit-backdrop-filter: blur(28px) saturate(160%);
            border-right: 1px solid var(--glass-border);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            box-shadow: 4px 0 24px rgba(0, 0, 0, .4);
        }

        .sidebar-header {
            padding: 1.5rem 1.25rem 1rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .sidebar-brand {
            font-size: .88rem;
            font-weight: 800;
            color: #c7d2fe;
            letter-spacing: -.01em;
        }

        .sidebar-brand span {
            color: var(--accent);
        }

        .sidebar-role {
            margin-top: .3rem;
            font-size: .68rem;
            color: var(--text-dim);
            background: rgba(99, 102, 241, .1);
            border: 1px solid rgba(99, 102, 241, .25);
            display: inline-block;
            padding: .15rem .55rem;
            border-radius: 100px;
            letter-spacing: .04em;
        }

        .sidebar-nav {
            padding: .75rem;
            flex: 1;
        }

        .nav-label {
            font-size: .63rem;
            font-weight: 700;
            color: var(--text-dim);
            letter-spacing: .09em;
            text-transform: uppercase;
            padding: .5rem .5rem .25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .55rem .75rem;
            border-radius: .55rem;
            font-size: .84rem;
            color: var(--text-muted);
            text-decoration: none;
            transition: all .15s;
            margin-bottom: .1rem;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, .06);
            color: var(--text);
        }

        .nav-link.active {
            background: rgba(99, 102, 241, .14);
            border: 1px solid rgba(99, 102, 241, .2);
            color: #c7d2fe;
        }

        .nav-icon {
            width: 15px;
            height: 15px;
            opacity: .8;
        }

        .sidebar-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid var(--glass-border);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: .75rem;
        }

        .sidebar-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-dark), #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .62rem;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, .3);
        }

        .sidebar-user-name {
            font-size: .8rem;
            font-weight: 600;
            line-height: 1.25;
        }

        .sidebar-user-email {
            font-size: .68rem;
            color: var(--text-dim);
        }

        .btn-logout {
            width: 100%;
            padding: .45rem .75rem;
            border-radius: .55rem;
            background: rgba(248, 113, 113, .07);
            border: 1px solid rgba(248, 113, 113, .2);
            color: #fca5a5;
            font-size: .8rem;
            font-family: inherit;
            cursor: pointer;
            transition: all .15s;
            font-weight: 500;
        }

        .btn-logout:hover {
            background: rgba(248, 113, 113, .15);
        }

        /* ── MAIN ────────────────────────────────────────── */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .topbar {
            height: 56px;
            background: rgba(6, 6, 26, .55);
            backdrop-filter: blur(18px) saturate(150%);
            -webkit-backdrop-filter: blur(18px) saturate(150%);
            border-bottom: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-breadcrumb {
            font-size: .84rem;
            color: var(--text-muted);
        }

        .topbar-breadcrumb strong {
            color: var(--text);
        }

        .content {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* ── SHARED CARD/TABLE ───────────────────────────── */
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(20px) saturate(160%);
            -webkit-backdrop-filter: blur(20px) saturate(160%);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: .35rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .35), inset 0 1px 0 rgba(255, 255, 255, .08);
            transition: transform .2s, border-color .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(129, 140, 248, .3);
        }

        .stat-label {
            font-size: .73rem;
            color: var(--text-dim);
            font-weight: 500;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            line-height: 1;
        }

        .stat-sub {
            font-size: .73rem;
            color: var(--text-muted);
        }

        .stat-accent {
            color: #c7d2fe;
        }

        .stat-success {
            color: var(--success);
        }

        .stat-warning {
            color: var(--accent);
        }

        .stat-danger {
            color: var(--danger);
        }

        .card {
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(22px) saturate(160%);
            -webkit-backdrop-filter: blur(22px) saturate(160%);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .35), inset 0 1px 0 rgba(255, 255, 255, .08);
        }

        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: .95rem;
            font-weight: 700;
        }

        .card-body {
            padding: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: .84rem;
        }

        thead th {
            padding: .6rem 1rem;
            text-align: left;
            font-size: .68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: var(--text-dim);
            background: rgba(255, 255, 255, .02);
            border-bottom: 1px solid var(--glass-border);
        }

        tbody td {
            padding: .8rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            color: var(--text-muted);
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: rgba(99, 102, 241, .04);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: .22rem .55rem;
            border-radius: 100px;
            font-size: .68rem;
            font-weight: 600;
        }

        .badge-full {
            background: rgba(248, 113, 113, .1);
            border: 1px solid rgba(248, 113, 113, .28);
            color: #fca5a5;
        }

        .badge-open {
            background: rgba(52, 211, 153, .1);
            border: 1px solid rgba(52, 211, 153, .28);
            color: #6ee7b7;
        }

        .badge-warning {
            background: rgba(251, 191, 36, .1);
            border: 1px solid rgba(251, 191, 36, .28);
            color: #fde68a;
        }

        /* Seat bar */
        .seat-bar-bg {
            height: 5px;
            border-radius: 100px;
            background: rgba(255, 255, 255, .06);
            overflow: hidden;
            width: 100px;
            display: inline-block;
        }

        .seat-bar-fill {
            height: 100%;
            border-radius: 100px;
        }

        .fill-green {
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .fill-amber {
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .fill-red {
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        /* Glass buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .5rem 1rem;
            border-radius: .55rem;
            font-size: .82rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all .18s;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-dark), #7c3aed);
            color: white;
            box-shadow: 0 4px 16px rgba(99, 102, 241, .4);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(99, 102, 241, .55);
        }

        .btn-ghost {
            background: rgba(255, 255, 255, .06);
            color: var(--text-muted);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(6px);
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, .1);
            color: var(--text);
            border-color: rgba(255, 255, 255, .22);
        }

        .btn-danger {
            background: rgba(248, 113, 113, .08);
            color: #fca5a5;
            border: 1px solid rgba(248, 113, 113, .25);
        }

        .btn-danger:hover {
            background: rgba(248, 113, 113, .16);
        }

        .btn-sm {
            padding: .33rem .7rem;
            font-size: .78rem;
        }

        /* Form */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: .4rem;
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .form-input {
            background: rgba(255, 255, 255, .06);
            backdrop-filter: blur(8px);
            border: 1px solid var(--glass-border);
            border-radius: .55rem;
            padding: .62rem .875rem;
            color: var(--text);
            font-family: inherit;
            font-size: .875rem;
            transition: border-color .15s, background .15s;
            width: 100%;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-dark);
            background: rgba(99, 102, 241, .08);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .18);
        }

        .form-input::placeholder {
            color: var(--text-dim);
        }

        .form-error {
            font-size: .73rem;
            color: #fca5a5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Flash */
        .flash {
            padding: .75rem 1rem;
            border-radius: .625rem;
            font-size: .84rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
            backdrop-filter: blur(8px);
        }

        .flash-success {
            background: rgba(52, 211, 153, .08);
            border: 1px solid rgba(52, 211, 153, .25);
            color: #6ee7b7;
        }

        .flash-error {
            background: rgba(248, 113, 113, .08);
            border: 1px solid rgba(248, 113, 113, .25);
            color: #fca5a5;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .65);
            backdrop-filter: blur(6px);
            z-index: 200;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal {
            background: rgba(255, 255, 255, .07);
            backdrop-filter: blur(36px) saturate(180%);
            -webkit-backdrop-filter: blur(36px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 1.25rem;
            padding: 2rem;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 24px 64px rgba(0, 0, 0, .6), inset 0 1px 0 rgba(255, 255, 255, .12);
        }

        .modal-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: .5rem;
        }

        .modal-body {
            font-size: .84rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        .modal-actions {
            display: flex;
            gap: .75rem;
            justify-content: flex-end;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }

        .page-title {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .page-sub {
            font-size: .81rem;
            color: var(--text-muted);
            margin-top: .2rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-dim);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="aurora">
        <div class="aurora-orb orb1"></div>
        <div class="aurora-orb orb2"></div>
        <div class="aurora-orb orb3"></div>
    </div>

    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('home') }}" class="brand-logo" style="margin-bottom: 0.3rem;">
                    <div class="brand-icon-glass" style="width: 32px; height: 32px; font-size: 0.9rem;">S<span>/</span>J
                    </div>
                    <div class="brand-text-minimal">
                        <span class="title" style="font-size: 0.85rem;">Senior to Junior</span>
                        <span class="subtitle" style="font-size: 0.55rem;">Workshop</span>
                    </div>
                </a>
                <div class="sidebar-role">⚙ Admin Panel</div>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-label">Overview</div>
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <div class="nav-label" style="margin-top:.5rem;">Events</div>
                <a href="{{ route('admin.events.index') }}"
                    class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    จัดการ Events
                </a>
            </nav>
            <div class="sidebar-footer">
                <div class="sidebar-user">
                    <div class="sidebar-avatar">{{ auth()->user()->initials() }}</div>
                    <div>
                        <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                        <div class="sidebar-user-email">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">ออกจากระบบ</button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div class="topbar-breadcrumb">
                    <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">🏠
                        หน้าหลัก</a>
                    <span style="margin: 0 .5rem; color: var(--text-dim);">/</span>
                    <strong>{{ $title ?? 'Admin Panel' }}</strong>
                </div>
            </div>
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>