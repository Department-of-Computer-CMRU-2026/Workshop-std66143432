<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior-to-Junior Workshop 2026</title>
    <meta name="description"
        content="งาน Workshop สุดพิเศษที่รุ่นพี่มาถ่ายทอดความรู้สู่รุ่นน้อง เลือกหัวข้อที่สนใจและลงทะเบียนได้เลย">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap"
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
            --primary-deeper: #4f46e5;
            --primary-light: #c7d2fe;
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
        }

        html,
        body {
            min-height: 100vh;
            background: var(--bg);
            color: var(--text);
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            line-height: 1.65;
        }

        /* ── AURORA BACKGROUND ─────────────────────────── */
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
            width: 70vw;
            height: 65vh;
            background: radial-gradient(ellipse, rgba(99, 102, 241, .5) 0%, transparent 70%);
            top: -20%;
            left: -15%;
        }

        .orb2 {
            width: 60vw;
            height: 58vh;
            background: radial-gradient(ellipse, rgba(168, 85, 247, .38) 0%, transparent 70%);
            bottom: -15%;
            right: -10%;
            animation-delay: -10s;
        }

        .orb3 {
            width: 50vw;
            height: 45vh;
            background: radial-gradient(ellipse, rgba(6, 182, 212, .3) 0%, transparent 70%);
            bottom: 10%;
            left: 25%;
            animation-delay: -5s;
            filter: blur(95px);
        }

        .orb4 {
            width: 30vw;
            height: 30vh;
            background: radial-gradient(ellipse, rgba(245, 158, 11, .2) 0%, transparent 70%);
            top: 30%;
            right: 10%;
            animation-delay: -15s;
            filter: blur(80px);
        }

        @keyframes drift {
            0% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(3%, 5%) scale(1.07);
            }

            66% {
                transform: translate(-4%, 2%) scale(.94);
            }

            100% {
                transform: translate(2%, -4%) scale(1.04);
            }
        }

        .page-content {
            position: relative;
            z-index: 1;
        }

        /* ── NAVIGATION ─────────────────────────────────── */
        .nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(6, 6, 26, .6);
            backdrop-filter: blur(20px) saturate(160%);
            -webkit-backdrop-filter: blur(20px) saturate(160%);
            border-bottom: 1px solid var(--glass-border);
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 62px;
            padding: 0 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.05rem;
            color: #c7d2fe;
            letter-spacing: -.01em;
        }

        .nav-brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: .65rem;
            align-items: center;
        }

        .btn-nav {
            padding: .38rem .95rem;
            border-radius: .55rem;
            font-size: .83rem;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
            font-family: inherit;
            cursor: pointer;
            border: none;
        }

        .btn-nav-ghost {
            color: var(--text-muted);
            background: transparent;
        }

        .btn-nav-ghost:hover {
            color: var(--text);
        }

        .btn-nav-primary {
            background: linear-gradient(135deg, var(--primary-dark), #7c3aed);
            color: white;
            box-shadow: 0 3px 12px rgba(99, 102, 241, .4);
        }

        .btn-nav-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 20px rgba(99, 102, 241, .55);
        }

        .btn-nav-outline {
            border: 1px solid var(--glass-border);
            color: var(--text-muted);
            background: rgba(255, 255, 255, .05);
            font-size: .8rem;
            backdrop-filter: blur(6px);
        }

        .btn-nav-outline:hover {
            border-color: rgba(255, 255, 255, .25);
            color: var(--text);
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: .7rem;
        }

        .nav-user-name {
            font-size: .83rem;
            color: var(--text-muted);
        }

        .avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary-dark), #7c3aed);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .68rem;
            font-weight: 800;
            color: white;
            box-shadow: 0 0 0 2px rgba(129, 140, 248, .3);
        }

        /* ── HERO ───────────────────────────────────────── */
        .hero {
            text-align: center;
            padding: 5.5rem 2rem 4.5rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(245, 158, 11, .08);
            border: 1px solid rgba(245, 158, 11, .28);
            backdrop-filter: blur(8px);
            color: var(--accent);
            padding: .35rem 1rem;
            border-radius: 100px;
            font-size: .78rem;
            font-weight: 700;
            margin-bottom: 1.75rem;
            letter-spacing: .06em;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 5.5vw, 3.75rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -.03em;
            margin-bottom: 1.1rem;
            background: linear-gradient(135deg, #f0f4ff 0%, #c7d2fe 45%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            max-width: 560px;
            margin: 0 auto 2.25rem;
            color: var(--text-muted);
            font-size: 1.05rem;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;
            gap: .5rem;
            color: var(--text-muted);
            font-size: .88rem;
        }

        .hero-meta-icon {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(6px);
        }

        /* ── FLASH ──────────────────────────────────────── */
        .flash-container {
            max-width: 960px;
            margin: 0 auto 1.5rem;
            padding: 0 2rem;
        }

        .flash {
            padding: .85rem 1.25rem;
            border-radius: .75rem;
            font-size: .88rem;
            font-weight: 500;
            backdrop-filter: blur(8px);
        }

        .flash-success {
            background: rgba(52, 211, 153, .08);
            border: 1px solid rgba(52, 211, 153, .28);
            color: #6ee7b7;
        }

        .flash-error {
            background: rgba(248, 113, 113, .08);
            border: 1px solid rgba(248, 113, 113, .28);
            color: #fca5a5;
        }

        /* ── EVENTS GRID ────────────────────────────────── */
        .events-section {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: .4rem;
        }

        .section-sub {
            color: var(--text-muted);
            font-size: .9rem;
            margin-bottom: 2rem;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
        }

        /* ── EVENT CARD ─────────────────────────────────── */
        .event-card {
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border: 1px solid var(--glass-border);
            border-radius: 1.25rem;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            transition: transform .22s, box-shadow .22s, border-color .22s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .4), inset 0 1px 0 rgba(255, 255, 255, .1);
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-dark), #a78bfa, var(--accent));
            opacity: 0;
            transition: opacity .22s;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(99, 102, 241, .25), inset 0 1px 0 rgba(255, 255, 255, .15);
            border-color: rgba(129, 140, 248, .35);
        }

        .event-card:hover::before {
            opacity: 1;
        }

        .event-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: .75rem;
        }

        .event-title {
            font-size: .98rem;
            font-weight: 700;
            line-height: 1.4;
            flex: 1;
            color: var(--text);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            padding: .22rem .6rem;
            border-radius: 100px;
            font-size: .7rem;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .badge-available {
            background: rgba(52, 211, 153, .1);
            border: 1px solid rgba(52, 211, 153, .28);
            color: #6ee7b7;
        }

        .badge-warning {
            background: rgba(251, 191, 36, .1);
            border: 1px solid rgba(251, 191, 36, .28);
            color: #fde68a;
        }

        .badge-full {
            background: rgba(248, 113, 113, .1);
            border: 1px solid rgba(248, 113, 113, .28);
            color: #fca5a5;
        }

        .badge-registered {
            background: rgba(129, 140, 248, .1);
            border: 1px solid rgba(129, 140, 248, .28);
            color: #c7d2fe;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: .4rem;
        }

        .event-meta-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .84rem;
            color: var(--text-muted);
        }

        .event-meta-icon {
            width: 16px;
            height: 16px;
            opacity: .65;
            flex-shrink: 0;
        }

        .seat-info {
            display: flex;
            flex-direction: column;
            gap: .4rem;
        }

        .seat-bar-bg {
            height: 6px;
            border-radius: 100px;
            background: rgba(255, 255, 255, .06);
            overflow: hidden;
        }

        .seat-bar-fill {
            height: 100%;
            border-radius: 100px;
            transition: width .4s;
        }

        .seat-bar-fill.green {
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .seat-bar-fill.amber {
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .seat-bar-fill.red {
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        .seat-text {
            display: flex;
            justify-content: space-between;
            font-size: .77rem;
            color: var(--text-dim);
        }

        .seat-text strong {
            color: var(--text-muted);
        }

        .speaker-block {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding-top: .5rem;
            border-top: 1px solid rgba(255, 255, 255, .06);
        }

        .speaker-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .68rem;
            font-weight: 700;
            color: white;
        }

        .speaker-name {
            font-size: .82rem;
            font-weight: 600;
        }

        .speaker-role {
            font-size: .7rem;
            color: var(--text-dim);
        }

        .av-1 {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }

        .av-2 {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .av-3 {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .av-4 {
            background: linear-gradient(135deg, #ec4899, #db2777);
        }

        .av-5 {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
        }

        .av-6 {
            background: linear-gradient(135deg, #f97316, #ea580c);
        }

        .btn-register {
            width: 100%;
            padding: .68rem 1.25rem;
            border-radius: .75rem;
            font-size: .87rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            transition: all .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
        }

        .btn-register-primary {
            background: linear-gradient(135deg, var(--primary-dark), #7c3aed);
            color: white;
            box-shadow: 0 4px 18px rgba(99, 102, 241, .35);
        }

        .btn-register-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 26px rgba(99, 102, 241, .5);
        }

        .btn-register-done {
            background: rgba(52, 211, 153, .08);
            border: 1px solid rgba(52, 211, 153, .25);
            color: #6ee7b7;
            cursor: default;
        }

        .btn-register-full {
            background: rgba(248, 113, 113, .07);
            border: 1px solid rgba(248, 113, 113, .2);
            color: #fca5a5;
            cursor: not-allowed;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .footer {
            border-top: 1px solid var(--glass-border);
            padding: 2rem;
            text-align: center;
            color: var(--text-dim);
            font-size: .78rem;
            backdrop-filter: blur(8px);
        }

        @media (max-width: 640px) {
            .hero {
                padding: 3.5rem 1.5rem 3rem;
            }

            .events-section {
                padding: 0 1.25rem 4rem;
            }

            .nav {
                padding: 0 1.25rem;
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            .hero-meta {
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="aurora">
        <div class="aurora-orb orb1"></div>
        <div class="aurora-orb orb2"></div>
        <div class="aurora-orb orb3"></div>
        <div class="aurora-orb orb4"></div>
    </div>
    <div class="page-content">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>