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
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --accent: #f59e0b;
            --success: #10b981;
            --bg: #0f0f1a;
            --bg-card: #1a1a2e;
            --border: rgba(99, 102, 241, 0.2);
            --text: #e2e8f0;
            --text-muted: #94a3b8;
            --text-dim: #64748b;
        }

        html,
        body {
            min-height: 100vh;
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            line-height: 1.6;
        }

        body {
            background-image:
                radial-gradient(ellipse at 20% 0%, rgba(99, 102, 241, 0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 10%, rgba(245, 158, 11, 0.1) 0%, transparent 50%);
        }

        .nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(15, 15, 26, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--primary-light);
        }

        .nav-brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .btn-nav {
            padding: 0.4rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
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
            background: var(--primary);
            color: white;
        }

        .btn-nav-primary:hover {
            background: var(--primary-dark);
        }

        .btn-nav-outline {
            border: 1px solid var(--border);
            color: var(--text-muted);
            background: transparent;
            font-size: 0.8rem;
        }

        .btn-nav-outline:hover {
            border-color: var(--primary);
            color: var(--primary-light);
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-user-name {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            color: white;
        }

        .hero {
            text-align: center;
            padding: 5rem 2rem 4rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: var(--accent);
            padding: 0.35rem 0.9rem;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            letter-spacing: 0.05em;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #e2e8f0 0%, var(--primary-light) 50%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            max-width: 560px;
            margin: 0 auto 2rem;
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
            gap: 0.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .hero-meta-icon {
            width: 32px;
            height: 32px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flash-container {
            max-width: 900px;
            margin: 0 auto 1.5rem;
            padding: 0 2rem;
        }

        .flash {
            padding: 0.85rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .flash-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        .flash-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        .events-section {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .section-sub {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
        }

        .event-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            position: relative;
            overflow: hidden;
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            opacity: 0;
            transition: opacity 0.2s;
        }

        .event-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.2);
            border-color: rgba(99, 102, 241, 0.4);
        }

        .event-card:hover::before {
            opacity: 1;
        }

        .event-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .event-title {
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.4;
            flex: 1;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.25rem 0.6rem;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .badge-available {
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.12);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fcd34d;
        }

        .badge-full {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        .badge-registered {
            background: rgba(99, 102, 241, 0.12);
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: var(--primary-light);
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
        }

        .event-meta-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .event-meta-icon {
            width: 16px;
            height: 16px;
            opacity: 0.7;
            flex-shrink: 0;
        }

        .seat-info {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .seat-bar-bg {
            height: 6px;
            border-radius: 100px;
            background: rgba(255, 255, 255, 0.06);
            overflow: hidden;
        }

        .seat-bar-fill {
            height: 100%;
            border-radius: 100px;
            transition: width 0.4s ease;
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
            font-size: 0.78rem;
            color: var(--text-dim);
        }

        .seat-text strong {
            color: var(--text-muted);
        }

        .speaker-block {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .speaker-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            color: white;
        }

        .speaker-name {
            font-size: 0.82rem;
            font-weight: 600;
        }

        .speaker-role {
            font-size: 0.72rem;
            color: var(--text-dim);
        }

        .btn-register {
            width: 100%;
            padding: 0.7rem 1.25rem;
            border-radius: 0.65rem;
            font-size: 0.88rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .btn-register-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-register-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-register-done {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
            cursor: default;
        }

        .btn-register-full {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            cursor: not-allowed;
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
            border-top: 1px solid var(--border);
            padding: 2rem;
            text-align: center;
            color: var(--text-dim);
            font-size: 0.8rem;
        }

        @media (max-width: 640px) {
            .hero {
                padding: 3rem 1.5rem;
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
    {{ $slot }}
    @livewireScripts
</body>

</html>