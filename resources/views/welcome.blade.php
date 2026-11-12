<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>J &amp; K Designs Academy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Font Awesome (icons + social + brands) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite assets (if built) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* ── RESET & BASE ───────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Figtree', sans-serif;
            background: #081538;
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* ── PALETTE: MATCHES STUDENT LOGIN PAGE THEME ──
           Deep Midnight Blue (#081538), Gradient Blue (#0d225c),
           Panel Blue (#0f286b), Electric Cyan (#22d3ee / #67e8f9),
           and Sky Blue (#38bdf8) with Zero White Card Backgrounds.
        ──────────────────────────────────────────────────────── */
        :root {
            --cyan:       #22d3ee;   /* cyan-400 — primary electric accent */
            --cyan-lt:    #67e8f9;   /* cyan-300 — highlight accent */
            --gold:       #22d3ee;   /* alias for cyan-400 */
            --gold-lt:    #67e8f9;   /* alias for cyan-300 */
            --navy:       #081538;   /* deep midnight dark blue */
            --navy-lt:    #0d225c;   /* mid dark blue */
            --navy-md:    #0f286b;   /* panel blue */
            --navy-dark:  #080e1a;   /* footer / darkest blue */
            --accent:     #38bdf8;   /* sky-400 — secondary accent */
            --white:      #f8fafc;   /* crisp white text */
            --sky-text:   #bae6fd;   /* sky-200 text */
            --sky-border: rgba(56, 189, 248, 0.45);
        }

        /* ── BINARY RAIN CANVAS (Cyan & Sky Blue Rain) ──────── */
        #binary-rain {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
            pointer-events: none;
            opacity: 0.16;
        }

        /* ── NAVBAR ─────────────────────────────────────────── */
        #navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            background: rgba(8, 21, 56, 0.96); backdrop-filter: blur(16px);
            border-bottom: 2px solid rgba(56, 189, 248, 0.35);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .nav-inner {
            max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 1.5rem; height: 72px;
        }
        .nav-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
        .nav-logo-badge {
            width: 44px; height: 44px; border-radius: 14px; flex-shrink: 0;
            background: linear-gradient(135deg, #22d3ee, #0284c7);
            display: flex; align-items: center; justify-content: center;
            font-weight: 900; font-size: 1.05rem; color: #020617;
            border: 2px solid #67e8f9;
            box-shadow: 0 0 16px rgba(34, 211, 238, 0.45);
        }
        .nav-logo-title { font-weight: 900; font-size: 1.05rem; color: var(--white); display: block; line-height: 1.2; }
        .nav-logo-sub   { font-size: 0.65rem; color: var(--cyan); letter-spacing: 0.1em; text-transform: uppercase; font-weight: 800; display: block; }

        .nav-links { display: flex; align-items: center; gap: 0.25rem; list-style: none; }
        .nav-links a {
            padding: 0.45rem 0.95rem; border-radius: 10px; font-size: 0.88rem;
            font-weight: 700; color: var(--sky-text); text-decoration: none; transition: all 0.2s;
        }
        .nav-links a:hover { color: var(--cyan); background: rgba(34, 211, 238, 0.12); }

        .nav-actions { display: flex; align-items: center; gap: 0.65rem; }
        .btn-nav-login {
            padding: 0.45rem 1.2rem; border-radius: 12px; font-size: 0.85rem;
            font-weight: 800; border: 2px solid #38bdf8;
            color: var(--cyan); text-decoration: none; transition: all 0.2s; background: rgba(8, 21, 56, 0.7);
        }
        .btn-nav-login:hover { background: rgba(34, 211, 238, 0.18); border-color: var(--cyan); color: #fff; transform: translateY(-1px); }
        .btn-nav-register {
            padding: 0.45rem 1.25rem; border-radius: 12px; font-size: 0.85rem;
            font-weight: 900; background: linear-gradient(135deg, #22d3ee, #38bdf8); color: #020617;
            text-decoration: none; transition: all 0.2s; border: 2px solid #67e8f9;
            box-shadow: 0 4px 15px rgba(34, 211, 238, 0.35);
        }
        .btn-nav-register:hover { background: #67e8f9; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(34, 211, 238, 0.55); }
        .btn-nav-dashboard {
            padding: 0.45rem 1.25rem; border-radius: 12px; font-size: 0.85rem;
            font-weight: 800; background: linear-gradient(135deg, #0284c7, #0f286b); color: #fff;
            border: 2px solid #38bdf8; text-decoration: none; transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.3);
        }
        .btn-nav-dashboard:hover { background: #0284c7; border-color: var(--cyan); }

        /* Hamburger */
        .hamburger {
            display: none; flex-direction: column; gap: 5px;
            cursor: pointer; padding: 6px; background: none; border: none;
        }
        .hamburger span { display: block; width: 24px; height: 2.5px; background: var(--cyan); border-radius: 2px; }

        /* Mobile drawer */
        #mobile-menu {
            display: none; position: absolute; top: 72px; left: 0; right: 0;
            background: rgba(8, 21, 56, 0.98); border-bottom: 2px solid rgba(56, 189, 248, 0.35);
            padding: 1.2rem 1.5rem 1.8rem; flex-direction: column; gap: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        #mobile-menu.open { display: flex; }
        #mobile-menu a {
            padding: 0.75rem 1rem; border-radius: 10px; color: var(--sky-text);
            text-decoration: none; font-weight: 700; font-size: 0.95rem; transition: all 0.2s;
        }
        #mobile-menu a:hover { color: var(--cyan); background: rgba(34, 211, 238, 0.12); }
        .mobile-auth { display: flex; gap: 0.65rem; margin-top: 0.75rem; flex-wrap: wrap; }
        .mobile-auth a { flex: 1; text-align: center; min-width: 100px; }

        @media (max-width: 768px) {
            .nav-links, .nav-actions { display: none; }
            .hamburger { display: flex; }
        }

        /* ── HERO ────────────────────────────────────────────── */
        #hero {
            min-height: 100vh; padding-top: 72px;
            background: linear-gradient(135deg, #081538 0%, #0d225c 50%, #081538 100%);
            position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center;
        }
        .hero-dots {
            position: absolute; inset: 0; opacity: 0.08;
            background-image: radial-gradient(circle at 1px 1px, #22d3ee 1px, transparent 0);
            background-size: 44px 44px;
        }
        .hero-glow {
            position: absolute; width: 750px; height: 750px; border-radius: 50%;
            background: radial-gradient(circle, rgba(34, 211, 238, 0.16) 0%, transparent 70%);
            top: 50%; left: 50%; transform: translate(-50%, -50%); pointer-events: none;
        }
        .hero-content {
            position: relative; z-index: 1;
            text-align: center; max-width: 960px; padding: 2.5rem 1.5rem;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: #081538; border: 2px solid rgba(56, 189, 248, 0.55);
            border-radius: 999px; padding: 0.45rem 1.4rem; margin-bottom: 1.6rem;
            font-size: 0.8rem; font-weight: 800; color: var(--cyan);
            letter-spacing: 0.08em; text-transform: uppercase;
            box-shadow: 0 4px 20px rgba(34, 211, 238, 0.2);
        }
        .hero-title {
            font-size: clamp(2.3rem, 7vw, 4.8rem);
            font-weight: 900; line-height: 1.1; color: var(--white); margin-bottom: 1.2rem;
            letter-spacing: -0.02em;
        }
        .hero-title span {
            color: var(--cyan-lt);
            text-shadow: 0 0 30px rgba(34, 211, 238, 0.5);
        }
        .hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.25rem); color: var(--sky-text);
            max-width: 660px; margin: 0 auto 2.5rem; font-weight: 600;
        }
        .hero-cta { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.6rem;
            padding: 0.95rem 2.2rem; border-radius: 14px; font-size: 1.05rem;
            font-weight: 900; background: linear-gradient(135deg, #22d3ee 0%, #38bdf8 50%, #3b82f6 100%);
            color: #020617; text-decoration: none; border: 2px solid #67e8f9;
            box-shadow: 0 8px 30px rgba(34, 211, 238, 0.45); transition: all 0.25s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #67e8f9 0%, #38bdf8 50%, #60a5fa 100%);
            transform: translateY(-2px); box-shadow: 0 12px 35px rgba(34, 211, 238, 0.65);
        }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 0.6rem;
            padding: 0.95rem 2.2rem; border-radius: 14px; font-size: 1.05rem;
            font-weight: 800; border: 2px solid #38bdf8; color: var(--cyan);
            text-decoration: none; background: rgba(8, 21, 56, 0.7); transition: all 0.25s;
        }
        .btn-outline:hover {
            border-color: var(--cyan); background: rgba(34, 211, 238, 0.15);
            color: #fff; transform: translateY(-2px);
        }
        .hero-stats {
            display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;
            margin-top: 4rem; padding-top: 2rem; border-top: 2px solid rgba(56, 189, 248, 0.25);
        }
        .hero-stat {
            background: #081538;
            border: 2px solid rgba(56, 189, 248, 0.45);
            border-radius: 18px;
            padding: 1.25rem 2rem;
            text-align: center;
            box-shadow: 0 6px 25px rgba(56, 189, 248, 0.18);
            transition: all 0.3s;
        }
        .hero-stat:hover {
            border-color: var(--cyan);
            background: #0d225c;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(34, 211, 238, 0.3);
        }
        .hero-stat-code {
            font-family: ui-monospace, monospace;
            font-size: 0.7rem;
            font-weight: 800;
            color: #38bdf8;
            letter-spacing: 0.14em;
            margin-bottom: 0.2rem;
        }
        .hero-stat-num {
            font-size: 2.3rem; font-weight: 900; color: var(--cyan);
            line-height: 1.1; text-shadow: 0 0 20px rgba(34, 211, 238, 0.4);
        }
        .hero-stat-lbl {
            font-size: 0.78rem; font-weight: 800; color: #f1f5f9;
            letter-spacing: 0.06em; text-transform: uppercase; margin-top: 0.35rem;
        }

        /* ── SECTION SHARED ─────────────────────────────────── */
        section { padding: 5.5rem 1.5rem; position: relative; z-index: 1; }
        .section-inner { max-width: 1200px; margin: 0 auto; }
        .section-label {
            display: inline-block; font-size: 0.75rem; font-weight: 900;
            letter-spacing: 0.12em; text-transform: uppercase; color: var(--cyan); margin-bottom: 0.6rem;
        }
        .section-title {
            font-size: clamp(1.6rem, 4vw, 2.5rem);
            font-weight: 900; color: var(--white); line-height: 1.2; margin-bottom: 0.8rem;
        }
        .section-title span { color: var(--cyan-lt); text-shadow: 0 0 20px rgba(34, 211, 238, 0.3); }
        .section-desc { color: var(--sky-text); max-width: 620px; font-size: 1rem; font-weight: 500; }
        .section-header { margin-bottom: 3.2rem; }
        .section-header.center { text-align: center; }
        .section-header.center .section-desc { margin: 0 auto; }

        /* ── ABOUT ───────────────────────────────────────────── */
        #about { background: #0d225c; }
        .about-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;
        }
        .about-visual {
            background: #081538;
            border: 2px solid rgba(56, 189, 248, 0.4);
            border-radius: 22px; padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .about-icon-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
        .about-icon-card {
            background: #0d225c; border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 14px; padding: 1.25rem 0.6rem; text-align: center;
            transition: all 0.25s;
        }
        .about-icon-card:hover { border-color: var(--cyan); transform: translateY(-2px); }
        .about-icon-card i { font-size: 1.7rem; color: var(--cyan); margin-bottom: 0.45rem; display: block; }
        .about-icon-card span { font-size: 0.72rem; color: #bae6fd; font-weight: 700; }
        .about-text p { color: var(--sky-text); margin-bottom: 1.1rem; font-size: 0.98rem; }
        .value-list { list-style: none; }
        .value-list li {
            display: flex; align-items: center; gap: 0.85rem; padding: 0.55rem 0;
            border-bottom: 1px solid rgba(56, 189, 248, 0.15); color: #e0f2fe; font-size: 0.92rem; font-weight: 600;
        }
        .value-list li i { color: var(--cyan); width: 18px; flex-shrink: 0; }
        @media (max-width: 768px) { .about-grid { grid-template-columns: 1fr; gap: 2rem; } }

        /* ── ACADEMICS ──────────────────────────────────────── */
        #academics { background: #081538; }
        .subjects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.4rem; }
        .subject-card {
            background: #0d225c; border: 2px solid rgba(56, 189, 248, 0.35);
            border-radius: 18px; padding: 1.8rem 1.4rem; text-align: center; transition: all 0.3s;
        }
        .subject-card:hover {
            border-color: var(--cyan); transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(34, 211, 238, 0.22);
        }
        .subject-icon {
            width: 56px; height: 56px; border-radius: 16px;
            margin: 0 auto 1.1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;
            background: rgba(34, 211, 238, 0.15); color: var(--cyan); border: 1px solid rgba(56, 189, 248, 0.3);
        }
        .subject-name { font-weight: 800; color: var(--white); font-size: 1rem; margin-bottom: 0.3rem; }
        .subject-desc { font-size: 0.78rem; color: #94a3b8; font-weight: 500; }

        /* ── GALLERY ────────────────────────────────────────── */
        #gallery { background: #0d225c; }
        .gallery-tabs { display: flex; gap: 0.6rem; margin-bottom: 2.2rem; flex-wrap: wrap; }
        .gallery-tab {
            padding: 0.5rem 1.3rem; border-radius: 999px; font-size: 0.85rem; font-weight: 800;
            cursor: pointer; border: 2px solid rgba(56, 189, 248, 0.35); color: #bae6fd;
            background: #081538; transition: all 0.2s;
        }
        .gallery-tab.active, .gallery-tab:hover {
            background: var(--cyan); color: #020617; border-color: #67e8f9;
            box-shadow: 0 4px 15px rgba(34, 211, 238, 0.4);
        }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.2rem; }
        .gallery-item {
            border-radius: 16px; overflow: hidden; position: relative;
            background: #0f286b; aspect-ratio: 4/3;
            border: 2px solid rgba(56, 189, 248, 0.35); transition: all 0.3s;
        }
        .gallery-item:hover { border-color: var(--cyan); transform: scale(1.02); box-shadow: 0 10px 30px rgba(34, 211, 238, 0.25); }
        .gallery-item-inner {
            width: 100%; height: 100%; display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 0.6rem;
            background: linear-gradient(135deg, #0d225c, #0f286b); padding: 1rem; text-align: center;
        }
        .gallery-item-inner i { font-size: 2.5rem; color: var(--cyan); }
        .gallery-item-inner span { font-size: 0.78rem; color: #bae6fd; font-weight: 600; }
        .gallery-item-label {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: linear-gradient(to top, rgba(8, 21, 56, 0.98), transparent);
            padding: 1.2rem 0.85rem 0.65rem; font-size: 0.82rem; font-weight: 800; color: var(--white);
        }

        /* ── SOCIAL ─────────────────────────────────────────── */
        #social { background: #081538; }
        .social-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.3rem; }
        .social-card {
            border-radius: 18px; padding: 2.2rem 1.25rem; text-align: center;
            background: #0d225c; border: 2px solid rgba(56, 189, 248, 0.3);
            transition: all 0.3s; text-decoration: none;
        }
        .social-card:hover {
            transform: translateY(-5px); border-color: var(--cyan);
            box-shadow: 0 15px 35px rgba(34, 211, 238, 0.25);
        }
        .social-card i { font-size: 2.3rem; margin-bottom: 0.75rem; display: block; color: var(--cyan); }
        .social-card-name { font-weight: 800; color: var(--white); font-size: 1rem; margin-bottom: 0.2rem; }
        .social-card-handle { font-size: 0.78rem; color: #bae6fd; font-weight: 600; }

        /* ── WHATSAPP FLOAT ─────────────────────────────────── */
        .whatsapp-float {
            position: fixed; bottom: 1.75rem; right: 1.75rem; z-index: 999;
            width: 60px; height: 60px; border-radius: 50%; background: #25d366; color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem; text-decoration: none;
            box-shadow: 0 6px 24px rgba(37, 211, 102, 0.5); transition: all 0.3s;
            animation: pulse-wa 2.2s infinite;
        }
        .whatsapp-float:hover { background: #20b858; transform: scale(1.1); }
        @keyframes pulse-wa {
            0%, 100% { box-shadow: 0 6px 24px rgba(37, 211, 102, 0.5); }
            50%      { box-shadow: 0 6px 40px rgba(37, 211, 102, 0.8), 0 0 0 10px rgba(37, 211, 102, 0.08); }
        }
        .wa-tooltip {
            position: absolute; right: 72px; bottom: 50%; transform: translateY(50%);
            background: #081538; color: var(--white); font-size: 0.8rem; font-weight: 700;
            padding: 0.4rem 0.95rem; border-radius: 10px; white-space: nowrap;
            border: 1px solid rgba(37, 211, 102, 0.4); pointer-events: none;
            opacity: 0; transition: opacity 0.2s;
        }
        .whatsapp-float:hover .wa-tooltip { opacity: 1; }

        /* ── CONTACT ─────────────────────────────────────────── */
        #contact { background: #0d225c; }
        .contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 4rem; align-items: start; }
        .contact-item { display: flex; gap: 1.1rem; align-items: flex-start; margin-bottom: 1.5rem; }
        .contact-icon {
            width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
            background: #081538; border: 2px solid rgba(56, 189, 248, 0.4);
            display: flex; align-items: center; justify-content: center; color: var(--cyan); font-size: 1.1rem;
        }
        .contact-item strong { display: block; color: var(--white); font-size: 0.92rem; margin-bottom: 0.2rem; font-weight: 800; }
        .contact-item span   { color: #bae6fd; font-size: 0.86rem; font-weight: 500; }

        .contact-form {
            background: #081538; border: 2px solid rgba(56, 189, 248, 0.4);
            border-radius: 22px; padding: 2.2rem; display: flex; flex-direction: column; gap: 1.1rem;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.35);
        }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        .form-group label {
            font-size: 0.78rem; font-weight: 800; color: var(--cyan);
            letter-spacing: 0.06em; text-transform: uppercase;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            background: #0d225c; border: 2px solid rgba(56, 189, 248, 0.4);
            border-radius: 12px; padding: 0.8rem 1rem; color: var(--white);
            font-size: 0.95rem; font-family: inherit; outline: none; transition: all 0.2s; width: 100%;
        }
        .form-group input::placeholder, .form-group textarea::placeholder { color: #64748b; }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 4px rgba(34, 211, 238, 0.2);
            background: #0b1f54;
        }
        .form-group select option { background: #081538; color: #fff; }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .btn-submit {
            padding: 0.95rem 2.2rem; border-radius: 12px; font-size: 1rem; font-weight: 900;
            background: linear-gradient(135deg, #22d3ee, #38bdf8); color: #020617; border: 2px solid #67e8f9;
            cursor: pointer; transition: all 0.25s; display: inline-flex; align-items: center; gap: 0.6rem;
            align-self: flex-start; box-shadow: 0 6px 20px rgba(34, 211, 238, 0.35);
        }
        .btn-submit:hover {
            background: #67e8f9; transform: translateY(-2px); box-shadow: 0 10px 30px rgba(34, 211, 238, 0.55);
        }
        #form-notice {
            display: none; padding: 0.95rem 1.2rem; border-radius: 12px;
            font-size: 0.9rem; font-weight: 700;
        }
        #form-notice.success { background: rgba(16, 185, 129, 0.15); border: 2px solid rgba(52, 211, 153, 0.5); color: #34d399; }
        #form-notice.error   { background: rgba(239, 68, 68, 0.15);  border: 2px solid rgba(248, 113, 113, 0.5);  color: #f87171; }
        @media (max-width: 768px) {
            .contact-grid { grid-template-columns: 1fr; gap: 2.5rem; }
            .form-row { grid-template-columns: 1fr; }
        }

        /* ── FOOTER ─────────────────────────────────────────── */
        footer {
            background: #080e1a;
            border-top: 2px solid rgba(56, 189, 248, 0.35);
            padding: 3.5rem 1.5rem 1.8rem;
            position: relative; z-index: 1;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 2.2rem; margin-bottom: 2.8rem; }
        .footer-brand-name { font-weight: 900; font-size: 1.15rem; color: var(--white); margin-bottom: 0.4rem; }
        .footer-brand-desc { font-size: 0.85rem; color: var(--sky-text); line-height: 1.6; margin-bottom: 1.2rem; }
        .footer-socials { display: flex; gap: 0.6rem; flex-wrap: wrap; }
        .footer-soc-btn {
            width: 38px; height: 38px; border-radius: 10px;
            background: #0d225c; border: 1px solid rgba(56, 189, 248, 0.35);
            color: var(--cyan); display: flex; align-items: center; justify-content: center;
            font-size: 0.92rem; text-decoration: none; transition: all 0.2s;
        }
        .footer-soc-btn:hover { background: var(--cyan); color: #020617; transform: translateY(-2px); }
        .footer-col h4 { font-weight: 800; color: var(--white); font-size: 0.95rem; margin-bottom: 1.1rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 0.65rem; }
        .footer-col ul li a { font-size: 0.85rem; color: #94a3b8; text-decoration: none; transition: color 0.2s; font-weight: 600; }
        .footer-col ul li a:hover { color: var(--cyan); }
        .footer-bottom {
            padding-top: 1.8rem; border-top: 1px solid rgba(56, 189, 248, 0.2);
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;
            gap: 1rem; font-size: 0.82rem; color: #64748b; font-weight: 600;
        }
        @media (max-width: 768px) { .footer-top { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 480px) { .footer-top { grid-template-columns: 1fr; } }

        /* ── SCROLL REVEAL ──────────────────────────────────── */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: none; }
    </style>
</head>
<body>

<!-- Binary Rain Canvas for High-Tech Student Portal Atmosphere -->
<canvas id="binary-rain"></canvas>

{{-- ═══════════════ NAVBAR ═══════════════ --}}
<nav id="navbar">
    <div class="nav-inner">
        <a href="#hero" class="nav-logo">
            <div class="nav-logo-badge">JK</div>
            <div>
                <span class="nav-logo-title">J &amp; K Designs Academy</span>
                <span class="nav-logo-sub">Excellence in Education</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#academics">Academics</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#social">Connect</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-actions">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-nav-dashboard">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn-nav-login">Log In</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-nav-register">Register</a>
                @endif
            @endauth
        </div>

        <button class="hamburger" id="ham-btn" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
    </div>

    <div id="mobile-menu">
        <a href="#about"><i class="fas fa-info-circle" style="color:var(--cyan);width:20px"></i> About</a>
        <a href="#academics"><i class="fas fa-book-open" style="color:var(--cyan);width:20px"></i> Academics</a>
        <a href="#gallery"><i class="fas fa-images" style="color:var(--cyan);width:20px"></i> Gallery</a>
        <a href="#social"><i class="fas fa-share-alt" style="color:var(--cyan);width:20px"></i> Connect</a>
        <a href="#contact"><i class="fas fa-envelope" style="color:var(--cyan);width:20px"></i> Contact</a>
        <div class="mobile-auth">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-nav-dashboard">Dashboard</a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn-nav-login">Log In</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-nav-register">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

{{-- ═══════════════ HERO BANNER ═══════════════ --}}
<section id="hero">
    <div class="hero-dots"></div>
    <div class="hero-glow"></div>
    <div class="hero-content">
        <div class="hero-badge reveal"><i class="fas fa-star"></i> Established with a Vision for Excellence</div>
        <h1 class="hero-title reveal">
            Welcome to<br>
            <span>J &amp; K Designs</span> Academy
        </h1>
        <p class="hero-subtitle reveal">
            Nurturing bright minds, building strong character, and shaping tomorrow's leaders
            through quality education, innovation, dynamic digital tools, and community.
        </p>
        <div class="hero-cta reveal">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-primary">
                    <i class="fas fa-user-graduate"></i> Enroll Now
                </a>
            @endif
            <a href="{{ route('login') }}" class="btn-outline">
                <i class="fas fa-sign-in-alt"></i> Access Portal
            </a>
        </div>
        <div class="hero-stats reveal">
            <div class="hero-stat">
                <div class="hero-stat-code">BIN // 0001</div>
                <div class="hero-stat-num">500+</div>
                <div class="hero-stat-lbl">Students Enrolled</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-code">BIN // 0010</div>
                <div class="hero-stat-num">40+</div>
                <div class="hero-stat-lbl">Qualified Educators</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-code">BIN // 0011</div>
                <div class="hero-stat-num">12</div>
                <div class="hero-stat-lbl">Academic Subjects</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-code">BIN // 0100</div>
                <div class="hero-stat-num">98%</div>
                <div class="hero-stat-lbl">Pass Rate</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════ ABOUT ═══════════════ --}}
<section id="about">
    <div class="section-inner">
        <div class="about-grid">
            <div class="about-visual reveal">
                <div class="about-icon-grid">
                    @foreach ([
                        ['fas fa-graduation-cap','Academic Excellence'],
                        ['fas fa-users','Community Spirit'],
                        ['fas fa-trophy','Awards &amp; Honours'],
                        ['fas fa-flask','Science Labs'],
                        ['fas fa-futbol','Sports Facilities'],
                        ['fas fa-paint-brush','Arts &amp; Culture'],
                    ] as [$icon, $label])
                        <div class="about-icon-card">
                            <i class="{{ $icon }}"></i>
                            <span>{!! $label !!}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal">
                <div class="section-label">About Us</div>
                <h2 class="section-title">Shaping <span>Future Leaders</span></h2>
                <div class="about-text">
                    <p>J &amp; K Designs Academy is a premier educational institution committed to delivering world-class education in a nurturing, inclusive environment. We believe every learner deserves the best start in life.</p>
                    <p>Our dedicated educators, modern facilities, and comprehensive curriculum prepare students for a rapidly changing world — equipping them with the knowledge, skills, and values they need to thrive.</p>
                    <p style="font-weight:800;color:var(--cyan);margin-bottom:0.5rem;font-size:1rem;">Our Core Values</p>
                    <ul class="value-list">
                        @foreach ([
                            'Academic excellence and critical thinking',
                            'Inclusivity, diversity and mutual respect',
                            'Character building and moral integrity',
                            'Innovation, creativity and technology',
                            'Community involvement and leadership',
                            'Physical wellness and sporting achievement',
                        ] as $value)
                            <li><i class="fas fa-check-circle"></i> {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════ ACADEMICS ═══════════════ --}}
<section id="academics">
    <div class="section-inner">
        <div class="section-header center reveal">
            <div class="section-label">Curriculum</div>
            <h2 class="section-title">Academic <span>Subjects Offered</span></h2>
            <p class="section-desc">Our comprehensive curriculum covers a wide range of subjects designed to challenge, inspire and equip every learner for future success.</p>
        </div>
        <div class="subjects-grid">
            @php
            $subjects = [
                ['fas fa-square-root-alt','Mathematics',       'Pure &amp; Applied Mathematics'],
                ['fas fa-atom',           'Physical Sciences', 'Physics &amp; Chemistry'        ],
                ['fas fa-language',       'English',           'Home &amp; First Add. Language' ],
                ['fas fa-landmark',       'History',           'SA &amp; World History'          ],
                ['fas fa-globe-africa',   'Geography',         'Physical &amp; Human Geography' ],
                ['fas fa-laptop-code',    'Technology',        'Information Tech &amp; CAT'     ],
                ['fas fa-palette',        'Visual Arts',       'Fine Arts, Design &amp; Crafts' ],
                ['fas fa-seedling',       'Agricultural Sci.', 'Farming &amp; Environment'      ],
                ['fas fa-heartbeat',      'Life Sciences',     'Biology &amp; Human Sciences'   ],
                ['fas fa-calculator',     'Maths Literacy',    'Practical Maths Skills'         ],
                ['fas fa-running',        'Life Orientation',  'Health, Sport &amp; Citizenship'],
                ['fas fa-coins',          'Business Studies',  'Entrepreneurship &amp; Commerce'],
            ];
            @endphp
            @foreach ($subjects as [$icon, $name, $desc])
                <div class="subject-card reveal">
                    <div class="subject-icon"><i class="{{ $icon }}"></i></div>
                    <div class="subject-name">{{ $name }}</div>
                    <div class="subject-desc">{!! $desc !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════ GALLERY ═══════════════ --}}
<section id="gallery">
    <div class="section-inner">
        <div class="section-header center reveal">
            <div class="section-label">Our Community</div>
            <h2 class="section-title">Life at <span>J &amp; K Academy</span></h2>
            <p class="section-desc">A glimpse into the vibrant life of our staff, students and sporting champions.</p>
        </div>

        <div class="gallery-tabs reveal">
            <button class="gallery-tab active" data-tab="all">All</button>
            <button class="gallery-tab" data-tab="staff">Staff</button>
            <button class="gallery-tab" data-tab="students">Students</button>
            <button class="gallery-tab" data-tab="sports">Sports</button>
        </div>

        <div class="gallery-grid" id="gallery-grid">
            @php
            $gallery = [
                ['staff',    'fas fa-chalkboard-teacher','#22d3ee','Teaching Staff Meeting',      'Staff Development Day'     ],
                ['staff',    'fas fa-user-tie',          '#38bdf8','Principal &amp; Leadership',  'Academic Leadership'       ],
                ['staff',    'fas fa-users',             '#34d399','Department Heads',            'Curriculum Planning'       ],
                ['staff',    'fas fa-award',             '#67e8f9','Staff Awards Evening',        'Recognising Excellence'    ],
                ['students', 'fas fa-graduation-cap',   '#22d3ee','Graduation Ceremony 2026',    'Celebrating Excellence'    ],
                ['students', 'fas fa-book-reader',      '#38bdf8','Library Study Session',       'Academic Focus'            ],
                ['students', 'fas fa-flask',            '#67e8f9','Science Laboratory',          'Hands-on Learning'         ],
                ['students', 'fas fa-paint-brush',      '#22d3ee','Art Exhibition',              'Creative Expression'       ],
                ['sports',   'fas fa-futbol',           '#34d399','Football Champions',          'Regional Tournament'       ],
                ['sports',   'fas fa-swimmer',          '#38bdf8','Swimming Gala',              'Aquatics Week'             ],
                ['sports',   'fas fa-running',          '#67e8f9','Athletics Day',              'Track &amp; Field'         ],
                ['sports',   'fas fa-basketball-ball', '#38bdf8','Basketball League',          'Inter-School Games'        ],
            ];
            @endphp
            @foreach ($gallery as [$tab, $icon, $color, $title, $sub])
                <div class="gallery-item reveal" data-tab="{{ $tab }}">
                    <div class="gallery-item-inner">
                        <i class="{{ $icon }}" style="color:{{ $color }}"></i>
                        <span>{!! $sub !!}</span>
                    </div>
                    <div class="gallery-item-label">{!! $title !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════ SOCIAL MEDIA ═══════════════ --}}
<section id="social">
    <div class="section-inner">
        <div class="section-header center reveal">
            <div class="section-label">Stay Connected</div>
            <h2 class="section-title">Follow Us on <span>Social Media</span></h2>
            <p class="section-desc">Keep up with academy news, events, achievements and announcements across all platforms.</p>
        </div>
        <div class="social-grid">
            <a href="https://facebook.com" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-facebook"></i>
                <div class="social-card-name">Facebook</div>
                <div class="social-card-handle">@JKDesignsAcademy</div>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-instagram"></i>
                <div class="social-card-name">Instagram</div>
                <div class="social-card-handle">@jkdesigns_academy</div>
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-twitter"></i>
                <div class="social-card-name">Twitter / X</div>
                <div class="social-card-handle">@JKAcademy_ZA</div>
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-youtube"></i>
                <div class="social-card-name">YouTube</div>
                <div class="social-card-handle">J &amp; K Designs Academy</div>
            </a>
            <a href="https://tiktok.com" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-tiktok"></i>
                <div class="social-card-name">TikTok</div>
                <div class="social-card-handle">@jkacademy_za</div>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════ CONTACT ═══════════════ --}}
<section id="contact">
    <div class="section-inner">
        <div class="contact-grid">
            {{-- Info column --}}
            <div class="reveal">
                <div class="section-label">Get In Touch</div>
                <h2 class="section-title">Contact <span>the Academy</span></h2>
                <p class="section-desc" style="margin-bottom:2rem;">We'd love to hear from you. Reach out for admissions, general enquiries or to schedule a school visit.</p>

                @foreach ([
                    ['fas fa-map-marker-alt', 'Address',          '45 Brooklyn Street, Pretoria<br>South Africa, 0001'],
                    ['fas fa-phone-alt',      'Phone',            '+27 12 345 6789'],
                    ['fab fa-whatsapp',       'WhatsApp',         '+27 71 234 5678'],
                    ['fas fa-envelope',       'Email',            'info@jkdesignsacademy.co.za'],
                    ['fas fa-clock',          'Office Hours',     'Mon – Fri: 07:00 – 16:00<br>Sat: 08:00 – 12:00'],
                ] as [$icon, $label, $value])
                    <div class="contact-item">
                        <div class="contact-icon"><i class="{{ $icon }}"></i></div>
                        <div>
                            <strong>{{ $label }}</strong>
                            <span>{!! $value !!}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Form column --}}
            <div class="reveal">
                <form id="contact-form" class="contact-form" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf_name">Full Name</label>
                            <input type="text" id="cf_name" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="cf_email">Email Address</label>
                            <input type="email" id="cf_email" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf_phone">Phone / WhatsApp</label>
                            <input type="tel" id="cf_phone" placeholder="+27 71 234 5678">
                        </div>
                        <div class="form-group">
                            <label for="cf_subject">Topic</label>
                            <select id="cf_subject">
                                <option value="">Select a topic</option>
                                <option>Admissions &amp; Enrolment</option>
                                <option>Academic Information</option>
                                <option>School Fees &amp; Bursaries</option>
                                <option>Sporting Activities</option>
                                <option>General Enquiry</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cf_message">Message</label>
                        <textarea id="cf_message" placeholder="Write your message here…" required></textarea>
                    </div>
                    <div id="form-notice" role="alert"></div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════ FOOTER ═══════════════ --}}
<footer>
    <div class="footer-inner">
        <div class="footer-top">
            <div>
                <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.85rem;">
                    <div class="nav-logo-badge" style="width:40px;height:40px;font-size:0.95rem;">JK</div>
                    <div class="footer-brand-name">J &amp; K Designs Academy</div>
                </div>
                <p class="footer-brand-desc">Excellence in Education, Innovation in Learning.<br>Shaping the leaders of tomorrow, today.</p>
                <div class="footer-socials">
                    @foreach ([
                        ['https://facebook.com',  'fab fa-facebook-f',  ''],
                        ['https://instagram.com', 'fab fa-instagram',   ''],
                        ['https://twitter.com',   'fab fa-twitter',     ''],
                        ['https://youtube.com',   'fab fa-youtube',     ''],
                        ['https://tiktok.com',    'fab fa-tiktok',      ''],
                        ['https://wa.me/27712345678','fab fa-whatsapp', 'style="color:#25d366;border-color:rgba(37,211,102,0.4)"'],
                    ] as [$href, $icon, $style])
                        <a href="{{ $href }}" target="_blank" class="footer-soc-btn" {!! $style !!}><i class="{{ $icon }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#academics">Academics</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Portals</h4>
                <ul>
                    @if (Route::has('login'))
                        <li><a href="{{ route('login', ['portal' => 'learner']) }}"><i class="fas fa-user-graduate" style="color:var(--cyan);margin-right:6px"></i>Student Login</a></li>
                        <li><a href="{{ route('login', ['portal' => 'teacher']) }}"><i class="fas fa-chalkboard-teacher" style="color:var(--cyan);margin-right:6px"></i>Teacher Login</a></li>
                        <li><a href="{{ route('login', ['portal' => 'admin']) }}"><i class="fas fa-shield-alt" style="color:var(--cyan);margin-right:6px"></i>Admin Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li style="margin-top:0.4rem;"><a href="{{ route('register') }}"><i class="fas fa-user-plus" style="color:var(--cyan);margin-right:6px"></i>Register Choice</a></li>
                        <li><a href="{{ route('register.student') }}">Student Registration</a></li>
                        <li><a href="{{ route('register.teacher') }}">Teacher Registration</a></li>
                    @endif
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="tel:+27123456789"><i class="fas fa-phone" style="color:var(--cyan);margin-right:6px;font-size:0.75rem"></i>+27 12 345 6789</a></li>
                    <li><a href="https://wa.me/27712345678" target="_blank"><i class="fab fa-whatsapp" style="color:#25d366;margin-right:6px;font-size:0.75rem"></i>WhatsApp Us</a></li>
                    <li><a href="mailto:info@jkdesignsacademy.co.za"><i class="fas fa-envelope" style="color:var(--cyan);margin-right:6px;font-size:0.75rem"></i>Email Us</a></li>
                    <li><a href="#contact"><i class="fas fa-map-marker-alt" style="color:var(--cyan);margin-right:6px;font-size:0.75rem"></i>Find Us</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} J &amp; K Designs Academy. All rights reserved.</span>
            <span>Built with ❤️ for Education</span>
        </div>
    </div>
</footer>

{{-- ═══════════════ WHATSAPP FLOAT ═══════════════ --}}
<a href="https://wa.me/27712345678?text=Hello%20J%20%26%20K%20Designs%20Academy%2C%20I%20would%20like%20to%20enquire%20about%20your%20school."
   target="_blank" rel="noopener" class="whatsapp-float" aria-label="Chat on WhatsApp">
    <span class="wa-tooltip">Chat with us!</span>
    <i class="fab fa-whatsapp"></i>
</a>

{{-- ═══════════════ JAVASCRIPT ═══════════════ --}}
<script>
    // ── Mobile hamburger ──────────────────────────────────────
    const hamBtn     = document.getElementById('ham-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    hamBtn.addEventListener('click', () => mobileMenu.classList.toggle('open'));
    mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobileMenu.classList.remove('open')));

    // ── Scroll reveal (IntersectionObserver) ─────────────────
    const revealObs = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('visible'), i * 50);
                revealObs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

    // ── Gallery filter tabs ───────────────────────────────────
    document.querySelectorAll('.gallery-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.gallery-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const filter = tab.dataset.tab;
            document.querySelectorAll('#gallery-grid .gallery-item').forEach(item => {
                item.style.display = (filter === 'all' || item.dataset.tab === filter) ? '' : 'none';
            });
        });
    });

    // ── Binary Rain Canvas Effect ─────────────────────────────
    (function() {
        const canvas = document.getElementById('binary-rain');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let width = canvas.width = window.innerWidth;
        let height = canvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        });

        const chars = '01';
        const fontSize = 14;
        const columns = Math.floor(width / fontSize);
        const drops = Array(columns).fill(1);

        function drawRain() {
            ctx.fillStyle = 'rgba(8, 21, 56, 0.08)';
            ctx.fillRect(0, 0, width, height);

            ctx.fillStyle = '#22d3ee';
            ctx.font = fontSize + 'px monospace';

            for (let i = 0; i < drops.length; i++) {
                const text = chars.charAt(Math.floor(Math.random() * chars.length));
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);

                if (drops[i] * fontSize > height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }
        setInterval(drawRain, 55);
    })();

    // ── Contact form (client-side demo) ──────────────────────
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const notice = document.getElementById('form-notice');
        const btn    = this.querySelector('.btn-submit');
        const name   = document.getElementById('cf_name').value.trim();
        const email  = document.getElementById('cf_email').value.trim();
        const msg    = document.getElementById('cf_message').value.trim();

        if (!name || !email || !msg) {
            notice.className = 'error';
            notice.textContent = '⚠ Please fill in your name, email and message.';
            notice.style.display = 'block';
            return;
        }
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending…';

        setTimeout(() => {
            notice.className = 'success';
            notice.textContent = '✓ Thank you! Your message has been received. We\'ll be in touch shortly.';
            notice.style.display = 'block';
            this.reset();
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
        }, 1200);
    });
</script>
</body>
</html>
