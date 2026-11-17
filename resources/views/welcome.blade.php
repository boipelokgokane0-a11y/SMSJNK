<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>J &amp; K Designs Academy — Excellence in Education</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite assets -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* ── RESET & BASE ─────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Figtree', sans-serif; background: #081538; color: #e2e8f0; line-height: 1.6; }

        :root {
            --cyan:      #22d3ee;
            --cyan-lt:   #67e8f9;
            --navy:      #081538;
            --navy-lt:   #0d225c;
            --navy-md:   #0f286b;
            --navy-dark: #080e1a;
            --accent:    #38bdf8;
            --white:     #f8fafc;
            --sky-text:  #bae6fd;
            --sky-border:rgba(56,189,248,0.45);
        }

        /* ── BINARY RAIN ──────────────────────────────── */
        #binary-rain { position:fixed; top:0; left:0; width:100%; height:100%; z-index:0; pointer-events:none; opacity:0.14; }

        /* ── NAVBAR ───────────────────────────────────── */
        #navbar { position:fixed; top:0; left:0; right:0; z-index:1000; background:rgba(8,21,56,0.96); backdrop-filter:blur(16px); border-bottom:2px solid rgba(56,189,248,0.35); box-shadow:0 4px 20px rgba(0,0,0,0.3); }
        .nav-inner { max-width:1200px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; padding:0 1.5rem; height:72px; }
        .nav-logo { display:flex; align-items:center; gap:0.75rem; text-decoration:none; }
        .nav-logo-badge { width:44px; height:44px; border-radius:14px; flex-shrink:0; background:linear-gradient(135deg,#22d3ee,#0284c7); display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.05rem; color:#020617; border:2px solid #67e8f9; box-shadow:0 0 16px rgba(34,211,238,0.45); }
        .nav-logo-title { font-weight:900; font-size:1.05rem; color:var(--white); display:block; line-height:1.2; }
        .nav-logo-sub   { font-size:0.65rem; color:var(--cyan); letter-spacing:0.1em; text-transform:uppercase; font-weight:800; display:block; }
        .nav-links { display:flex; align-items:center; gap:0.25rem; list-style:none; }
        .nav-links a { padding:0.45rem 0.95rem; border-radius:10px; font-size:0.88rem; font-weight:700; color:var(--sky-text); text-decoration:none; transition:all 0.2s; }
        .nav-links a:hover { color:var(--cyan); background:rgba(34,211,238,0.12); }
        .nav-actions { display:flex; align-items:center; gap:0.65rem; }
        .btn-nav-login { padding:0.45rem 1.2rem; border-radius:12px; font-size:0.85rem; font-weight:800; border:2px solid #38bdf8; color:var(--cyan); text-decoration:none; transition:all 0.2s; background:rgba(8,21,56,0.7); }
        .btn-nav-login:hover { background:rgba(34,211,238,0.18); border-color:var(--cyan); color:#fff; transform:translateY(-1px); }
        .btn-nav-register { padding:0.45rem 1.25rem; border-radius:12px; font-size:0.85rem; font-weight:900; background:linear-gradient(135deg,#22d3ee,#38bdf8); color:#020617; text-decoration:none; transition:all 0.2s; border:2px solid #67e8f9; box-shadow:0 4px 15px rgba(34,211,238,0.35); }
        .btn-nav-register:hover { background:#67e8f9; transform:translateY(-1px); box-shadow:0 6px 20px rgba(34,211,238,0.55); }
        .btn-nav-dashboard { padding:0.45rem 1.25rem; border-radius:12px; font-size:0.85rem; font-weight:800; background:linear-gradient(135deg,#0284c7,#0f286b); color:#fff; border:2px solid #38bdf8; text-decoration:none; transition:all 0.2s; }
        .btn-nav-dashboard:hover { background:#0284c7; border-color:var(--cyan); }
        .hamburger { display:none; flex-direction:column; gap:5px; cursor:pointer; padding:6px; background:none; border:none; }
        .hamburger span { display:block; width:24px; height:2.5px; background:var(--cyan); border-radius:2px; transition:all 0.3s; }
        .hamburger.open span:nth-child(1) { transform:translateY(7.5px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity:0; }
        .hamburger.open span:nth-child(3) { transform:translateY(-7.5px) rotate(-45deg); }
        #mobile-menu { display:none; position:absolute; top:72px; left:0; right:0; background:rgba(8,21,56,0.98); border-bottom:2px solid rgba(56,189,248,0.35); padding:1.2rem 1.5rem 1.8rem; flex-direction:column; gap:0.5rem; box-shadow:0 10px 30px rgba(0,0,0,0.5); }
        #mobile-menu.open { display:flex; }
        #mobile-menu a { padding:0.75rem 1rem; border-radius:10px; color:var(--sky-text); text-decoration:none; font-weight:700; font-size:0.95rem; transition:all 0.2s; }
        #mobile-menu a:hover { color:var(--cyan); background:rgba(34,211,238,0.12); }
        .mobile-auth { display:flex; gap:0.65rem; margin-top:0.75rem; flex-wrap:wrap; }
        .mobile-auth a { flex:1; text-align:center; min-width:100px; }
        @media (max-width:768px) { .nav-links, .nav-actions { display:none; } .hamburger { display:flex; } }

        /* ── HERO ─────────────────────────────────────── */
        #hero {
            min-height:100vh; padding-top:72px; position:relative; overflow:hidden;
            display:flex; align-items:center; justify-content:center;
            background:#081538;
        }
        .hero-bg-img {
            position:absolute; inset:0; z-index:0;
            background: #081538 url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1920&q=80') center top / cover no-repeat;
        }
        .hero-bg-overlay {
            position:absolute; inset:0; z-index:1;
            background:linear-gradient(135deg, rgba(8,21,56,0.92) 0%, rgba(13,34,92,0.85) 50%, rgba(8,21,56,0.94) 100%);
        }
        .hero-dots { position:absolute; inset:0; z-index:2; opacity:0.06; background-image:radial-gradient(circle at 1px 1px,#22d3ee 1px,transparent 0); background-size:44px 44px; }
        .hero-glow { position:absolute; width:750px; height:750px; border-radius:50%; background:radial-gradient(circle,rgba(34,211,238,0.14) 0%,transparent 70%); top:50%; left:50%; transform:translate(-50%,-50%); pointer-events:none; z-index:2; }
        .hero-content { position:relative; z-index:3; text-align:center; max-width:960px; padding:2.5rem 1.5rem; }
        .hero-badge { display:inline-flex; align-items:center; gap:0.5rem; background:#081538; border:2px solid rgba(56,189,248,0.55); border-radius:999px; padding:0.45rem 1.4rem; margin-bottom:1.6rem; font-size:0.8rem; font-weight:800; color:var(--cyan); letter-spacing:0.08em; text-transform:uppercase; box-shadow:0 4px 20px rgba(34,211,238,0.2); }
        .hero-title { font-size:clamp(2.3rem,7vw,4.8rem); font-weight:900; line-height:1.1; color:var(--white); margin-bottom:1.2rem; letter-spacing:-0.02em; text-shadow:0 4px 24px rgba(0,0,0,0.5); }
        .hero-title span { color:var(--cyan-lt); text-shadow:0 0 30px rgba(34,211,238,0.6); }
        .hero-subtitle { font-size:clamp(1rem,2.5vw,1.25rem); color:var(--sky-text); max-width:660px; margin:0 auto 2.5rem; font-weight:600; text-shadow:0 2px 8px rgba(0,0,0,0.4); }
        .hero-cta { display:flex; gap:1rem; justify-content:center; flex-wrap:wrap; }
        .btn-primary { display:inline-flex; align-items:center; gap:0.6rem; padding:0.95rem 2.2rem; border-radius:14px; font-size:1.05rem; font-weight:900; background:linear-gradient(135deg,#22d3ee 0%,#38bdf8 50%,#3b82f6 100%); color:#020617; text-decoration:none; border:2px solid #67e8f9; box-shadow:0 8px 30px rgba(34,211,238,0.45); transition:all 0.25s; cursor:pointer; }
        .btn-primary:hover { background:linear-gradient(135deg,#67e8f9 0%,#38bdf8 50%,#60a5fa 100%); transform:translateY(-2px); box-shadow:0 12px 35px rgba(34,211,238,0.65); }
        .btn-outline { display:inline-flex; align-items:center; gap:0.6rem; padding:0.95rem 2.2rem; border-radius:14px; font-size:1.05rem; font-weight:800; border:2px solid #38bdf8; color:var(--cyan); text-decoration:none; background:rgba(8,21,56,0.7); transition:all 0.25s; cursor:pointer; }
        .btn-outline:hover { border-color:var(--cyan); background:rgba(34,211,238,0.15); color:#fff; transform:translateY(-2px); }
        .hero-stats { display:flex; gap:1.25rem; justify-content:center; flex-wrap:wrap; margin-top:4rem; padding-top:2rem; border-top:2px solid rgba(56,189,248,0.25); }
        .hero-stat { background:rgba(8,21,56,0.85); border:2px solid rgba(56,189,248,0.45); border-radius:18px; padding:1.25rem 2rem; text-align:center; box-shadow:0 6px 25px rgba(56,189,248,0.18); transition:all 0.3s; backdrop-filter:blur(8px); }
        .hero-stat:hover { border-color:var(--cyan); background:rgba(13,34,92,0.9); transform:translateY(-3px); box-shadow:0 10px 30px rgba(34,211,238,0.3); }
        .hero-stat-code { font-family:ui-monospace,monospace; font-size:0.7rem; font-weight:800; color:#38bdf8; letter-spacing:0.14em; margin-bottom:0.2rem; }
        .hero-stat-num { font-size:2.3rem; font-weight:900; color:var(--cyan); line-height:1.1; text-shadow:0 0 20px rgba(34,211,238,0.4); }
        .hero-stat-lbl { font-size:0.78rem; font-weight:800; color:#f1f5f9; letter-spacing:0.06em; text-transform:uppercase; margin-top:0.35rem; }

        /* ── SCHOOL PARTNERSHIP BANNER ───────────────── */
        #partner-banner { background:#0a1a47; border-top:2px solid rgba(56,189,248,0.3); border-bottom:2px solid rgba(56,189,248,0.3); padding:0; overflow:hidden; position:relative; z-index:1; }
        .partner-inner { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1fr 1fr; min-height:420px; }
        .partner-img-col { position:relative; overflow:hidden; background:#0f286b; cursor:pointer; }
        .partner-img-col img { width:100%; height:100%; object-fit:cover; object-position:center; display:block; transition:transform 0.4s; }
        .partner-img-col:hover img { transform:scale(1.04); }
        .partner-img-overlay { position:absolute; inset:0; background:linear-gradient(to right, transparent 60%, #0a1a47 100%); }
        .partner-img-badge { position:absolute; bottom:1.2rem; left:1.2rem; background:rgba(8,21,56,0.92); border:1.5px solid var(--cyan); border-radius:999px; padding:0.4rem 1rem; color:var(--cyan); font-size:0.75rem; font-weight:900; display:flex; align-items:center; gap:0.4rem; z-index:2; }
        .partner-text-col { padding:3.5rem 3rem; display:flex; flex-direction:column; justify-content:center; gap:1.5rem; }
        .partner-label { display:inline-block; font-size:0.72rem; font-weight:900; letter-spacing:0.14em; text-transform:uppercase; color:var(--cyan); background:rgba(34,211,238,0.1); border:1px solid rgba(34,211,238,0.35); padding:0.35rem 1rem; border-radius:999px; }
        .partner-title { font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; color:var(--white); line-height:1.2; }
        .partner-title span { color:var(--cyan-lt); }
        .partner-desc { color:var(--sky-text); font-size:0.96rem; font-weight:500; line-height:1.7; }
        .partner-tags { display:flex; flex-wrap:wrap; gap:0.6rem; }
        .partner-tag { padding:0.4rem 1rem; border-radius:999px; background:#081538; border:1px solid rgba(56,189,248,0.4); color:#bae6fd; font-size:0.78rem; font-weight:700; }
        .partner-accred { display:flex; align-items:center; gap:0.75rem; padding:1rem 1.25rem; background:#081538; border:2px solid rgba(56,189,248,0.4); border-radius:14px; }
        .partner-accred i { color:#22d3ee; font-size:1.4rem; flex-shrink:0; }
        .partner-accred strong { color:var(--white); font-size:0.9rem; display:block; }
        .partner-accred span { color:#bae6fd; font-size:0.78rem; }
        @media (max-width:768px) { .partner-inner { grid-template-columns:1fr; } .partner-img-col { height:260px; } .partner-img-overlay { background:linear-gradient(to top, #0a1a47 10%, transparent 100%); } .partner-text-col { padding:2rem 1.5rem; } }

        /* ── SECTION SHARED ──────────────────────────── */
        section { padding:5.5rem 1.5rem; position:relative; z-index:1; }
        .section-inner { max-width:1200px; margin:0 auto; }
        .section-label { display:inline-block; font-size:0.75rem; font-weight:900; letter-spacing:0.12em; text-transform:uppercase; color:var(--cyan); margin-bottom:0.6rem; }
        .section-title { font-size:clamp(1.6rem,4vw,2.5rem); font-weight:900; color:var(--white); line-height:1.2; margin-bottom:0.8rem; }
        .section-title span { color:var(--cyan-lt); text-shadow:0 0 20px rgba(34,211,238,0.3); }
        .section-desc { color:var(--sky-text); max-width:620px; font-size:1rem; font-weight:500; }
        .section-header { margin-bottom:3.2rem; }
        .section-header.center { text-align:center; }
        .section-header.center .section-desc { margin:0 auto; }

        /* ── ABOUT (FIXED GUARANTEED GRAPHIC - NEVER BLANK) ─── */
        #about { background:#0d225c; }
        .about-grid { display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:center; }
        .about-visual {
            border-radius:22px; overflow:hidden; border:3px solid rgba(56,189,248,0.45);
            box-shadow:0 20px 60px rgba(0,0,0,0.5); position:relative; background:#0f286b;
            min-height:360px; display:flex; align-items:center; justify-content:center;
        }
        .about-visual img { width:100%; height:100%; min-height:360px; object-fit:cover; display:block; }
        .about-visual-badge {
            position:absolute; bottom:1.2rem; left:1.2rem; background:rgba(8,21,56,0.95);
            border:2px solid var(--cyan); border-radius:14px; padding:0.75rem 1.25rem;
            backdrop-filter:blur(10px); box-shadow:0 8px 25px rgba(0,0,0,0.6); z-index:2;
        }
        .about-visual-badge strong { display:block; color:var(--cyan); font-size:1.25rem; font-weight:900; }
        .about-visual-badge span { color:#bae6fd; font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; }
        .about-text p { color:var(--sky-text); margin-bottom:1.1rem; font-size:0.98rem; }
        .value-list { list-style:none; }
        .value-list li { display:flex; align-items:center; gap:0.85rem; padding:0.55rem 0; border-bottom:1px solid rgba(56,189,248,0.15); color:#e0f2fe; font-size:0.92rem; font-weight:600; }
        .value-list li i { color:var(--cyan); width:18px; flex-shrink:0; }
        @media (max-width:768px) { .about-grid { grid-template-columns:1fr; gap:2rem; } }

        /* ── ACADEMICS ───────────────────────────────── */
        #academics { background:#081538; }
        .subjects-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:1.4rem; }
        .subject-card { background:#0d225c; border:2px solid rgba(56,189,248,0.35); border-radius:18px; padding:1.8rem 1.4rem; text-align:center; transition:all 0.3s; cursor:default; }
        .subject-card:hover { border-color:var(--cyan); transform:translateY(-5px); box-shadow:0 15px 40px rgba(34,211,238,0.22); }
        .subject-icon { width:56px; height:56px; border-radius:16px; margin:0 auto 1.1rem; display:flex; align-items:center; justify-content:center; font-size:1.5rem; background:rgba(34,211,238,0.15); color:var(--cyan); border:1px solid rgba(56,189,248,0.3); }
        .subject-name { font-weight:800; color:var(--white); font-size:1rem; margin-bottom:0.3rem; }
        .subject-desc { font-size:0.78rem; color:#94a3b8; font-weight:500; }

        /* ── GALLERY ─────────────────────────────────── */
        #gallery { background:#0d225c; }
        .gallery-tabs { display:flex; gap:0.6rem; margin-bottom:2.2rem; flex-wrap:wrap; }
        .gallery-tab { padding:0.5rem 1.3rem; border-radius:999px; font-size:0.85rem; font-weight:800; cursor:pointer; border:2px solid rgba(56,189,248,0.35); color:#bae6fd; background:#081538; transition:all 0.2s; }
        .gallery-tab.active, .gallery-tab:hover { background:var(--cyan); color:#020617; border-color:#67e8f9; box-shadow:0 4px 15px rgba(34,211,238,0.4); }
        .gallery-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:1.2rem; }
        .gallery-item { border-radius:16px; overflow:hidden; position:relative; background:#0f286b; aspect-ratio:4/3; border:2px solid rgba(56,189,248,0.35); transition:all 0.3s; cursor:pointer; }
        .gallery-item:hover { border-color:var(--cyan); transform:scale(1.03); box-shadow:0 15px 40px rgba(34,211,238,0.3); }
        .gallery-item img { width:100%; height:100%; object-fit:cover; display:block; transition:transform 0.4s; }
        .gallery-item:hover img { transform:scale(1.08); }
        .gallery-item-overlay { position:absolute; inset:0; background:linear-gradient(to top, rgba(8,21,56,0.95) 0%, rgba(8,21,56,0.3) 50%, transparent 100%); opacity:0.75; transition:opacity 0.3s; }
        .gallery-item:hover .gallery-item-overlay { opacity:1; }
        .gallery-item-label { position:absolute; bottom:0; left:0; right:0; padding:1.2rem 0.9rem 0.75rem; }
        .gallery-item-label strong { display:block; font-size:0.9rem; font-weight:800; color:var(--white); line-height:1.3; }
        .gallery-item-label span { font-size:0.72rem; font-weight:600; color:#bae6fd; }
        .gallery-zoom-icon { position:absolute; top:0.75rem; right:0.75rem; width:34px; height:34px; border-radius:50%; background:rgba(8,21,56,0.8); border:1px solid rgba(56,189,248,0.5); display:flex; align-items:center; justify-content:center; color:var(--cyan); font-size:0.8rem; opacity:0; transition:opacity 0.3s; }
        .gallery-item:hover .gallery-zoom-icon { opacity:1; }

        /* ── LIGHTBOX ─────────────────────────────────── */
        #lightbox { display:none; position:fixed; inset:0; z-index:9999; background:rgba(4,10,30,0.97); backdrop-filter:blur(10px); align-items:center; justify-content:center; padding:1rem; flex-direction:column; gap:1.2rem; }
        #lightbox.open { display:flex; }
        #lightbox img { max-width:min(900px,90vw); max-height:70vh; border-radius:16px; border:2px solid rgba(56,189,248,0.5); box-shadow:0 30px 80px rgba(0,0,0,0.8); object-fit:contain; }
        #lightbox-caption { text-align:center; }
        #lightbox-caption strong { display:block; color:var(--white); font-size:1.1rem; font-weight:800; }
        #lightbox-caption span { color:#bae6fd; font-size:0.85rem; }
        #lightbox-close { position:absolute; top:1.2rem; right:1.5rem; background:none; border:2px solid rgba(56,189,248,0.4); color:var(--cyan); border-radius:50%; width:42px; height:42px; font-size:1.2rem; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:all 0.2s; }
        #lightbox-close:hover { background:var(--cyan); color:#020617; border-color:var(--cyan); }
        .lightbox-nav { display:flex; gap:1rem; }
        .lightbox-btn { padding:0.6rem 1.5rem; border-radius:12px; background:rgba(13,34,92,0.9); border:2px solid rgba(56,189,248,0.4); color:var(--cyan); font-weight:800; font-size:0.9rem; cursor:pointer; transition:all 0.2s; }
        .lightbox-btn:hover { background:var(--cyan); color:#020617; border-color:var(--cyan); }

        /* ── SOCIAL ──────────────────────────────────── */
        #social { background:#081538; }
        .social-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:1.3rem; }
        .social-card { border-radius:18px; padding:2.2rem 1.25rem; text-align:center; background:#0d225c; border:2px solid rgba(56,189,248,0.3); transition:all 0.3s; text-decoration:none; display:block; }
        .social-card:hover { transform:translateY(-5px); border-color:var(--cyan); box-shadow:0 15px 35px rgba(34,211,238,0.25); }
        .social-card i { font-size:2.3rem; margin-bottom:0.75rem; display:block; color:var(--cyan); }
        .social-card-name { font-weight:800; color:var(--white); font-size:1rem; margin-bottom:0.2rem; }
        .social-card-handle { font-size:0.78rem; color:#bae6fd; font-weight:600; }
        .social-card-action { margin-top:1rem; padding:0.45rem 1.1rem; border-radius:999px; background:rgba(34,211,238,0.12); border:1px solid rgba(34,211,238,0.35); color:var(--cyan); font-size:0.75rem; font-weight:800; display:inline-block; transition:all 0.2s; }
        .social-card:hover .social-card-action { background:var(--cyan); color:#020617; }

        /* ── WHATSAPP FLOAT ──────────────────────────── */
        .whatsapp-float { position:fixed; bottom:1.75rem; right:1.75rem; z-index:999; width:60px; height:60px; border-radius:50%; background:#25d366; color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.8rem; text-decoration:none; box-shadow:0 6px 24px rgba(37,211,102,0.5); transition:all 0.3s; animation:pulse-wa 2.2s infinite; }
        .whatsapp-float:hover { background:#20b858; transform:scale(1.1); }
        @keyframes pulse-wa { 0%,100% { box-shadow:0 6px 24px rgba(37,211,102,0.5); } 50% { box-shadow:0 6px 40px rgba(37,211,102,0.8),0 0 0 10px rgba(37,211,102,0.08); } }
        .wa-tooltip { position:absolute; right:72px; bottom:50%; transform:translateY(50%); background:#081538; color:var(--white); font-size:0.8rem; font-weight:700; padding:0.4rem 0.95rem; border-radius:10px; white-space:nowrap; border:1px solid rgba(37,211,102,0.4); pointer-events:none; opacity:0; transition:opacity 0.2s; }
        .whatsapp-float:hover .wa-tooltip { opacity:1; }

        /* ── CONTACT & EXACT CAMPUS MAP ──────────────── */
        #contact { background:#0d225c; }
        .contact-grid { display:grid; grid-template-columns:1fr 1.35fr; gap:3.5rem; align-items:start; }
        .contact-item { display:flex; gap:1.1rem; align-items:flex-start; margin-bottom:1.3rem; }
        .contact-icon { width:44px; height:44px; border-radius:12px; flex-shrink:0; background:#081538; border:2px solid rgba(56,189,248,0.4); display:flex; align-items:center; justify-content:center; color:var(--cyan); font-size:1.1rem; }
        .contact-item strong { display:block; color:var(--white); font-size:0.92rem; margin-bottom:0.2rem; font-weight:800; }
        .contact-item span { color:#bae6fd; font-size:0.86rem; font-weight:500; }

        /* Campus building preview card in contact section */
        .campus-building-card {
            background:#081538; border:2px solid rgba(56,189,248,0.45); border-radius:18px;
            padding:1.2rem; margin-top:1.5rem; transition:all 0.3s; cursor:pointer; position:relative; overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.35);
        }
        .campus-building-card:hover {
            border-color:var(--cyan); transform:translateY(-3px); box-shadow:0 15px 40px rgba(34,211,238,0.25);
        }
        .campus-building-thumb {
            width:100%; height:180px; border-radius:12px; overflow:hidden; position:relative;
            background:#0f286b; border:1px solid rgba(56,189,248,0.3);
        }
        .campus-building-thumb img {
            width:100%; height:100%; object-fit:cover; display:block; transition:transform 0.4s;
        }
        .campus-building-card:hover .campus-building-thumb img { transform:scale(1.05); }
        .campus-building-badge {
            position:absolute; top:0.75rem; right:0.75rem; background:rgba(8,21,56,0.92);
            border:1.5px solid var(--cyan); border-radius:999px; padding:0.35rem 0.85rem;
            color:var(--cyan); font-size:0.72rem; font-weight:800; display:flex; align-items:center; gap:0.4rem;
            box-shadow:0 4px 15px rgba(0,0,0,0.5);
        }
        .campus-building-info { margin-top:0.85rem; }
        .campus-building-info h4 { font-size:1.05rem; font-weight:900; color:var(--white); }
        .campus-building-info p { font-size:0.82rem; color:#bae6fd; font-weight:600; margin-top:0.25rem; }
        .campus-building-btn {
            display:inline-flex; align-items:center; gap:0.5rem; margin-top:0.85rem;
            padding:0.55rem 1.1rem; border-radius:10px; background:linear-gradient(135deg,#22d3ee,#38bdf8);
            color:#020617; font-size:0.82rem; font-weight:900; text-decoration:none; border:1.5px solid #67e8f9;
            transition:all 0.2s; cursor:pointer;
        }
        .campus-building-btn:hover { background:#67e8f9; transform:scale(1.02); }

        /* Exact map wrapper */
        .contact-map-wrapper {
            margin-top:1.4rem; border-radius:18px; overflow:hidden;
            border:2px solid rgba(56,189,248,0.45); background:#081538;
            box-shadow:0 12px 35px rgba(0,0,0,0.4);
        }
        .contact-map-header {
            padding:0.85rem 1.25rem; background:linear-gradient(135deg,#0d225c,#081538);
            border-bottom:2px solid rgba(56,189,248,0.35); display:flex; align-items:center; justify-content:space-between;
            flex-wrap:wrap; gap:0.75rem;
        }
        .contact-map-header strong { color:var(--white); font-size:0.92rem; font-weight:900; display:flex; align-items:center; gap:0.5rem; }
        .contact-map-header strong i { color:var(--cyan); }
        .contact-map-header span { color:#bae6fd; font-size:0.75rem; font-weight:700; background:#081538; padding:0.3rem 0.75rem; border-radius:999px; border:1px solid rgba(56,189,248,0.35); }
        .contact-map iframe { display:block; width:100%; height:250px; border:none; }
        .contact-map-footer {
            padding:0.85rem 1.25rem; background:#081538; border-top:1px solid rgba(56,189,248,0.25);
            display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.6rem;
        }
        .map-btn-link {
            display:inline-flex; align-items:center; gap:0.45rem; font-size:0.82rem; font-weight:800;
            color:var(--cyan); text-decoration:none; padding:0.45rem 0.95rem; border-radius:8px;
            background:rgba(34,211,238,0.12); border:1px solid rgba(34,211,238,0.35); transition:all 0.2s; cursor:pointer;
        }
        .map-btn-link:hover { background:var(--cyan); color:#020617; transform:translateY(-1px); }

        /* ── BUILDING SHOWCASE MODAL ─────────────────── */
        #building-modal {
            display:none; position:fixed; inset:0; z-index:99999;
            background:rgba(4,10,30,0.96); backdrop-filter:blur(12px);
            align-items:center; justify-content:center; padding:1.2rem;
            overflow-y:auto;
        }
        #building-modal.open { display:flex; }
        .building-modal-card {
            background:#0d225c; border:2.5px solid var(--cyan); border-radius:24px;
            max-width:880px; width:100%; max-height:92vh; overflow-y:auto;
            box-shadow:0 25px 80px rgba(0,0,0,0.85), 0 0 40px rgba(34,211,238,0.2);
            position:relative; color:var(--white); padding:0;
        }
        .building-modal-close {
            position:absolute; top:1.2rem; right:1.2rem; z-index:10;
            background:#081538; border:2px solid var(--cyan); color:var(--cyan);
            border-radius:50%; width:44px; height:44px; font-size:1.2rem;
            cursor:pointer; display:flex; align-items:center; justify-content:center;
            transition:all 0.2s;
        }
        .building-modal-close:hover { background:var(--cyan); color:#020617; transform:scale(1.08); }
        .building-modal-hero {
            width:100%; height:320px; position:relative; background:#081538; overflow:hidden;
        }
        .building-modal-hero img {
            width:100%; height:100%; object-fit:cover; display:block;
        }
        .building-modal-hero-overlay {
            position:absolute; inset:0;
            background:linear-gradient(to top, #0d225c 0%, rgba(13,34,92,0.3) 60%, transparent 100%);
        }
        .building-modal-content { padding:1.8rem 2.2rem 2.2rem; }
        .building-specs-grid {
            display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:0.9rem; margin:1.4rem 0;
        }
        .building-spec-box {
            background:#081538; border:1px solid rgba(56,189,248,0.35); border-radius:14px;
            padding:1rem; display:flex; align-items:center; gap:0.75rem;
        }
        .building-spec-box i { font-size:1.4rem; color:var(--cyan); flex-shrink:0; }
        .building-spec-box strong { font-size:0.88rem; color:var(--white); display:block; }
        .building-spec-box span { font-size:0.75rem; color:#bae6fd; }

        .contact-form { background:#081538; border:2px solid rgba(56,189,248,0.4); border-radius:22px; padding:2.2rem; display:flex; flex-direction:column; gap:1.1rem; box-shadow:0 12px 35px rgba(0,0,0,0.35); }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
        .form-group { display:flex; flex-direction:column; gap:0.4rem; }
        .form-group label { font-size:0.78rem; font-weight:800; color:var(--cyan); letter-spacing:0.06em; text-transform:uppercase; }
        .form-group input, .form-group select, .form-group textarea { background:#0d225c; border:2px solid rgba(56,189,248,0.4); border-radius:12px; padding:0.8rem 1rem; color:var(--white); font-size:0.95rem; font-family:inherit; outline:none; transition:all 0.2s; width:100%; }
        .form-group input::placeholder, .form-group textarea::placeholder { color:#64748b; }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus { border-color:var(--cyan); box-shadow:0 0 0 4px rgba(34,211,238,0.2); background:#0b1f54; }
        .form-group select option { background:#081538; color:#fff; }
        .form-group textarea { resize:vertical; min-height:120px; }
        .btn-submit { padding:0.95rem 2.2rem; border-radius:12px; font-size:1rem; font-weight:900; background:linear-gradient(135deg,#22d3ee,#38bdf8); color:#020617; border:2px solid #67e8f9; cursor:pointer; transition:all 0.25s; display:inline-flex; align-items:center; gap:0.6rem; align-self:flex-start; box-shadow:0 6px 20px rgba(34,211,238,0.35); }
        .btn-submit:hover { background:#67e8f9; transform:translateY(-2px); box-shadow:0 10px 30px rgba(34,211,238,0.55); }
        #form-notice { display:none; padding:0.95rem 1.2rem; border-radius:12px; font-size:0.9rem; font-weight:700; }
        #form-notice.success { background:rgba(16,185,129,0.15); border:2px solid rgba(52,211,153,0.5); color:#34d399; }
        #form-notice.error   { background:rgba(239,68,68,0.15); border:2px solid rgba(248,113,113,0.5); color:#f87171; }
        @media (max-width:768px) { .contact-grid { grid-template-columns:1fr; gap:2.5rem; } .form-row { grid-template-columns:1fr; } }

        /* ── FOOTER ──────────────────────────────────── */
        footer { background:#080e1a; border-top:2px solid rgba(56,189,248,0.35); padding:3.5rem 1.5rem 1.8rem; position:relative; z-index:1; }
        .footer-inner { max-width:1200px; margin:0 auto; }
        .footer-top { display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:2.2rem; margin-bottom:2.8rem; }
        .footer-brand-name { font-weight:900; font-size:1.15rem; color:var(--white); margin-bottom:0.4rem; }
        .footer-brand-desc { font-size:0.85rem; color:var(--sky-text); line-height:1.6; margin-bottom:1.2rem; }
        .footer-socials { display:flex; gap:0.6rem; flex-wrap:wrap; }
        .footer-soc-btn { width:38px; height:38px; border-radius:10px; background:#0d225c; border:1px solid rgba(56,189,248,0.35); color:var(--cyan); display:flex; align-items:center; justify-content:center; font-size:0.92rem; text-decoration:none; transition:all 0.2s; }
        .footer-soc-btn:hover { background:var(--cyan); color:#020617; transform:translateY(-2px); }
        .footer-col h4 { font-weight:800; color:var(--white); font-size:0.95rem; margin-bottom:1.1rem; text-transform:uppercase; letter-spacing:0.05em; }
        .footer-col ul { list-style:none; display:flex; flex-direction:column; gap:0.65rem; }
        .footer-col ul li a { font-size:0.85rem; color:#94a3b8; text-decoration:none; transition:color 0.2s; font-weight:600; }
        .footer-col ul li a:hover { color:var(--cyan); }
        .footer-bottom { padding-top:1.8rem; border-top:1px solid rgba(56,189,248,0.2); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem; font-size:0.82rem; color:#64748b; font-weight:600; }
        @media (max-width:768px) { .footer-top { grid-template-columns:1fr 1fr; } }
        @media (max-width:480px) { .footer-top { grid-template-columns:1fr; } }

        /* ── SCROLL REVEAL ───────────────────────────── */
        .reveal { opacity:0; transform:translateY(28px); transition:opacity 0.6s ease,transform 0.6s ease; }
        .reveal.visible { opacity:1; transform:none; }
    </style>
</head>
<body>

<!-- Binary Rain Canvas -->
<canvas id="binary-rain"></canvas>

<!-- ═══════════════ LIGHTBOX ═══════════════ -->
<div id="lightbox" role="dialog" aria-modal="true" aria-label="Image Lightbox">
    <button id="lightbox-close" aria-label="Close lightbox"><i class="fas fa-times"></i></button>
    <img id="lightbox-img" src="" alt="Gallery image">
    <div id="lightbox-caption">
        <strong id="lightbox-title"></strong>
        <span id="lightbox-sub"></span>
    </div>
    <div class="lightbox-nav">
        <button class="lightbox-btn" id="lb-prev"><i class="fas fa-chevron-left"></i> Previous</button>
        <button class="lightbox-btn" id="lb-next">Next <i class="fas fa-chevron-right"></i></button>
    </div>
</div>

<!-- ═══════════════ SCHOOL BUILDING SHOWCASE MODAL ═══════════════ -->
<div id="building-modal" role="dialog" aria-modal="true" aria-label="J &amp; K Designs Academy School Building Showcase">
    <div class="building-modal-card">
        <button class="building-modal-close" id="building-modal-close" aria-label="Close Building Viewer">
            <i class="fas fa-times"></i>
        </button>
        <div class="building-modal-hero">
            <img
                id="building-modal-img"
                src="{{ asset('images/school-building.svg') }}"
                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1200&q=80';"
                alt="J &amp; K Designs Academy Private School Building, 45 Brooklyn Street, Pretoria"
            >
            <div class="building-modal-hero-overlay"></div>
            <div style="position:absolute;bottom:1.5rem;left:2rem;z-index:2;right:2rem;">
                <span style="background:rgba(8,21,56,0.92);border:1.5px solid var(--cyan);color:var(--cyan);font-size:0.75rem;font-weight:900;padding:0.35rem 1rem;border-radius:999px;letter-spacing:0.1em;text-transform:uppercase;">
                    🏛️ Official Academy Campus Building
                </span>
                <h2 style="font-size:clamp(1.5rem,3.5vw,2.4rem);font-weight:900;color:#ffffff;line-height:1.2;margin-top:0.4rem;">
                    J &amp; K Designs Academy
                </h2>
                <p style="font-size:0.95rem;color:#bae6fd;font-weight:700;margin-top:0.25rem;">
                    📍 45 Brooklyn Street, Brooklyn, Pretoria, 0001, South Africa
                </p>
            </div>
        </div>
        <div class="building-modal-content">
            <p style="color:#bae6fd;font-size:0.95rem;line-height:1.7;">
                Our flagship campus features an imposing modern neoclassical academic building with a grand pillared portico,
                central clock tower, and modern east and west wings. Designed specifically for academic excellence and
                innovation, the facility houses world-class STEM robotics laboratories, digital design studios, a dual-level
                resource library, and extensive championship sporting grounds.
            </p>

            <div class="building-specs-grid">
                <div class="building-spec-box">
                    <i class="fas fa-landmark"></i>
                    <div>
                        <strong>Classical Architecture</strong>
                        <span>Pillared portico &amp; clock tower</span>
                    </div>
                </div>
                <div class="building-spec-box">
                    <i class="fas fa-flask"></i>
                    <div>
                        <strong>Advanced STEM Labs</strong>
                        <span>Robotics, physics &amp; chemistry</span>
                    </div>
                </div>
                <div class="building-spec-box">
                    <i class="fas fa-book-reader"></i>
                    <div>
                        <strong>Resource Library</strong>
                        <span>Executive digital knowledge hub</span>
                    </div>
                </div>
                <div class="building-spec-box">
                    <i class="fas fa-futbol"></i>
                    <div>
                        <strong>Sports Complex</strong>
                        <span>Athletics track &amp; aquatics pool</span>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-top:1.5rem;padding-top:1.2rem;border-top:1px solid rgba(56,189,248,0.25);">
                <a href="https://www.google.com/maps/search/?api=1&query=45+Brooklyn+Street,+Brooklyn,+Pretoria,+South+Africa"
                   target="_blank" rel="noopener" class="btn-primary" style="font-size:0.88rem;padding:0.7rem 1.4rem;">
                    <i class="fas fa-map-marked-alt"></i> Open on Google Maps (Exact Pin)
                </a>
                <a href="https://www.google.com/maps/dir/?api=1&destination=45+Brooklyn+Street,+Brooklyn,+Pretoria,+South+Africa"
                   target="_blank" rel="noopener" class="btn-outline" style="font-size:0.88rem;padding:0.7rem 1.4rem;">
                    <i class="fas fa-directions"></i> Get Driving Directions
                </a>
                <button type="button" class="btn-outline" id="btn-close-building-modal" style="font-size:0.88rem;padding:0.7rem 1.4rem;cursor:pointer;">
                    ✕ Close Viewer
                </button>
            </div>
        </div>
    </div>
</div>

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

        <button class="hamburger" id="ham-btn" aria-label="Toggle navigation" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>

    <div id="mobile-menu" role="navigation">
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
    <div class="hero-bg-img"></div>
    <div class="hero-bg-overlay"></div>
    <div class="hero-dots"></div>
    <div class="hero-glow"></div>
    <div class="hero-content">
        <div class="hero-badge reveal">
            <i class="fas fa-star"></i> Established with a Vision for Excellence
        </div>
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

{{-- ═══════════════ SCHOOL PARTNER BANNER ═══════════════ --}}
<div id="partner-banner">
    <div class="partner-inner">
        <div class="partner-img-col" id="partner-img-col" role="button" tabindex="0" title="Click to view full school building">
            <img
                src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=900&q=80"
                onerror="this.onerror=null; this.src='{{ asset('images/school-building.svg') }}';"
                alt="Prestigious private school building — J &amp; K Designs Academy campus"
                loading="lazy"
            >
            <div class="partner-img-overlay"></div>
            <div class="partner-img-badge">
                <i class="fas fa-eye"></i> CLICK TO VIEW SCHOOL BUILDING
            </div>
        </div>
        <div class="partner-text-col reveal">
            <span class="partner-label"><i class="fas fa-award" style="margin-right:6px"></i> Our Campus &amp; Partners</span>
            <h2 class="partner-title">A World-Class <span>Learning Environment</span></h2>
            <p class="partner-desc">
                J &amp; K Designs Academy operates from a state-of-the-art, purpose-built campus that blends
                modern architecture with an inspiring academic atmosphere. Our partnership with leading South African
                educational institutions ensures every learner receives a globally competitive education, delivered by
                dedicated educators in a safe, stimulating environment.
            </p>
            <div class="partner-tags">
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>UMALUSI Accredited</span>
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>CAPS Aligned</span>
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>DBE Registered</span>
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>IEB Partner</span>
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>Smart Classrooms</span>
                <span class="partner-tag"><i class="fas fa-check-circle" style="color:var(--cyan);margin-right:5px"></i>Digital Portal</span>
            </div>
            <div class="partner-accred">
                <i class="fas fa-shield-alt"></i>
                <div>
                    <strong>Official Educational Institution</strong>
                    <span>Registered &amp; Fully Accredited — South Africa · Est. 2020</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════ ABOUT (NEVER BLANK - GUARANTEED LOCAL GRAPHIC) ═══════════════ --}}
<section id="about">
    <div class="section-inner">
        <div class="about-grid">
            <div class="about-visual reveal">
                <img
                    src="{{ asset('images/campus-about.svg') }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/school-building.svg') }}';"
                    alt="J &amp; K Designs Academy Campus - Established 2020"
                    loading="lazy"
                >
                <div class="about-visual-badge">
                    <strong>Est. 2020</strong>
                    <span>Premier Private Academy · South Africa</span>
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
                ['fas fa-atom',           'Physical Sciences', 'Physics &amp; Chemistry'],
                ['fas fa-language',       'English',           'Home &amp; First Add. Language'],
                ['fas fa-landmark',       'History',           'SA &amp; World History'],
                ['fas fa-globe-africa',   'Geography',         'Physical &amp; Human Geography'],
                ['fas fa-laptop-code',    'Technology',        'Information Tech &amp; CAT'],
                ['fas fa-palette',        'Visual Arts',       'Fine Arts, Design &amp; Crafts'],
                ['fas fa-seedling',       'Agricultural Sci.', 'Farming &amp; Environment'],
                ['fas fa-heartbeat',      'Life Sciences',     'Biology &amp; Human Sciences'],
                ['fas fa-calculator',     'Maths Literacy',    'Practical Maths Skills'],
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
            <p class="section-desc">A glimpse into the vibrant life of our campus, staff, students and sporting champions. Click any photo to view it full screen.</p>
        </div>

        <div class="gallery-tabs reveal">
            <button class="gallery-tab active" data-tab="all">All Photos</button>
            <button class="gallery-tab" data-tab="campus">Campus</button>
            <button class="gallery-tab" data-tab="staff">Staff</button>
            <button class="gallery-tab" data-tab="students">Students</button>
            <button class="gallery-tab" data-tab="sports">Sports</button>
        </div>

        @php
        $gallery = [
            // Campus
            [
                'tab'   => 'campus',
                'img'   => asset('images/school-building.svg'),
                'title' => 'Main Academic Campus Building',
                'sub'   => 'Iconic Private Academy Facade',
            ],
            [
                'tab'   => 'campus',
                'img'   => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=800&q=80',
                'title' => 'Modern School Entrance &amp; Grounds',
                'sub'   => 'State-of-the-Art Facilities',
            ],
            [
                'tab'   => 'campus',
                'img'   => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
                'title' => 'Administration &amp; Faculty Block',
                'sub'   => 'Academic Leadership Centre',
            ],
            [
                'tab'   => 'campus',
                'img'   => 'https://images.unsplash.com/photo-1518281361980-b26bfd556770?auto=format&fit=crop&w=800&q=80',
                'title' => 'School Library &amp; Resource Centre',
                'sub'   => 'Knowledge Hub',
            ],
            // Staff
            [
                'tab'   => 'staff',
                'img'   => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80',
                'title' => 'Teaching Staff Development Day',
                'sub'   => 'Professional Growth',
            ],
            [
                'tab'   => 'staff',
                'img'   => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=800&q=80',
                'title' => 'Faculty Team Planning Session',
                'sub'   => 'Curriculum Alignment',
            ],
            [
                'tab'   => 'staff',
                'img'   => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80',
                'title' => 'Principal &amp; Leadership Governance',
                'sub'   => 'Executive Stewardship',
            ],
            [
                'tab'   => 'staff',
                'img'   => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=800&q=80',
                'title' => 'Staff Awards Evening',
                'sub'   => 'Recognising Excellence',
            ],
            // Students
            [
                'tab'   => 'students',
                'img'   => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=800&q=80',
                'title' => 'Graduation Ceremony 2026',
                'sub'   => 'Celebrating Academic Achievement',
            ],
            [
                'tab'   => 'students',
                'img'   => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=800&q=80',
                'title' => 'Library Study Session',
                'sub'   => 'Academic Focus',
            ],
            [
                'tab'   => 'students',
                'img'   => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80',
                'title' => 'Science &amp; Robotics Laboratory',
                'sub'   => 'Hands-on Learning',
            ],
            [
                'tab'   => 'students',
                'img'   => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=800&q=80',
                'title' => 'Advanced Mathematics Class',
                'sub'   => 'STEM Excellence',
            ],
            // Sports
            [
                'tab'   => 'sports',
                'img'   => 'https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=800&q=80',
                'title' => 'Athletics Championship Day',
                'sub'   => 'Track &amp; Field Champions',
            ],
            [
                'tab'   => 'sports',
                'img'   => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80',
                'title' => 'Basketball League Games',
                'sub'   => 'Inter-School Tournament',
            ],
            [
                'tab'   => 'sports',
                'img'   => 'https://images.unsplash.com/photo-1575361204480-aadea25e6e68?auto=format&fit=crop&w=800&q=80',
                'title' => 'Football Championship Team',
                'sub'   => 'Regional Winners',
            ],
            [
                'tab'   => 'sports',
                'img'   => 'https://images.unsplash.com/photo-1530549387789-4c1017266635?auto=format&fit=crop&w=800&q=80',
                'title' => 'Inter-House Swimming Gala',
                'sub'   => 'Aquatics Week',
            ],
        ];
        @endphp

        <div class="gallery-grid" id="gallery-grid">
            @foreach ($gallery as $index => $item)
                <div class="gallery-item reveal"
                     data-tab="{{ $item['tab'] }}"
                     data-img="{{ $item['img'] }}"
                     data-title="{{ $item['title'] }}"
                     data-sub="{{ $item['sub'] }}"
                     data-index="{{ $index }}"
                     tabindex="0"
                     role="button"
                     aria-label="View {{ $item['title'] }}">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('images/school-building.svg') }}';">
                    <div class="gallery-item-overlay"></div>
                    <div class="gallery-zoom-icon"><i class="fas fa-expand-alt"></i></div>
                    <div class="gallery-item-label">
                        <strong>{!! $item['title'] !!}</strong>
                        <span>{!! $item['sub'] !!}</span>
                    </div>
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
            <p class="section-desc">Keep up with academy news, events, achievements and announcements across all platforms. Click any card to follow us.</p>
        </div>
        <div class="social-grid">
            <a href="https://facebook.com/JKDesignsAcademy" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-facebook" style="color:#1877f2"></i>
                <div class="social-card-name">Facebook</div>
                <div class="social-card-handle">@JKDesignsAcademy</div>
                <span class="social-card-action">Follow us →</span>
            </a>
            <a href="https://instagram.com/jkdesigns_academy" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-instagram" style="color:#e1306c"></i>
                <div class="social-card-name">Instagram</div>
                <div class="social-card-handle">@jkdesigns_academy</div>
                <span class="social-card-action">Follow us →</span>
            </a>
            <a href="https://twitter.com/JKAcademy_ZA" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-twitter" style="color:#1da1f2"></i>
                <div class="social-card-name">Twitter / X</div>
                <div class="social-card-handle">@JKAcademy_ZA</div>
                <span class="social-card-action">Follow us →</span>
            </a>
            <a href="https://youtube.com/@JKDesignsAcademy" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-youtube" style="color:#ff0000"></i>
                <div class="social-card-name">YouTube</div>
                <div class="social-card-handle">J &amp; K Designs Academy</div>
                <span class="social-card-action">Subscribe →</span>
            </a>
            <a href="https://tiktok.com/@jkacademy_za" target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-tiktok"></i>
                <div class="social-card-name">TikTok</div>
                <div class="social-card-handle">@jkacademy_za</div>
                <span class="social-card-action">Follow us →</span>
            </a>
            <a href="https://wa.me/27712345678?text=Hello%20J%20%26%20K%20Designs%20Academy%2C%20I%20would%20like%20to%20enquire%20about%20your%20school." target="_blank" rel="noopener" class="social-card reveal">
                <i class="fab fa-whatsapp" style="color:#25d366"></i>
                <div class="social-card-name">WhatsApp</div>
                <div class="social-card-handle">+27 71 234 5678</div>
                <span class="social-card-action">Chat now →</span>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════ CONTACT & EXACT CAMPUS MAP ═══════════════ --}}
<section id="contact">
    <div class="section-inner">
        <div class="contact-grid">
            {{-- Info column --}}
            <div class="reveal">
                <div class="section-label">Get In Touch</div>
                <h2 class="section-title">Contact <span>the Academy</span></h2>
                <p class="section-desc" style="margin-bottom:1.6rem;">We'd love to hear from you. Reach out for admissions, general enquiries or to schedule a private campus tour.</p>

                @foreach ([
                    ['fas fa-map-marker-alt', 'Physical Address',  '45 Brooklyn Street, Brooklyn, Pretoria<br>Gauteng, South Africa, 0001'],
                    ['fas fa-phone-alt',      'Telephone',         '+27 12 345 6789'],
                    ['fab fa-whatsapp',       'Direct WhatsApp',   '+27 71 234 5678'],
                    ['fas fa-envelope',       'Official Email',    'info@jkdesignsacademy.co.za'],
                    ['fas fa-clock',          'Admissions Office', 'Mon – Fri: 07:30 – 16:30<br>Saturday: 08:00 – 12:00'],
                ] as [$icon, $label, $value])
                    <div class="contact-item">
                        <div class="contact-icon"><i class="{{ $icon }}"></i></div>
                        <div>
                            <strong>{{ $label }}</strong>
                            <span>{!! $value !!}</span>
                        </div>
                    </div>
                @endforeach

                <!-- Prominent School Building Preview Card (Click to View) -->
                <div class="campus-building-card" id="campus-building-card" role="button" tabindex="0" aria-label="View J &amp; K Designs Academy School Building">
                    <div class="campus-building-thumb">
                        <img
                            src="{{ asset('images/school-building.svg') }}"
                            alt="J &amp; K Designs Academy — Private School Building, 45 Brooklyn St, Pretoria"
                            loading="lazy"
                        >
                        <span class="campus-building-badge">
                            <i class="fas fa-expand-alt"></i> CLICK TO VIEW BUILDING
                        </span>
                    </div>
                    <div class="campus-building-info">
                        <h4>🏫 J &amp; K Designs Academy — Private Campus Building</h4>
                        <p>📍 45 Brooklyn Street, Pretoria · Pillared Portico, Clock Tower &amp; Modern Wings</p>
                        <button type="button" class="campus-building-btn" id="btn-view-building-card">
                            <i class="fas fa-eye"></i> View School Building &amp; Architecture
                        </button>
                    </div>
                </div>

                <!-- Exact Google Map showing 45 Brooklyn Street, Pretoria (No Run Around) -->
                <div class="contact-map-wrapper">
                    <div class="contact-map-header">
                        <strong><i class="fas fa-map-pin"></i> J &amp; K Designs Academy Campus</strong>
                        <span>📍 45 Brooklyn St, Pretoria</span>
                    </div>
                    <div class="contact-map">
                        <iframe
                            src="https://maps.google.com/maps?q=45+Brooklyn+Street,+Brooklyn,+Pretoria,+South+Africa&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="J &amp; K Designs Academy Exact Location: 45 Brooklyn Street, Pretoria">
                        </iframe>
                    </div>
                    <div class="contact-map-footer">
                        <button type="button" class="map-btn-link" id="btn-view-building-map">
                            <i class="fas fa-school"></i> View School Building
                        </button>
                        <a href="https://www.google.com/maps/search/?api=1&amp;query=45+Brooklyn+Street,+Brooklyn,+Pretoria,+South+Africa"
                           target="_blank" rel="noopener" class="map-btn-link" title="Open Exact Pin in Google Maps">
                            <i class="fas fa-external-link-alt"></i> Open Exact Pin ↗
                        </a>
                        <a href="https://www.google.com/maps/dir/?api=1&amp;destination=45+Brooklyn+Street,+Brooklyn,+Pretoria,+South+Africa"
                           target="_blank" rel="noopener" class="map-btn-link" title="Get Driving Directions">
                            <i class="fas fa-directions"></i> Directions
                        </a>
                    </div>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="contact-form reveal">
                <h3 style="font-size:1.2rem;font-weight:900;color:var(--white);margin-bottom:0.25rem;">
                    <i class="fas fa-paper-plane" style="color:var(--cyan);margin-right:8px"></i>Send Us a Message
                </h3>
                <p style="font-size:0.85rem;color:#bae6fd;font-weight:500;">Fill in the form below and our admissions team will get back to you within 24 hours.</p>
                <form id="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf_name">Full Name *</label>
                            <input type="text" id="cf_name" placeholder="e.g. Sipho Dlamini" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="cf_email">Email Address *</label>
                            <input type="email" id="cf_email" placeholder="e.g. sipho@email.com" required autocomplete="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf_phone">Phone Number</label>
                            <input type="tel" id="cf_phone" placeholder="+27 71 234 5678" autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <label for="cf_subject">Topic</label>
                            <select id="cf_subject">
                                <option value="">Select a topic</option>
                                <option>Admissions &amp; Enrolment</option>
                                <option>Campus Tour &amp; Visit</option>
                                <option>Academic Information</option>
                                <option>School Fees &amp; Bursaries</option>
                                <option>Sporting &amp; Culture</option>
                                <option>General Enquiry</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cf_message">Message *</label>
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
                        ['https://facebook.com/JKDesignsAcademy',  'fab fa-facebook-f',  ''],
                        ['https://instagram.com/jkdesigns_academy', 'fab fa-instagram',   ''],
                        ['https://twitter.com/JKAcademy_ZA',        'fab fa-twitter',     ''],
                        ['https://youtube.com/@JKDesignsAcademy',   'fab fa-youtube',     ''],
                        ['https://tiktok.com/@jkacademy_za',        'fab fa-tiktok',      ''],
                        ['https://wa.me/27712345678',                'fab fa-whatsapp', 'style="color:#25d366;border-color:rgba(37,211,102,0.4)"'],
                    ] as [$href, $icon, $style])
                        <a href="{{ $href }}" target="_blank" rel="noopener" class="footer-soc-btn" {!! $style !!}><i class="{{ $icon }}"></i></a>
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
                    <li><a href="#social">Connect</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Portals</h4>
                <ul>
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}"><i class="fas fa-user-graduate" style="color:var(--cyan);margin-right:6px"></i>Student Login</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-chalkboard-teacher" style="color:var(--cyan);margin-right:6px"></i>Teacher Login</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-shield-alt" style="color:var(--cyan);margin-right:6px"></i>Admin Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li style="margin-top:0.4rem;"><a href="{{ route('register') }}"><i class="fas fa-user-plus" style="color:var(--cyan);margin-right:6px"></i>Register</a></li>
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
                    <li><a href="#contact"><i class="fas fa-map-marker-alt" style="color:var(--cyan);margin-right:6px;font-size:0.75rem"></i>Find Us (45 Brooklyn St)</a></li>
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
   target="_blank" rel="noopener" class="whatsapp-float" aria-label="Chat with us on WhatsApp">
    <span class="wa-tooltip">Chat with us!</span>
    <i class="fab fa-whatsapp"></i>
</a>

{{-- ═══════════════ JAVASCRIPT ═══════════════ --}}
<script>
// ── Mobile hamburger ───────────────────────────────────────
const hamBtn     = document.getElementById('ham-btn');
const mobileMenu = document.getElementById('mobile-menu');
hamBtn.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    hamBtn.classList.toggle('open', isOpen);
    hamBtn.setAttribute('aria-expanded', isOpen);
});
mobileMenu.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        hamBtn.classList.remove('open');
        hamBtn.setAttribute('aria-expanded', 'false');
    });
});

// ── Scroll reveal (IntersectionObserver) ──────────────────
const revealObs = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add('visible'), i * 50);
            revealObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

// ── Gallery filter tabs ────────────────────────────────────
const galleryItems = Array.from(document.querySelectorAll('#gallery-grid .gallery-item'));

document.querySelectorAll('.gallery-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.gallery-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.dataset.tab;
        galleryItems.forEach(item => {
            const show = filter === 'all' || item.dataset.tab === filter;
            item.style.display = show ? '' : 'none';
        });
    });
});

// ── Lightbox for Gallery ───────────────────────────────────
const lightbox    = document.getElementById('lightbox');
const lbImg       = document.getElementById('lightbox-img');
const lbTitle     = document.getElementById('lightbox-title');
const lbSub       = document.getElementById('lightbox-sub');
const lbClose     = document.getElementById('lightbox-close');
const lbPrev      = document.getElementById('lb-prev');
const lbNext      = document.getElementById('lb-next');
let currentIndex  = 0;
let visibleItems  = [];

function openLightbox(index) {
    visibleItems = galleryItems.filter(el => el.style.display !== 'none');
    currentIndex = visibleItems.indexOf(galleryItems[index]);
    if (currentIndex < 0) currentIndex = 0;
    showLightboxItem(currentIndex);
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function showLightboxItem(idx) {
    const item = visibleItems[idx];
    if (!item) return;
    lbImg.src      = item.dataset.img;
    lbImg.alt      = item.dataset.title;
    lbTitle.textContent = item.dataset.title;
    lbSub.textContent   = item.dataset.sub;
    currentIndex = idx;
}

function closeLightbox() {
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
    lbImg.src = '';
}

galleryItems.forEach(item => {
    item.addEventListener('click', () => openLightbox(parseInt(item.dataset.index)));
    item.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            openLightbox(parseInt(item.dataset.index));
        }
    });
});

lbClose.addEventListener('click', closeLightbox);
lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

lbPrev.addEventListener('click', () => {
    const newIdx = (currentIndex - 1 + visibleItems.length) % visibleItems.length;
    showLightboxItem(newIdx);
});
lbNext.addEventListener('click', () => {
    const newIdx = (currentIndex + 1) % visibleItems.length;
    showLightboxItem(newIdx);
});

// ── School Building Showcase Modal ─────────────────────────
const buildingModal         = document.getElementById('building-modal');
const buildingModalClose    = document.getElementById('building-modal-close');
const btnCloseBuildingModal = document.getElementById('btn-close-building-modal');
const campusBuildingCard    = document.getElementById('campus-building-card');
const btnViewBuildingCard   = document.getElementById('btn-view-building-card');
const btnViewBuildingMap    = document.getElementById('btn-view-building-map');
const partnerImgCol         = document.getElementById('partner-img-col');

function openBuildingModal() {
    if (!buildingModal) return;
    buildingModal.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeBuildingModal() {
    if (!buildingModal) return;
    buildingModal.classList.remove('open');
    document.body.style.overflow = '';
}

[campusBuildingCard, btnViewBuildingCard, btnViewBuildingMap, partnerImgCol].forEach(el => {
    if (el) {
        el.addEventListener('click', (e) => {
            e.stopPropagation();
            openBuildingModal();
        });
        el.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openBuildingModal();
            }
        });
    }
});

if (buildingModalClose)    buildingModalClose.addEventListener('click', closeBuildingModal);
if (btnCloseBuildingModal) btnCloseBuildingModal.addEventListener('click', closeBuildingModal);
if (buildingModal) {
    buildingModal.addEventListener('click', (e) => {
        if (e.target === buildingModal) closeBuildingModal();
    });
}

// ── Shared Keyboard Handler (ESC & Arrows) ─────────────────
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        if (lightbox && lightbox.classList.contains('open')) closeLightbox();
        if (buildingModal && buildingModal.classList.contains('open')) closeBuildingModal();
    }
    if (lightbox && lightbox.classList.contains('open')) {
        if (e.key === 'ArrowLeft')  lbPrev.click();
        if (e.key === 'ArrowRight') lbNext.click();
    }
});

// ── Binary Rain Canvas ─────────────────────────────────────
(function() {
    const canvas = document.getElementById('binary-rain');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let width  = canvas.width  = window.innerWidth;
    let height = canvas.height = window.innerHeight;

    window.addEventListener('resize', () => {
        width  = canvas.width  = window.innerWidth;
        height = canvas.height = window.innerHeight;
    });

    const chars    = '01';
    const fontSize = 14;
    const columns  = Math.floor(width / fontSize);
    const drops    = Array(columns).fill(1);

    function drawRain() {
        ctx.fillStyle = 'rgba(8, 21, 56, 0.08)';
        ctx.fillRect(0, 0, width, height);
        ctx.fillStyle = '#22d3ee';
        ctx.font      = fontSize + 'px monospace';
        for (let i = 0; i < drops.length; i++) {
            const text = chars.charAt(Math.floor(Math.random() * chars.length));
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);
            if (drops[i] * fontSize > height && Math.random() > 0.975) drops[i] = 0;
            drops[i]++;
        }
    }
    setInterval(drawRain, 55);
})();

// ── Contact Form (Interactive Demo with Validation) ────────
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const notice = document.getElementById('form-notice');
    const btn    = this.querySelector('.btn-submit');
    const name   = document.getElementById('cf_name').value.trim();
    const email  = document.getElementById('cf_email').value.trim();
    const msg    = document.getElementById('cf_message').value.trim();

    notice.style.display = 'none';
    notice.className     = '';

    if (!name || !email || !msg) {
        notice.className     = 'error';
        notice.textContent   = '⚠ Please fill in your name, email and message.';
        notice.style.display = 'block';
        return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        notice.className     = 'error';
        notice.textContent   = '⚠ Please enter a valid email address.';
        notice.style.display = 'block';
        return;
    }

    btn.disabled       = true;
    btn.innerHTML      = '<i class="fas fa-spinner fa-spin"></i> Sending…';

    setTimeout(() => {
        notice.className     = 'success';
        notice.textContent   = '✓ Thank you ' + name + '! Your message has been received by our Pretoria admissions office. We\'ll contact you within 24 hours.';
        notice.style.display = 'block';
        this.reset();
        btn.disabled  = false;
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
    }, 1200);
});
</script>
</body>
</html>
