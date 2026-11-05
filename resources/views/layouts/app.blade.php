<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UMVISAL-SV34')</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --primary-soft: rgba(79, 70, 229, 0.14);
            --accent: #f59e0b;
            --sidebar: #07111d;
            --sidebar-alt: #101b2d;
            --sidebar-glow: rgba(99, 102, 241, 0.36);
            --success: #10b981;
            --danger: #ef4444;
            --dark: #e2e8f0;
            --muted: #a3b4c9;
            --surface: rgba(15, 23, 42, 0.88);
            --surface-soft: #101827;
            --border: rgba(148, 163, 184, 0.18);
            --shadow: 0 22px 48px rgba(2, 6, 23, 0.42), 0 8px 20px rgba(79, 70, 229, 0.14);
            --shadow-deep: 0 26px 56px rgba(2, 6, 23, 0.52);
            --bg-main: #020b16;
            --bg-soft: #0d1726;
            --text-main: #edf6ff;
            --text-muted: #b6c5d7;
            --topbar-bg: rgba(10, 17, 29, 0.8);
            --panel-border: rgba(148, 163, 184, 0.18);
            --input-bg: rgba(15, 23, 42, 0.8);
            --table-alt: rgba(15, 23, 42, 0.7);
        }

        body.theme-light {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --primary-soft: rgba(79, 70, 229, 0.12);
            --accent: #f59e0b;
            --sidebar: #0f172a;
            --sidebar-alt: #1e293b;
            --sidebar-glow: rgba(99, 102, 241, 0.28);
            --success: #10b981;
            --danger: #ef4444;
            --dark: #0f172a;
            --muted: #53657d;
            --surface: rgba(255, 255, 255, 0.94);
            --surface-soft: #f5f7ff;
            --border: rgba(99, 102, 241, 0.16);
            --shadow: 0 18px 32px rgba(15, 23, 42, 0.12), 0 8px 18px rgba(79, 70, 229, 0.08);
            --shadow-deep: 0 18px 42px rgba(30, 41, 59, 0.18);
            --bg-main: #eef4ff;
            --bg-soft: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #43536d;
            --topbar-bg: rgba(255,255,255,0.82);
            --panel-border: rgba(99, 102, 241, 0.14);
            --input-bg: #ffffff;
            --table-alt: #f8fafc;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
            background:
                radial-gradient(circle at top left, rgba(79, 70, 229, 0.18), transparent 24%),
                radial-gradient(circle at bottom right, rgba(245, 158, 11, 0.10), transparent 28%),
                linear-gradient(180deg, var(--bg-main) 0%, var(--bg-soft) 100%);
            color: var(--text-main);
        }

        a { text-decoration: none; }

        .background-3d {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
            perspective: 900px;
            transform-style: preserve-3d;
            opacity: 0.86;
            background:
                radial-gradient(circle at 78% 28%, rgba(37, 99, 235, 0.16), transparent 18%),
                radial-gradient(circle at 16% 82%, rgba(14, 116, 144, 0.12), transparent 22%),
                #020817;
        }

        .background-3d::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0.7;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.85) 0 1px, transparent 1.5px),
                radial-gradient(circle, rgba(125,211,252,0.65) 0 1px, transparent 1.5px);
            background-size: 137px 151px, 211px 193px;
            background-position: 22px 31px, 91px 74px;
            transform: translateZ(-80px) scale(1.2);
            animation: star-drift 28s linear infinite;
            will-change: transform, background-position;
        }

        .background-3d::after {
            content: "";
            position: absolute;
            inset: -12%;
            opacity: 0.34;
            background:
                radial-gradient(ellipse at 30% 40%, rgba(56, 189, 248, 0.18), transparent 30%),
                radial-gradient(ellipse at 72% 64%, rgba(99, 102, 241, 0.16), transparent 28%);
            transform: translateZ(-160px) scale(1.08);
            animation: sky-drift 34s ease-in-out infinite alternate;
            will-change: transform;
        }

        .earth-orbit {
            position: absolute;
            top: 50%;
            right: 4%;
            width: 390px;
            height: 390px;
            border: 1px solid rgba(125, 211, 252, 0.22);
            border-radius: 50%;
            transform: rotateX(68deg) rotateZ(-18deg);
            transform-style: preserve-3d;
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.12);
            animation: orbit-drift 18s linear infinite;
        }

        .earth-orbit::after {
            content: "";
            position: absolute;
            inset: 24px -18px;
            border: 1px solid rgba(96, 165, 250, 0.13);
            border-radius: 50%;
        }

        .earth {
            position: absolute;
            top: 53%;
            right: 8%;
            width: 260px;
            aspect-ratio: 1;
            border-radius: 50%;
            transform-style: preserve-3d;
            background:
                radial-gradient(ellipse at 30% 28%, rgba(187, 247, 208, 0.98) 0 10%, transparent 11%),
                radial-gradient(ellipse at 66% 36%, rgba(134, 239, 172, 0.94) 0 15%, transparent 16%),
                radial-gradient(ellipse at 48% 68%, rgba(74, 222, 128, 0.9) 0 13%, transparent 14%),
                radial-gradient(ellipse at 78% 73%, rgba(187, 247, 208, 0.88) 0 9%, transparent 10%),
                linear-gradient(145deg, #38bdf8 0%, #0e7490 46%, #082f49 100%);
            box-shadow:
                -22px 16px 46px rgba(2, 6, 23, 0.8) inset,
                12px -10px 32px rgba(125, 211, 252, 0.4) inset,
                0 0 0 8px rgba(56, 189, 248, 0.06),
                0 0 42px rgba(14, 165, 233, 0.32);
            transform: translateZ(-20px);
            animation: earth-float 9s ease-in-out infinite;
        }

        .earth::before {
            content: "";
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 1px solid rgba(186, 230, 253, 0.5);
            box-shadow: 0 0 18px rgba(125, 211, 252, 0.3);
        }

        .earth::after {
            content: "";
            position: absolute;
            inset: 10% 18% 72% 8%;
            border-radius: 50%;
            background: rgba(224, 242, 254, 0.42);
            filter: blur(5px);
            transform: rotate(-24deg);
        }

        .depth-grid {
            position: absolute;
            left: -15%;
            bottom: -26%;
            width: 130%;
            height: 82%;
            transform: rotateX(68deg) translateZ(-120px);
            transform-origin: center bottom;
            background-image:
                linear-gradient(rgba(96, 165, 250, 0.14) 1px, transparent 1px),
                linear-gradient(90deg, rgba(96, 165, 250, 0.14) 1px, transparent 1px);
            background-size: 72px 72px;
            mask-image: linear-gradient(to top, rgba(0,0,0,0.9), transparent 88%);
            animation: grid-drift 18s linear infinite;
        }

        .wire-cube {
            position: absolute;
            width: 110px;
            height: 110px;
            border: 1px solid rgba(96, 165, 250, 0.42);
            box-shadow: 0 0 26px rgba(37, 99, 235, 0.18), inset 0 0 26px rgba(37, 99, 235, 0.08);
            transform-style: preserve-3d;
            animation: cube-float 14s ease-in-out infinite;
        }

        .wire-cube::before,
        .wire-cube::after {
            content: "";
            position: absolute;
            inset: 18px;
            border: inherit;
            transform: translateZ(34px);
        }

        .wire-cube::after {
            inset: 0;
            transform: rotateY(90deg) translateZ(55px);
        }

        .cube-one {
            top: 16%;
            right: 12%;
            transform: rotateX(58deg) rotateY(-34deg) rotateZ(18deg);
        }

        .cube-two {
            bottom: 18%;
            left: 29%;
            width: 72px;
            height: 72px;
            border-color: rgba(245, 158, 11, 0.38);
            animation-delay: -5s;
            transform: rotateX(62deg) rotateY(38deg) rotateZ(-16deg) scale(0.8);
        }

        .cube-three {
            top: 38%;
            left: 42%;
            width: 44px;
            height: 44px;
            border-color: rgba(16, 185, 129, 0.34);
            animation-delay: -9s;
            transform: rotateX(50deg) rotateY(42deg) rotateZ(12deg) scale(0.7);
        }

        @keyframes grid-drift {
            from { background-position: 0 0; }
            to { background-position: 0 144px; }
        }

        @keyframes star-drift {
            from {
                background-position: 22px 31px, 91px 74px;
                transform: translate3d(0, 0, -80px) scale(1.2);
            }
            to {
                background-position: -115px 175px, 260px -119px;
                transform: translate3d(-34px, 24px, -80px) scale(1.32);
            }
        }

        @keyframes sky-drift {
            from { transform: translate3d(-2%, 1%, -160px) scale(1.08) rotate(0deg); }
            to { transform: translate3d(3%, -2%, -160px) scale(1.16) rotate(3deg); }
        }

        @keyframes cube-float {
            0%, 100% { translate: 0 0; }
            50% { translate: 0 -22px; }
        }

        @keyframes earth-float {
            0%, 100% { translate: 0 0; }
            50% { translate: 0 -10px; }
        }

        @keyframes orbit-drift {
            from { rotate: 0deg; }
            to { rotate: 360deg; }
        }

        @media (prefers-reduced-motion: reduce) {
            .depth-grid,
            .wire-cube,
            .earth,
            .earth-orbit,
            .background-3d::before,
            .background-3d::after {
                animation: none;
            }
        }

        .app-shell {
            display: grid;
            grid-template-columns: 240px minmax(0, 1fr);
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--sidebar) 0%, var(--sidebar-alt) 100%);
            color: #fff;
            padding: 26px 18px;
            border-right: 1px solid rgba(255,255,255,0.08);
            box-shadow: inset -8px 0 18px rgba(15, 23, 42, 0.45), 12px 0 28px rgba(15, 23, 42, 0.14);
        }

        body.theme-light .sidebar {
            box-shadow: inset -8px 0 18px rgba(15, 23, 42, 0.18), 12px 0 28px rgba(15, 23, 42, 0.08);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
            padding: 8px 10px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 20px;
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            overflow: hidden;
            background: linear-gradient(135deg, #60a5fa, #2563eb);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.35);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .nav-list {
            display: grid;
            gap: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: rgba(255,255,255,0.8);
            font-weight: 600;
            transition: all 0.2s ease;
            background: rgba(148, 163, 184, 0.03);
            border: 1px solid rgba(148, 163, 184, 0.08);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.05);
        }

        .nav-item:hover {
            background: linear-gradient(180deg, rgba(96, 165, 250, 0.16), rgba(30, 64, 175, 0.15));
            color: #fff;
            transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.08), 0 8px 18px rgba(37, 99, 235, 0.16);
        }

        .icon {
            width: 20px;
            text-align: center;
            opacity: 0.9;
        }

        .main {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .topbar {
            background: var(--topbar-bg);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 20px 28px;
        }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .page-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .page-shell {
            padding: 30px 28px 42px;
        }

        .panel {
            background: linear-gradient(180deg, var(--surface), rgba(15, 23, 42, 0.88));
            border: 1px solid var(--panel-border);
            border-radius: 22px;
            box-shadow: var(--shadow-deep);
            padding: 28px;
            transform: perspective(1200px) rotateX(0deg);
        }

        body.theme-light .panel {
            background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(244,248,255,0.96));
        }

        .hero {
            position: relative;
            overflow: hidden;
            text-align: center;
            padding: 54px 30px 48px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.12), rgba(15, 118, 110, 0.08), rgba(255, 255, 255, 0.95));
            border: 1px solid rgba(148, 163, 184, 0.20);
            border-radius: 24px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.8), 0 18px 30px rgba(15, 23, 42, 0.08);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: -20% auto auto -10%;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.22), transparent 68%);
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: auto -12% -25% auto;
            width: 240px;
            height: 240px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.14), transparent 68%);
            pointer-events: none;
        }

        .eyebrow {
            position: relative;
            display: inline-block;
            margin-bottom: 18px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.18), rgba(96, 165, 250, 0.22));
            color: var(--primary-dark);
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            box-shadow: inset 0 0 0 1px rgba(79, 70, 229, 0.08);
        }

        h1, h2, h3 {
            position: relative;
            margin: 0 0 14px;
            color: var(--text-main);
            line-height: 1.15;
        }

        h1 {
            position: relative;
            font-size: clamp(2.1rem, 3vw, 3.4rem);
            color: var(--text-main);
            letter-spacing: -0.04em;
        }

        h2 {
            font-size: clamp(1.5rem, 2vw, 2.2rem);
            color: var(--text-main);
        }

        p {
            position: relative;
            color: var(--text-muted);
            line-height: 1.7;
            margin: 0 0 14px;
        }

        .subtitle {
            position: relative;
            font-size: 1.08rem;
            margin-top: 12px;
            color: var(--text-muted);
        }

        .action-row {
            position: relative;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 24px;
        }

        .btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 800;
            border: none;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease, filter 0.15s ease;
            color: #fff;
            background: linear-gradient(180deg, #4f46e5, #4338ca);
            box-shadow: 0 10px 18px rgba(79, 70, 229, 0.22), inset 0 1px 0 rgba(255,255,255,0.22);
            border-bottom: 3px solid rgba(49, 46, 129, 0.85);
        }

        .btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.04);
            box-shadow: 0 14px 22px rgba(79, 70, 229, 0.24);
        }
        .btn-primary { background: linear-gradient(180deg, #4f46e5, #4338ca); }
        .btn-success { background: linear-gradient(180deg, #10b981, #059669); }
        .btn-danger { background: linear-gradient(180deg, #ef4444, #dc2626); }
        .btn-secondary { background: linear-gradient(180deg, #475569, #334155); }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid var(--border);
            padding: 14px 12px;
            text-align: left;
            vertical-align: middle;
            color: var(--text-main);
        }

        th {
            background: linear-gradient(180deg, #1e3a8a, #2563eb);
            color: #fff;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.18);
        }

        tbody tr:nth-child(even) {
            background: var(--table-alt);
        }

        tbody tr {
            transition: transform 0.15s ease;
        }

        tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: inset 0 0 0 1px rgba(96, 165, 250, 0.1);
        }

        form {
            display: grid;
            gap: 16px;
            margin-top: 18px;
        }

        .form-group {
            display: grid;
            gap: 8px;
        }

        label {
            font-weight: 700;
            color: var(--dark);
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--input-bg);
            font-size: 1rem;
            color: var(--text-main);
            box-shadow: inset 0 2px 3px rgba(15, 23, 42, 0.05);
        }

        input:focus, select:focus, textarea:focus {
            outline: 3px solid rgba(37, 99, 235, 0.12);
            border-color: var(--primary);
            box-shadow: inset 0 2px 3px rgba(15, 23, 42, 0.04), 0 0 0 3px rgba(37, 99, 235, 0.08);
        }

        .theme-toggle {
            border: 1px solid var(--border);
            background: rgba(59, 130, 246, 0.12);
            color: var(--text-main);
            border-radius: 999px;
            padding: 8px 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .theme-toggle:hover {
            background: rgba(59, 130, 246, 0.20);
            transform: translateY(-1px);
        }

        .status-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: #ecfdf5;
            color: #166534;
            font-weight: 700;
            font-size: 0.8rem;
        }

        @media (max-width: 900px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            .sidebar {
                padding: 18px 14px;
            }

            .nav-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .nav-list {
                grid-template-columns: 1fr;
            }

            .page-shell {
                padding: 18px 16px 30px;
            }

            .panel {
                padding: 18px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="background-3d" aria-hidden="true">
        <div class="earth-orbit"></div>
        <div class="earth"></div>
    </div>

    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-mark">
                    <img src="{{ asset('images/1.png') }}" alt="Profile logo" />
                </div>
                <span>UMVISAL</span>
            </div>

            <nav class="nav-list" aria-label="Main navigation">
                <a class="nav-item" href="/"><span class="icon">🏠</span> Home</a>
                <a class="nav-item" href="/product/listproduct"><span class="icon">📦</span> Products</a>
                <a class="nav-item" href="/category/show"><span class="icon">🗂️</span> Categories</a>
                <a class="nav-item" href="/student/info/allstudent"><span class="icon">🎓</span> Students</a>
                <a class="nav-item" href="/employee/home"><span class="icon">👥</span> Employees</a>
                <a class="nav-item" href="/teacher"><span class="icon">👨‍🏫</span> Teachers</a>
            </nav>
        </aside>

        <div class="main">
            <header class="topbar">
                <div class="topbar-inner">
                    <div class="page-title">Project Dashboard</div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="page-badge">SV34</div>
                        <button class="theme-toggle" type="button" id="themeToggle">🌙 Dark</button>
                    </div>
                </div>
            </header>

            <main class="page-shell">
                <div class="panel">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        (function () {
            const savedTheme = localStorage.getItem('umvisal-theme') || 'dark';
            document.body.classList.add(savedTheme === 'light' ? 'theme-light' : 'theme-dark');

            const toggle = document.getElementById('themeToggle');
            const updateLabel = () => {
                const isLight = document.body.classList.contains('theme-light');
                toggle.textContent = isLight ? '☀️ Light' : '🌙 Dark';
            };

            updateLabel();

            toggle.addEventListener('click', function () {
                const isLight = document.body.classList.toggle('theme-light');
                document.body.classList.toggle('theme-dark', !isLight);
                localStorage.setItem('umvisal-theme', isLight ? 'light' : 'dark');
                updateLabel();
            });
        })();
    </script>
</body>
</html>
