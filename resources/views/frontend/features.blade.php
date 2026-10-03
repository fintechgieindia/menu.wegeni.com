@php
    $meta = [
        'title' => 'Restaurant Billing Software Features | Geni Menu POS, KOT, Inventory',
        'description' => 'Explore Geni Menu features: POS billing, KOT, table & reservation management, inventory, staff roles, multi-branch, kiosk ordering & real-time reports.',
        'keywords' => 'restaurant ERP features, restaurant POS features, KOT software, kitchen order ticket software, table management software, reservation management software, restaurant inventory software, restaurant staff management software, multi-branch restaurant software, kiosk ordering software, restaurant CRM features, restaurant reporting software, QR code menu ordering, restaurant billing features list, restaurant software modules, Geni Menu features, Geni Menu KOT system, Geni Menu inventory management, restaurant software feature list India',
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts (same as homepage) --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,650&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- AOS --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
  :root {
    --br: #876039;
    --br-dark: #6f4e2d;
    --br-light: #f4efe9;
    --bg2: #f9f6f0;
    --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
    --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
    --shadow-lg: 0 26px 50px rgba(36, 26, 20, 0.12);
  }

  /* ===================== BUTTONS ===================== */
  .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1.5px solid #876039; transition: .25s ease; cursor: pointer; text-decoration: none; }
  .btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
  .btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
  .btn.o { color: #876039; background: #fff; }
  .btn.o:hover { background: #876039; color: #fff; transform: translateY(-2px); }

  /* ===== SAME DESIGN SYSTEM AS HOMEPAGE ===== */
  :root{
    --cream:#FAF6EF;
    --cream:#FAF6EF;
    --cream-deep:#F1E8D9;
    --ink:#2A2420;
    --ink-soft:#645B51;
    --ink-faint:#8B8177;
    --gold:#C79A61;
    --gold-soft:#DCB98A;
    --gold-deep:#9C6F3E;
    --brown:#4A3524;
    --line:#E2D5C0;
    --white:#FFFEFC;
    --max:1180px;
  }
  *{box-sizing:border-box;}
  .ft-page{
    background:var(--cream);
    color:var(--ink);
    font-family:'Inter',sans-serif;
    font-size:16px;
    line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ft-page img,.ft-page svg{display:block;max-width:100%;}
  .ft-page a{color:inherit;text-decoration:none;}
  .ft-page ul{list-style:none;padding:0;margin:0;}
  .ft-page .wrap{max-width:var(--max);margin:0 auto;padding:0 32px;position:relative;z-index:1;}
  .ft-page h1,.ft-page h2,.ft-page h3{font-family:'Fraunces',serif;font-weight:560;color:var(--ink);letter-spacing:-0.01em;}

  /* ===== BREADCRUMB ===== */
  .ft-breadcrumb{
    background:var(--cream);
    border-bottom:1px solid var(--line);
    padding:90px 0 12px;
  }
  .ft-breadcrumb-inner{
    display:flex;align-items:center;gap:8px;
    font-size:0.9rem;color:var(--ink-faint);
  }
  .ft-breadcrumb-inner a{color:var(--ink-soft);font-weight:500;}
  .ft-breadcrumb-inner a:hover{color:var(--ink);}
  .ft-breadcrumb-inner .active{color:var(--brown);font-weight:600;}

  /* ===== HERO SECTION ===== */
  .ft-hero{
    position:relative;
    padding:70px 0 85px;
    background:var(--cream);
    overflow:hidden;
    border-bottom:1px solid var(--line);
  }
  .ft-hero .wrap{
    max-width:1320px;
  }
  .ft-hero-grid{
    display:grid;
    grid-template-columns:1.05fr 0.95fr;
    gap:48px;
    align-items:center;
    position:relative;
    z-index:1;
  }
  .ft-hero-left{
    opacity:0;
    transform:translateY(18px);
    animation:ftrise .8s cubic-bezier(.2,.7,.2,1) .15s forwards;
    z-index:2;
  }
  @keyframes ftrise{to{opacity:1;transform:translateY(0);}}

  .ft-hero-kicker{
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-size:12px;
    font-weight:700;
    letter-spacing:.12em;
    color:#A87948;
    text-transform:uppercase;
    margin-bottom:16px;
  }
  .ft-hero-kicker-line{width:26px;height:1.5px;background:#C59B6D;}

  .ft-hero-title{
    font-family:'Fraunces',serif;
    font-size:clamp(2.3rem,4.2vw,3.5rem);
    font-weight:700;
    color:#1A130E;
    line-height:1.12;
    margin:0 0 16px;
    letter-spacing:-.015em;
  }

  .ft-hero-desc{
    color:#615347;
    font-size:1.02rem;
    line-height:1.65;
    max-width:52ch;
    margin:0 0 28px;
  }

  /* 8 Feature Badges */
  .ft-hero-badges{
    display:flex;
    flex-wrap:wrap;
    gap:12px 14px;
    margin-bottom:34px;
  }
  .ft-hero-badge-item{
    display:inline-flex;
    flex-direction:column;
    align-items:center;
    gap:6px;
    text-align:center;
    cursor:pointer;
    min-width:64px;
  }
  .ft-hero-badge-box{
    width:52px;
    height:52px;
    border-radius:50%;
    background:#F3EAE0;
    border:1px solid #EAE0D3;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#7A4E22;
    transition:transform .2s ease, background .2s ease, box-shadow .2s ease;
  }
  .ft-hero-badge-item:hover .ft-hero-badge-box{
    background:#E6D5C3;
    transform:translateY(-2px);
    box-shadow:0 6px 14px rgba(92,62,33,0.12);
  }
  .ft-hero-badge-box svg{
    width:22px;height:22px;
    stroke:currentColor;fill:none;stroke-width:1.8;
    stroke-linecap:round;stroke-linejoin:round;
  }
  .ft-hero-badge-lbl{
    font-size:0.75rem;font-weight:600;color:#5C4E42;line-height:1.2;
  }

  /* Buttons */
  .ft-hero-btns{
    display:flex;gap:14px;flex-wrap:wrap;align-items:center;margin-bottom:34px;
  }
  .ft-hero-btn-dark{
    display:inline-flex;align-items:center;gap:10px;
    background:#4A3222;color:#FFFFFF;font-weight:700;font-size:.95rem;
    padding:14px 28px;border-radius:50px;text-decoration:none;
    transition:background .2s, transform .2s;
    box-shadow:0 6px 18px rgba(74,50,34,.22);
  }
  .ft-hero-btn-dark:hover{background:#382417;color:#fff;transform:translateY(-1px);}

  /* 3 Bottom trust points */
  .ft-hero-trust-row{
    display:flex;align-items:center;gap:24px;flex-wrap:wrap;
    padding-top:16px;border-top:1px solid rgba(197,155,109,0.25);
  }
  .ft-hero-trust-item{
    display:inline-flex;align-items:center;gap:8px;
    font-size:0.88rem;font-weight:600;color:#615042;
  }
  .ft-hero-trust-item svg{
    width:18px;height:18px;stroke:#C59B6D;fill:none;stroke-width:2;
    stroke-linecap:round;stroke-linejoin:round;
  }

  /* RIGHT HERO VISUAL */
  .ft-hero-right{
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .ft-hero-right img{
    width:100%;
    max-width:640px;
    height:auto;
    display:block;
    filter:drop-shadow(0 15px 35px rgba(42,24,10,0.12));
    transition:transform .3s ease;
  }
  .ft-hero-right:hover img{transform:scale(1.015);}

  /* Responsive hero */
  @media(max-width:1080px){
    .ft-hero-grid{grid-template-columns:1fr;gap:48px;}
    .ft-hero{padding:56px 0 64px;}
    .ft-hero-right{justify-content:center;}
    .ft-hero-right img{max-width:560px;}
  }
  @media(max-width:640px){
    .ft-hero{padding:44px 0 50px;}
    .ft-hero-btns{flex-direction:column;align-items:stretch;}
    .ft-hero-btn-dark{justify-content:center;}
    .ft-hero-badges{gap:8px 8px;justify-content:center;}
    .ft-hero-badge-item{min-width:58px;}
    .ft-hero-badge-box{width:46px;height:46px;}
    .ft-hero-trust-row{flex-direction:column;align-items:flex-start;gap:12px;}
  }
  @media(max-width:768px){
    .ft-hero-deco,.ft-hero-deco-icon{display:none !important;}
  }

  /* ===== 02B REAL-TIME ACCESS SECTION ===== */
  .ft-rta-section{
    position:relative;
    padding:85px 0 95px;
    background:linear-gradient(135deg, #FAF6EF 0%, #F5ECE1 50%, #EFE4D4 100%);
    overflow:hidden;
    border-bottom:1px solid var(--line);
  }
  .ft-rta-section .wrap{
    max-width:1320px;
  }
  .ft-rta-grid{
    display:grid;
    grid-template-columns:1.1fr 0.9fr;
    gap:48px;
    align-items:center;
    position:relative;
    z-index:2;
  }
  .ft-rta-left{
    position:relative;
    z-index:2;
  }
  .ft-rta-kicker{
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-size:12px;
    font-weight:700;
    letter-spacing:.12em;
    color:#A87948;
    text-transform:uppercase;
    margin-bottom:14px;
  }
  .ft-rta-kicker-line{
    width:26px;
    height:1.5px;
    background:#C59B6D;
  }
  .ft-rta-title{
    font-family:'Fraunces',serif;
    font-size:clamp(2.3rem,4.2vw,3.4rem);
    font-weight:700;
    color:#1A130E;
    line-height:1.14;
    margin:0 0 16px;
    letter-spacing:-.015em;
  }
  .ft-rta-desc{
    color:#615347;
    font-size:1.02rem;
    line-height:1.65;
    max-width:54ch;
    margin:0 0 32px;
  }

  /* 6 Feature Cards Grid */
  .ft-rta-cards-grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:16px;
    margin-bottom:34px;
  }
  .ft-rta-card{
    background:#FFFEFC;
    border:1.5px solid #EAE0D3;
    border-radius:18px;
    padding:20px 18px;
    box-shadow:0 4px 16px rgba(74,53,36,0.04);
    transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    display:flex;
    flex-direction:column;
  }
  .ft-rta-card:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 28px rgba(74,53,36,0.1);
    border-color:#C79A61;
  }
  .ft-rta-icon-box{
    width:42px;
    height:42px;
    border-radius:12px;
    background:#F7EFE5;
    border:1px solid #EADBCA;
    color:#9C6F3E;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:14px;
    flex-shrink:0;
  }
  .ft-rta-icon-box svg{
    width:22px;
    height:22px;
    stroke:currentColor;
    fill:none;
    stroke-width:1.8;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-rta-card-title{
    font-family:'Inter',sans-serif;
    font-weight:700;
    font-size:0.96rem;
    color:#2A2018;
    margin:0 0 6px 0;
    line-height:1.25;
  }
  .ft-rta-card-desc{
    font-size:0.83rem;
    color:#645B51;
    line-height:1.45;
    margin:0;
  }

  .ft-rta-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    background:#4A3222;
    color:#FFFFFF;
    font-weight:700;
    font-size:0.95rem;
    padding:14px 30px;
    border-radius:50px;
    text-decoration:none;
    box-shadow:0 6px 18px rgba(74,50,34,0.22);
    transition:background 0.2s, transform 0.2s;
  }
  .ft-rta-btn:hover{
    background:#382417;
    color:#FFFFFF;
    transform:translateY(-1px);
  }

  /* Right Visual Container */
  .ft-rta-right{
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .ft-rta-right img{
    width:100%;
    max-width:680px;
    height:auto;
    display:block;
    filter:drop-shadow(0 15px 35px rgba(42,24,10,0.12));
    transition:transform 0.3s ease;
    border-radius:20px;
  }
  .ft-rta-right:hover img{
    transform:scale(1.015);
  }

  @media(max-width:1120px){
    .ft-rta-grid{grid-template-columns:1fr;gap:40px;}
    .ft-rta-section{padding:60px 0 70px;}
    .ft-rta-right{justify-content:center;}
  }
  @media(max-width:768px){
    .ft-rta-cards-grid{grid-template-columns:repeat(2, 1fr);gap:14px;}
  }
  @media(max-width:540px){
    .ft-rta-cards-grid{grid-template-columns:1fr;}
    .ft-rta-btn{width:100%;justify-content:center;}
  }


  /* ===== 02C CONNECTED SUITE / INTERACTIVE 17-MODULE RING ===== */
  .ft-suite-section{
    position:relative;
    padding:85px 0 95px;
    background:#FAF6EF;
    overflow:hidden;
    border-bottom:1px solid var(--line);
    text-align:center;
  }
  .ft-suite-section .wrap{
    max-width:1320px;
  }
  .ft-suite-head{
    max-width:760px;
    margin:0 auto 20px;
    position:relative;
    z-index:2;
  }
  .ft-suite-kicker{
    display:inline-flex;
    align-items:center;
    gap:12px;
    font-size:0.8rem;
    font-weight:700;
    letter-spacing:0.14em;
    color:var(--gold-deep);
    text-transform:uppercase;
    margin-bottom:12px;
  }
  .ft-suite-kicker-line{
    width:28px;
    height:1.5px;
    background:var(--gold-deep);
  }
  .ft-suite-title{
    font-family:'Fraunces',serif;
    font-size:clamp(2.3rem,4.2vw,3.3rem);
    font-weight:700;
    color:var(--ink);
    line-height:1.15;
    margin-bottom:8px;
    letter-spacing:-0.015em;
  }
  .ft-suite-sub{
    font-family:'Fraunces',serif;
    font-size:clamp(1.15rem,2.1vw,1.5rem);
    font-weight:600;
    color:var(--gold-deep);
    margin-bottom:10px;
  }
  .ft-suite-desc{
    font-size:1rem;
    color:var(--ink-soft);
    line-height:1.6;
    max-width:58ch;
    margin:0 auto;
  }

  /* Orbit Stage on Desktop */
  .ft-suite-stage{
    position:relative;
    max-width:1260px;
    height:680px;
    margin:30px auto 10px;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .ft-suite-orbit-svg{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    pointer-events:none;
    z-index:1;
  }
  .ft-suite-node{
    position:absolute;
    transform:translate(-50%, -50%);
    width:58px;
    height:58px;
    border-radius:50%;
    background:#FFFFFF;
    border:1.5px solid #E6D8C8;
    box-shadow:0 4px 14px rgba(42,32,24,0.08);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:all 0.28s cubic-bezier(0.2, 0.8, 0.2, 1);
    z-index:4;
    padding:0;
    outline:none;
    user-select:none;
    text-decoration:none;
  }
  .ft-suite-node:hover{
    transform:translate(-50%, -50%) scale(1.14);
    border-color:var(--gold);
    box-shadow:0 8px 22px rgba(199,154,97,0.25);
    z-index:7;
  }
  .ft-suite-node.active{
    background:linear-gradient(145deg, #4A3222 0%, #291B10 100%);
    border-color:#C79A61;
    box-shadow:0 0 0 5px rgba(199,154,97,0.28), 0 12px 28px rgba(42,24,10,0.35);
    transform:translate(-50%, -50%) scale(1.18);
    z-index:8;
  }
  .ft-suite-node-icon{
    width:20px;
    height:20px;
    color:#645B51;
    transition:color 0.2s ease, transform 0.2s ease;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .ft-suite-node-icon svg{
    width:18px;
    height:18px;
    stroke:currentColor;
    fill:none;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-suite-node.active .ft-suite-node-icon{
    color:#FFFFFF;
    transform:scale(1.05);
  }
  .ft-suite-node-num{
    font-size:9.5px;
    font-weight:700;
    color:#9C6F3E;
    line-height:1;
    margin-top:2px;
    transition:color 0.2s ease;
  }
  .ft-suite-node.active .ft-suite-node-num{
    color:#E0BE95;
  }
  .ft-suite-node-label{
    position:absolute;
    bottom:-19px;
    left:50%;
    transform:translateX(-50%);
    white-space:nowrap;
    font-size:10.5px;
    font-weight:600;
    color:#524538;
    pointer-events:none;
    text-shadow:0 1px 3px rgba(255,255,255,0.9);
    transition:color 0.2s ease, font-weight 0.2s ease;
  }
  .ft-suite-node.active .ft-suite-node-label{
    color:#2A2018;
    font-weight:750;
  }

  /* Center Card */
  .ft-suite-card{
    position:absolute;
    left:50%;
    top:50%;
    transform:translate(-50%, -50%);
    width:650px;
    max-width:53%;
    background:#FFFEFC;
    border:1px solid #E9DDCE;
    border-radius:20px;
    box-shadow:0 22px 60px rgba(42,24,10,0.1), 0 2px 10px rgba(0,0,0,0.03);
    padding:22px 26px;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    align-items:center;
    z-index:5;
    text-align:left;
    transition:all 0.3s ease;
  }
  .ft-card-info{
    display:flex;
    flex-direction:column;
    gap:10px;
  }
  .ft-card-num-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:32px;
    height:32px;
    border-radius:50%;
    background:#F5EBE1;
    color:#4A3222;
    font-family:'Fraunces',serif;
    font-weight:700;
    font-size:14px;
    border:1px solid #E5D5C4;
  }
  .ft-card-title{
    font-family:'Fraunces',serif;
    font-size:1.45rem;
    font-weight:700;
    color:#2A2018;
    line-height:1.2;
    margin:0;
  }
  .ft-card-sub{
    font-size:0.86rem;
    color:#645B51;
    line-height:1.38;
    margin:0;
  }
  .ft-card-points{
    display:flex;
    flex-direction:column;
    gap:6px;
    margin-top:2px;
  }
  .ft-card-point{
    display:flex;
    align-items:flex-start;
    gap:8px;
    font-size:0.82rem;
    color:#3D332A;
    line-height:1.3;
  }
  .ft-card-point-icon{
    width:16px;
    height:16px;
    border-radius:50%;
    background:#4A3222;
    color:#FFFFFF;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    margin-top:1px;
  }
  .ft-card-point-icon svg{
    width:10px;
    height:10px;
    stroke:currentColor;
    fill:none;
    stroke-width:3;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-card-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    align-self:flex-start;
    background:#4A3222;
    color:#FFFFFF;
    font-size:0.82rem;
    font-weight:600;
    padding:8px 18px;
    border-radius:999px;
    margin-top:4px;
    transition:all 0.2s ease;
    text-decoration:none;
  }
  .ft-card-btn:hover{
    background:#2A1C12;
    color:#FAF6EF;
    transform:translateX(3px);
  }

  /* Right Visual Container */
  .ft-card-visual{
    position:relative;
    background:#FAF5EE;
    border:1px solid #EBE0D2;
    border-radius:16px;
    padding:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    min-height:220px;
    overflow:hidden;
  }
  .ft-card-img{
    max-width:100%;
    max-height:200px;
    width:auto;
    height:auto;
    object-fit:contain;
    border-radius:10px;
    transition:opacity 0.25s ease, transform 0.25s ease;
    box-shadow:0 6px 20px rgba(42,24,10,0.06);
  }
  .ft-card-tooltip{
    position:absolute;
    bottom:8px;
    right:8px;
    background:rgba(255, 253, 249, 0.96);
    border:1px solid #E5D5C4;
    border-radius:10px;
    padding:5px 10px;
    display:flex;
    align-items:center;
    gap:6px;
    box-shadow:0 4px 12px rgba(42,32,24,0.08);
    backdrop-filter:blur(6px);
    max-width:88%;
  }
  .ft-card-tooltip-icon{
    width:20px;
    height:20px;
    border-radius:5px;
    background:#F0E4D5;
    color:#4A3222;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }
  .ft-card-tooltip-icon svg{
    width:13px;
    height:13px;
    stroke:currentColor;
    fill:none;
    stroke-width:2.2;
  }
  .ft-card-tooltip-text{
    font-size:0.75rem;
    font-weight:600;
    color:#362B22;
    line-height:1.25;
    text-align:left;
  }

  /* Navigation Arrows on card */
  .ft-suite-arrows{
    position:absolute;
    bottom:-18px;
    right:28px;
    display:flex;
    gap:8px;
    z-index:10;
  }
  .ft-suite-arrow-btn{
    width:36px;
    height:36px;
    border-radius:50%;
    background:#FFFFFF;
    border:1.5px solid #E2D5C0;
    color:#4A3222;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    box-shadow:0 3px 10px rgba(42,32,24,0.1);
    transition:all 0.2s ease;
  }
  .ft-suite-arrow-btn:hover{
    background:#4A3222;
    color:#FFFFFF;
    border-color:#4A3222;
    transform:scale(1.08);
  }

  /* Mobile/Tablet Fallback (< 1080px) */
  .ft-suite-mobile-rail-wrap{
    display:none;
  }
  @media(max-width:1080px){
    .ft-suite-stage{
      height:auto;
      display:block;
      max-width:760px;
      margin:10px auto 0;
      position:static;
    }
    .ft-suite-orbit-svg{
      display:none;
    }
    .ft-suite-node{
      display:none;
    }
    .ft-suite-mobile-rail-wrap{
      display:block;
      max-width:760px;
      margin:0 auto 16px;
      position:relative;
    }
    .ft-suite-mobile-rail{
      display:flex;
      gap:10px;
      overflow-x:auto;
      padding:6px 4px 14px;
      scroll-snap-type:x mandatory;
      -webkit-overflow-scrolling:touch;
      scrollbar-width:thin;
      scrollbar-color:#DCB98A transparent;
    }
    .ft-suite-mobile-rail::-webkit-scrollbar{
      height:5px;
    }
    .ft-suite-mobile-rail::-webkit-scrollbar-thumb{
      background:#DCB98A;
      border-radius:10px;
    }
    .ft-suite-rail-pill{
      scroll-snap-align:start;
      display:flex;
      align-items:center;
      gap:8px;
      background:#FFFFFF;
      border:1.5px solid #E5D5C4;
      border-radius:40px;
      padding:8px 16px;
      font-size:0.86rem;
      font-weight:600;
      color:#4A3524;
      cursor:pointer;
      white-space:nowrap;
      flex-shrink:0;
      box-shadow:0 3px 8px rgba(42,32,24,0.05);
      transition:all 0.2s ease;
    }
    .ft-suite-rail-pill.active{
      background:linear-gradient(135deg, #4A3222 0%, #291B10 100%);
      color:#FFFFFF;
      border-color:#C79A61;
      box-shadow:0 4px 14px rgba(74,50,34,0.25);
    }
    .ft-suite-rail-pill-num{
      font-size:10px;
      font-weight:700;
      color:#9C6F3E;
    }
    .ft-suite-rail-pill.active .ft-suite-rail-pill-num{
      color:#E0BE95;
    }
    .ft-suite-rail-pill svg{
      width:16px;
      height:16px;
      stroke:currentColor;
      fill:none;
      stroke-width:2;
    }
    .ft-suite-card{
      position:static;
      transform:none;
      width:100%;
      max-width:100%;
      grid-template-columns:1fr;
      padding:24px 20px;
      gap:20px;
    }
    .ft-suite-arrows{
      position:static;
      justify-content:center;
      margin-top:14px;
    }
  }

  .ft-suite-strip{
    background:#F3EAE0;
    border:1px solid #E5D5C4;
    border-radius:60px;
    padding:18px 40px;
    display:flex;
    align-items:center;
    justify-content:space-around;
    gap:24px;
    max-width:960px;
    margin:40px auto 0;
    box-shadow:0 4px 15px rgba(74,50,34,0.06);
    position:relative;
    z-index:2;
  }
  .ft-suite-strip-item{
    display:flex;
    align-items:center;
    gap:14px;
    text-align:left;
  }
  .ft-suite-strip-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:#4A3222;
    color:#FFFFFF;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }
  .ft-suite-strip-icon svg{
    width:20px;
    height:20px;
    stroke:currentColor;
    fill:none;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-suite-strip-text h4{
    font-family:'Inter',sans-serif;
    font-size:0.96rem;
    font-weight:700;
    color:#2A2018;
    margin:0 0 2px;
    line-height:1.2;
  }
  .ft-suite-strip-text p{
    font-size:0.84rem;
    color:#645B51;
    margin:0;
    line-height:1.3;
  }
  @media(max-width:880px){
    .ft-suite-strip{
      flex-direction:column;
      border-radius:24px;
      padding:24px;
      align-items:flex-start;
      gap:18px;
    }
    .ft-suite-section{padding:60px 0 60px;}
  }

  /* ===== FEATURES LIST SECTION ===== */
  .ft-features-section{
    padding:80px 0;background:var(--white);
    border-top:1px solid var(--line);
  }
  .ft-feature-row{
    display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;
    padding:56px 0;border-top:1px solid var(--line);
  }
  .ft-feature-row:first-child{border-top:none;padding-top:0;}
  .ft-feature-row.reverse .ft-fr-text{order:2;}
  .ft-feature-row.reverse .ft-fr-visual{order:1;}
  @media(max-width:920px){
    .ft-feature-row{grid-template-columns:1fr;gap:32px;padding:44px 0;}
    .ft-feature-row.reverse .ft-fr-text{order:1;}
    .ft-feature-row.reverse .ft-fr-visual{order:2;}
  }

  .ft-fr-kicker{
    font-size:0.78rem;font-weight:800;letter-spacing:0.08em;text-transform:uppercase;
    color:var(--gold-deep);margin-bottom:10px;
  }
  .ft-fr-text h3{
    font-family:'Fraunces',serif;font-size:clamp(1.65rem,2.4vw,2.1rem);
    font-weight:650;color:var(--ink);line-height:1.25;margin-bottom:12px;
  }
  .ft-fr-desc{
    font-size:0.96rem;color:var(--ink-soft);line-height:1.6;margin-bottom:24px;
  }
  .ft-fr-items{display:flex;flex-direction:column;gap:12px;margin-bottom:28px;}
  .ft-fr-item{
    display:flex;align-items:center;gap:12px;font-size:0.94rem;font-weight:550;color:var(--ink);
  }
  .ft-fr-icon-box{
    width:26px;height:26px;border-radius:7px;
    background:rgba(199,154,97,0.16);color:var(--gold-deep);
    display:flex;align-items:center;justify-content:center;flex-shrink:0;
    border:1px solid rgba(199,154,97,0.28);
  }
  .ft-fr-icon-box svg{width:14px;height:14px;}
  .ft-fr-link{
    display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:0.95rem;
    color:var(--gold-deep);text-decoration:none;cursor:pointer;transition:all .2s ease;
  }
  .ft-fr-link:hover{color:var(--brown);transform:translateX(4px);}

  .ft-fr-visual-card{
    border-radius:20px;overflow:hidden;
    box-shadow:0 10px 30px -6px rgba(74,53,36,0.1);
    border:1px solid var(--line);background:var(--cream);
    transition:transform .3s ease, box-shadow .3s ease;
  }
  .ft-fr-visual-card:hover{
    transform:translateY(-4px);box-shadow:0 18px 40px -8px rgba(74,53,36,0.16);
  }
  .ft-fr-visual-card img{
    width:100%;height:auto;display:block;object-fit:cover;
  }

  /* ===== ROLES ACROSS RESTAURANT SECTION ===== */
  .ft-roles-section{
    background:#FAF6EF;
    padding:96px 0 90px;
    position:relative;
    overflow:hidden;
    border-top:1px solid var(--line);
    border-bottom:1px solid var(--line);
  }
  .ft-roles-head{
    text-align:center;
    max-width:780px;
    margin:0 auto 56px;
    position:relative;
  }
  .ft-roles-kicker{
    display:inline-flex;
    align-items:center;
    gap:12px;
    font-size:0.78rem;
    font-weight:800;
    letter-spacing:0.16em;
    text-transform:uppercase;
    color:var(--gold-deep);
    margin-bottom:14px;
  }
  .ft-roles-line{
    width:32px;
    height:1.5px;
    background:var(--gold-deep);
    display:inline-block;
  }
  .ft-roles-head h2{
    font-family:'Fraunces',serif;
    font-size:clamp(2.1rem,3.6vw,2.9rem);
    font-weight:650;
    color:var(--ink);
    line-height:1.16;
    margin-bottom:14px;
    letter-spacing:-0.015em;
  }
  .ft-roles-head p{
    font-size:1.02rem;
    color:var(--ink-soft);
    line-height:1.6;
  }

  .ft-roles-handwriting{
    position:absolute;
    top:0px;
    font-family:'Caveat',cursive;
    font-size:1.45rem;
    color:#9C6F3E;
    line-height:1.25;
    opacity:0.85;
    pointer-events:none;
    user-select:none;
    display:flex;
    flex-direction:column;
  }
  .ft-roles-hw-left{
    left:-20px;
    transform:rotate(-7deg);
    text-align:left;
  }
  .ft-roles-hw-right{
    right:-20px;
    transform:rotate(6deg);
    text-align:right;
  }
  @media (max-width:1160px){
    .ft-roles-handwriting{display:none;}
  }

  .ft-roles-grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:24px;
    position:relative;
    z-index:2;
  }
  @media(max-width:1024px){
    .ft-roles-grid{
      grid-template-columns:repeat(2, 1fr);
      gap:20px;
    }
  }
  @media(max-width:680px){
    .ft-roles-grid{
      grid-template-columns:1fr;
      gap:18px;
    }
  }

  .ft-role-card{
    background:#FFFEFC;
    border:1.5px solid #EAE0D3;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 4px 20px rgba(74,53,36,0.05);
    display:flex;
    justify-content:space-between;
    align-items:stretch;
    transition:transform 0.24s ease, box-shadow 0.24s ease, border-color 0.24s ease;
    position:relative;
    min-height:220px;
  }
  .ft-role-card:hover{
    transform:translateY(-4px);
    box-shadow:0 14px 34px -4px rgba(74,53,36,0.12);
    border-color:#DCB98A;
  }

  .ft-role-content{
    flex:1;
    padding:22px 14px 20px 22px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    z-index:2;
  }

  .ft-role-header-row{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:8px;
  }
  .ft-role-icon-circle{
    width:34px;
    height:34px;
    border-radius:50%;
    background:#FAF3E8;
    border:1.5px solid #DFC49F;
    color:#9C6F3E;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }
  .ft-role-title{
    font-family:'Fraunces',serif;
    font-size:1.25rem;
    font-weight:650;
    color:var(--ink);
    line-height:1.2;
    margin:0;
  }
  .ft-role-desc{
    font-size:0.86rem;
    color:var(--ink-soft);
    line-height:1.45;
    margin-bottom:12px;
  }

  .ft-role-pills{
    display:flex;
    flex-wrap:wrap;
    gap:6px;
    margin-bottom:16px;
  }
  .ft-role-pill{
    display:inline-block;
    padding:3px 10px;
    border-radius:999px;
    background:#F5EDE2;
    font-size:0.74rem;
    font-weight:600;
    color:#6E5339;
    letter-spacing:0.01em;
  }

  .ft-role-link{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:0.88rem;
    font-weight:700;
    color:var(--ink);
    text-decoration:none;
    transition:color 0.18s ease, transform 0.18s ease;
    margin-top:auto;
    cursor:pointer;
  }
  .ft-role-link:hover{
    color:var(--gold-deep);
    transform:translateX(3px);
  }
  .ft-role-link .arr{
    color:var(--gold-deep);
    font-size:1rem;
    transition:transform 0.18s ease;
  }
  .ft-role-link:hover .arr{
    transform:translateX(2px);
  }

  .ft-role-visual-side{
    width:140px;
    position:relative;
    flex-shrink:0;
    display:flex;
    align-items:flex-end;
    justify-content:flex-end;
    overflow:hidden;
  }
  .ft-role-visual-side img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center bottom;
    display:block;
  }
  @media(max-width:480px){
    .ft-role-card{
      flex-direction:column;
    }
    .ft-role-visual-side{
      width:100%;
      height:160px;
    }
  }

  /* ===== BOTTOM CTA ===== */
  .ft-bottom-cta{
    background:linear-gradient(135deg, var(--brown) 0%, #26160A 100%);
    color:#FFFFFF;border-radius:28px;padding:56px 36px;
    margin:0 auto 70px;max-width:var(--max);
    position:relative;overflow:hidden;text-align:center;
    box-shadow:0 20px 50px -10px rgba(58,35,18,0.4);
  }
  .ft-bottom-cta::before{
    content:'';position:absolute;top:-60px;right:-60px;width:240px;height:240px;
    background:radial-gradient(circle, rgba(200,125,50,0.25) 0%, rgba(200,125,50,0) 70%);
    border-radius:50%;pointer-events:none;
  }
  @media(max-width:768px){
    .ft-bottom-cta{padding:36px 20px;border-radius:20px;}
  }

  /* ===== POPUP ===== */
  .ft-popup-overlay{
    display:none;position:fixed;inset:0;
    background:rgba(18,12,8,0.65);backdrop-filter:blur(6px);
    z-index:999999;align-items:center;justify-content:center;padding:16px;
  }
  .ft-popup-card{
    background:#FFFFFF;border-radius:24px;max-width:520px;width:100%;
    padding:36px 32px 32px;position:relative;
    box-shadow:0 24px 60px -12px rgba(0,0,0,0.35);
    animation:ftPopup .25s cubic-bezier(0.16,1,0.3,1);
  }
  @keyframes ftPopup{from{transform:scale(0.92);opacity:0;}to{transform:scale(1);opacity:1;}}
  .ft-popup-close{
    position:absolute;top:18px;right:18px;width:36px;height:36px;border-radius:50%;
    background:#F4EBE2;border:none;font-size:16px;color:var(--brown);
    display:flex;align-items:center;justify-content:center;cursor:pointer;
  }
  .ft-popup-close:hover{background:#E8D8CA;}
  .ft-popup-input{
    width:100%;background:#FDFBF9;border:1px solid #E5D5C5;border-radius:12px;
    padding:12px 16px 12px 42px;font-size:14.5px;color:var(--ink);
    transition:border-color .2s, box-shadow .2s;
  }
  /* ===== ROLES SECTION (FEATURE DISCOVERY) ===== */
  .ft-roles-section{
    background:var(--cream);
    padding:90px 0 105px;
    position:relative;
    overflow:hidden;
    border-bottom:1px solid var(--line);
  }
  .ft-roles-section .wrap{
    max-width:1320px;
    position:relative;
  }
  .ft-roles-header{
    text-align:center;
    max-width:760px;
    margin:0 auto 52px;
    position:relative;
  }
  .ft-roles-kicker{
    display:inline-flex;
    align-items:center;
    gap:12px;
    font-size:0.75rem;
    font-weight:700;
    letter-spacing:0.18em;
    color:var(--gold-deep);
    text-transform:uppercase;
    margin-bottom:14px;
  }
  .ft-roles-kicker-line{
    width:28px;
    height:1.5px;
    background:var(--gold-soft);
    display:inline-block;
  }
  .ft-roles-title{
    font-size:clamp(2.1rem, 3.4vw, 2.9rem);
    line-height:1.2;
    color:var(--ink);
    margin-bottom:14px;
    font-weight:600;
  }
  .ft-roles-subtitle{
    font-size:1.05rem;
    line-height:1.6;
    color:var(--ink-soft);
    margin:0 auto;
    max-width:660px;
  }

  /* Cursive Floating Notes - Positioned in the section margins so they NEVER overlap title */
  .ft-roles-side-note{
    position:absolute;
    font-family:'Caveat',cursive;
    font-size:1.45rem;
    color:#A27546;
    line-height:1.2;
    pointer-events:none;
    z-index:2;
    opacity:0.9;
  }
  .ft-roles-side-note.left{
    top:5px;
    left:16px;
    transform:rotate(-7deg);
    text-align:left;
  }
  .ft-roles-side-note.right{
    top:5px;
    right:16px;
    transform:rotate(6deg);
    text-align:right;
  }
  @media(max-width:1280px){
    .ft-roles-side-note.left{left:4px;font-size:1.25rem;}
    .ft-roles-side-note.right{right:4px;font-size:1.25rem;}
  }
  @media(max-width:1020px){
    .ft-roles-side-note{display:none;}
  }

  /* Grid of 6 Role Cards */
  .ft-roles-grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:28px;
  }
  @media(max-width:1160px){
    .ft-roles-grid{
      grid-template-columns:repeat(2, 1fr);
      gap:24px;
    }
  }
  @media(max-width:720px){
    .ft-roles-grid{
      grid-template-columns:1fr;
      gap:20px;
    }
  }

  /* Role Card - Clean Horizontal Card Layout with Increased Size */
  .ft-role-card{
    background:var(--white);
    border:1px solid #EAE0D2;
    border-radius:24px;
    overflow:hidden;
    display:flex;
    flex-direction:row;
    align-items:stretch;
    justify-content:space-between;
    min-height:245px;
    box-shadow:0 8px 24px -4px rgba(60,40,20,0.06);
    transition:transform 0.3s cubic-bezier(0.16,1,0.3,1), box-shadow 0.3s cubic-bezier(0.16,1,0.3,1), border-color 0.3s ease;
  }
  .ft-role-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 36px -6px rgba(60,40,20,0.14);
    border-color:var(--gold);
  }

  .ft-role-card-left{
    padding:24px 16px 22px 24px;
    display:flex;
    flex-direction:column;
    flex:1.15;
    min-width:0;
  }
  .ft-role-card-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:10px;
  }
  .ft-role-badge-icon{
    width:38px;
    height:38px;
    border-radius:50%;
    background:#F8EFE4;
    color:var(--gold-deep);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    transition:background 0.25s, color 0.25s;
  }
  .ft-role-badge-icon svg{
    width:20px;
    height:20px;
    stroke:currentColor;
    fill:none;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-role-card:hover .ft-role-badge-icon{
    background:var(--gold-deep);
    color:#FFFFFF;
  }
  .ft-role-title{
    font-family:'Fraunces',serif;
    font-size:1.28rem;
    font-weight:600;
    color:var(--ink);
    margin:0;
    white-space:nowrap;
  }

  .ft-role-desc{
    font-size:0.88rem;
    line-height:1.5;
    color:var(--ink-soft);
    margin:0 0 14px 0;
    min-height:42px;
  }

  .ft-role-tags{
    display:flex;
    flex-wrap:wrap;
    gap:7px;
    margin-bottom:16px;
    min-height:58px;
    align-content:flex-start;
  }
  .ft-role-tag{
    font-size:0.76rem;
    font-weight:500;
    color:#6B5E52;
    background:#F5ECE1;
    padding:4px 10px;
    border-radius:14px;
    white-space:nowrap;
  }

  .ft-role-learn-more{
    margin-top:auto;
    display:inline-flex;
    align-items:center;
    gap:4px;
    font-size:0.86rem;
    font-weight:600;
    color:var(--gold-deep);
    cursor:pointer;
    transition:gap 0.2s, color 0.2s;
  }
  .ft-role-learn-more:hover{
    color:var(--brown);
    gap:7px;
  }

  /* Right Visual Container - Full Unclipped Image */
  .ft-role-card-right{
    width:44%;
    min-width:175px;
    max-width:215px;
    flex-shrink:0;
    display:flex;
    align-items:flex-end;
    justify-content:flex-end;
    position:relative;
    overflow:hidden;
  }
  .ft-role-card-right img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:bottom right;
    display:block;
    transition:transform 0.4s cubic-bezier(0.16,1,0.3,1);
  }
  .ft-role-card:hover .ft-role-card-right img{
    transform:scale(1.04);
  }

  @media(max-width:480px){
    .ft-role-card{
      flex-direction:column;
    }
    .ft-role-card-right{
      width:100%;
      max-width:100%;
      height:170px;
      justify-content:center;
    }
  }
  /* ===== 02D CHALLENGES SECTION (BUILT FOR REAL RESTAURANTS) ===== */
  .ft-challenges-section{
    background:var(--cream);
    padding:90px 0 100px;
    position:relative;
    overflow:hidden;
    border-bottom:1px solid var(--line);
  }
  .ft-challenges-section .wrap{
    max-width:1320px;
    position:relative;
  }
  .ft-challenges-header{
    text-align:center;
    max-width:760px;
    margin:0 auto 52px;
    position:relative;
  }
  .ft-challenges-kicker{
    display:inline-flex;
    align-items:center;
    gap:12px;
    font-size:0.75rem;
    font-weight:700;
    letter-spacing:0.18em;
    color:var(--gold-deep);
    text-transform:uppercase;
    margin-bottom:14px;
  }
  .ft-challenges-kicker-line{
    width:28px;
    height:1.5px;
    background:var(--gold-soft);
    display:inline-block;
  }
  .ft-challenges-title{
    font-size:clamp(2.1rem, 3.4vw, 2.9rem);
    line-height:1.2;
    color:var(--ink);
    margin-bottom:14px;
    font-weight:600;
  }
  .ft-challenges-subtitle{
    font-size:1.05rem;
    line-height:1.6;
    color:var(--ink-soft);
    margin:0 auto;
    max-width:660px;
  }

  /* Cursive Side Note on Top Right */
  .ft-challenges-side-note{
    position:absolute;
    font-family:'Caveat',cursive;
    font-size:1.5rem;
    color:#A27546;
    line-height:1.15;
    pointer-events:none;
    z-index:2;
    opacity:0.9;
    top:10px;
    right:24px;
    transform:rotate(8deg);
    text-align:right;
  }
  @media(max-width:1180px){
    .ft-challenges-side-note{right:6px;font-size:1.25rem;}
  }
  @media(max-width:960px){
    .ft-challenges-side-note{display:none;}
  }

  /* 6 Challenges Cards Grid */
  .ft-challenges-grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:28px;
    margin-bottom:48px;
  }
  @media(max-width:1160px){
    .ft-challenges-grid{
      grid-template-columns:repeat(2, 1fr);
      gap:24px;
    }
  }
  @media(max-width:720px){
    .ft-challenges-grid{
      grid-template-columns:1fr;
      gap:20px;
    }
  }

  /* Challenge Card */
  .ft-challenge-card{
    background:var(--white);
    border:1px solid #EAE0D2;
    border-radius:24px;
    overflow:hidden;
    display:flex;
    flex-direction:row;
    align-items:stretch;
    justify-content:space-between;
    min-height:220px;
    box-shadow:0 8px 24px -4px rgba(60,40,20,0.06);
    transition:transform 0.3s cubic-bezier(0.16,1,0.3,1), box-shadow 0.3s cubic-bezier(0.16,1,0.3,1), border-color 0.3s ease;
  }
  .ft-challenge-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 36px -6px rgba(60,40,20,0.14);
    border-color:var(--gold);
  }

  .ft-challenge-card-left{
    padding:24px 16px 22px 24px;
    display:flex;
    flex-direction:column;
    flex:1.15;
    min-width:0;
  }
  .ft-challenge-card-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:10px;
  }
  .ft-challenge-icon-box{
    width:42px;
    height:42px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    color:#FFFFFF;
    transition:transform 0.25s;
  }
  .ft-challenge-icon-box svg{
    width:22px;
    height:22px;
    stroke:currentColor;
    fill:none;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
  }
  .ft-challenge-card:hover .ft-challenge-icon-box{
    transform:scale(1.06);
  }

  /* Custom badge background colors */
  .ft-challenge-icon-box.c-service{background:#8E4D1D;}
  .ft-challenge-icon-box.c-manual{background:#9C744A;}
  .ft-challenge-icon-box.c-errors{background:#6E7A4A;}
  .ft-challenge-icon-box.c-tables{background:#47687C;}
  .ft-challenge-icon-box.c-inventory{background:#7D5B7B;}
  .ft-challenge-icon-box.c-visibility{background:#8E5642;}

  .ft-challenge-title{
    font-family:'Fraunces',serif;
    font-size:1.24rem;
    font-weight:600;
    color:var(--ink);
    margin:0;
  }
  .ft-challenge-desc{
    font-size:0.88rem;
    line-height:1.5;
    color:var(--ink-soft);
    margin:0 0 16px 0;
  }

  .ft-challenge-btn-circle{
    margin-top:auto;
    width:34px;
    height:34px;
    border-radius:50%;
    border:1px solid #D5C4B2;
    background:#FAF6EF;
    color:var(--brown);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-size:15px;
    cursor:pointer;
    transition:background 0.2s, color 0.2s, transform 0.2s, border-color 0.2s;
  }
  .ft-challenge-card:hover .ft-challenge-btn-circle{
    background:var(--brown);
    color:#FFFFFF;
    border-color:var(--brown);
    transform:translateX(3px);
  }

  .ft-challenge-card-right{
    width:42%;
    min-width:145px;
    max-width:185px;
    flex-shrink:0;
    display:flex;
    align-items:flex-end;
    justify-content:flex-end;
    position:relative;
    overflow:hidden;
    padding:0;
  }
  .ft-challenge-card-right img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:bottom right;
    display:block;
    transition:transform 0.4s cubic-bezier(0.16,1,0.3,1);
  }
  .ft-challenge-card:hover .ft-challenge-card-right img{
    transform:scale(1.04);
  }

  @media(max-width:480px){
    .ft-challenge-card{
      flex-direction:column;
    }
    .ft-challenge-card-right{
      width:100%;
      max-width:100%;
      height:170px;
      justify-content:center;
    }
  }

  /* Bottom Confidence Banner */
  .ft-challenges-banner{
    background:#38271A;
    border-radius:24px;
    padding:30px 40px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:28px;
    box-shadow:0 14px 36px -8px rgba(45,30,18,0.35);
  }
  .ft-challenges-banner-left{
    display:flex;
    align-items:center;
    gap:20px;
  }
  .ft-challenges-banner-icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:rgba(199,154,97,0.18);
    border:1px solid rgba(199,154,97,0.3);
    color:var(--gold-soft);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }
  .ft-challenges-banner-icon svg{
    width:28px;
    height:28px;
    stroke:currentColor;
    fill:none;
    stroke-width:1.8;
  }
  .ft-challenges-banner-title{
    font-family:'Fraunces',serif;
    font-size:1.35rem;
    font-weight:600;
    color:#FFFFFF;
    margin:0 0 4px 0;
  }
  .ft-challenges-banner-sub{
    font-size:0.92rem;
    color:#D8C4B0;
    margin:0;
  }
  .ft-challenges-banner-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#C79A61;
    color:#22150C;
    font-weight:700;
    font-size:0.95rem;
    padding:14px 28px;
    border-radius:50px;
    white-space:nowrap;
    text-decoration:none;
    transition:background 0.2s, transform 0.2s;
  }
  .ft-challenges-banner-btn:hover{
    background:#DCB98A;
    transform:translateY(-2px);
    color:#150D07;
  }
  @media(max-width:860px){
    .ft-challenges-banner{
      flex-direction:column;
      text-align:center;
      padding:28px 24px;
    }
    .ft-challenges-banner-left{
      flex-direction:column;
      text-align:center;
    }
    .ft-challenges-banner-btn{
      width:100%;
      justify-content:center;
    }
  }
  @media(max-width:768px){
    .ft-page .wrap{padding:0 18px;}
    .ft-breadcrumb{padding:80px 0 10px;}
  }
</style>

<div class="ft-page">

{{-- ===== 01 BREADCRUMB ===== --}}
<div class="ft-breadcrumb">
  <div class="wrap">
    <div class="ft-breadcrumb-inner">
      <a href="{{ url('/') }}">Home</a>
      <span>/</span>
      <span class="active">Features</span>
    </div>
  </div>
</div>

{{-- ===== 02 HERO SECTION ===== --}}
<section class="ft-hero">
  <div class="wrap">
    <div class="ft-hero-grid">

      {{-- ★ LEFT COLUMN: CODED CONTENT ★ --}}
      <div class="ft-hero-left">
        <div class="ft-hero-kicker">
          <span class="ft-hero-kicker-line"></span>
          <span>POWERFUL FEATURES. BUILT FOR BETTER RESTAURANT OPERATIONS.</span>
          <span class="ft-hero-kicker-line"></span>
        </div>

        <h1 class="ft-hero-title">
          Everything your restaurant needs, connected in one place.
        </h1>

        <p class="ft-hero-desc">
          Manage your menu, reservations, tables, orders, kitchen, billing, inventory and business data through one connected restaurant management platform.
        </p>

        {{-- 8 Feature Icon Badges --}}
        <div class="ft-hero-badges">
          {{-- Menu Management --}}
          <a href="#menu-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><line x1="18" y1="2" x2="18" y2="22"/><path d="M14 2v7a3 3 0 0 0 6 0V2"/><path d="M6 2v4a2 2 0 0 0 4 0V2"/><line x1="8" y1="8" x2="8" y2="22"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Menu<br>Management</span>
          </a>
          {{-- Reservations --}}
          <a href="#reservation-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Reservations</span>
          </a>
          {{-- Tables --}}
          <a href="#table-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><path d="M4 10h16M6 10v9M18 10v9M8 6h8M12 6v4"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Tables</span>
          </a>
          {{-- Orders --}}
          <a href="#order-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Orders</span>
          </a>
          {{-- Kitchen --}}
          <a href="#kot-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" y1="17" x2="18" y2="17"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Kitchen</span>
          </a>
          {{-- Billing --}}
          <a href="#pos-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="7" y1="15" x2="11" y2="15"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Billing</span>
          </a>
          {{-- Inventory --}}
          <a href="#inventory-management" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Inventory</span>
          </a>
          {{-- Reports --}}
          <a href="#reports" class="ft-hero-badge-item">
            <div class="ft-hero-badge-box">
              <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            </div>
            <span class="ft-hero-badge-lbl">Reports</span>
          </a>
        </div>

        {{-- CTA Button --}}
        <div class="ft-hero-btns">
          <a href="javascript:void(0)" onclick="openPopup()" class="ft-hero-btn-dark">
            <span>Get a Free Demo</span>
            <span>&rarr;</span>
          </a>
        </div>

        {{-- Trust Row --}}
        <div class="ft-hero-trust-row">
          <div class="ft-hero-trust-item">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span>Easy to set up</span>
          </div>
          <div class="ft-hero-trust-item">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span>No long-term contracts</span>
          </div>
          <div class="ft-hero-trust-item">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span>Dedicated support</span>
          </div>
        </div>
      </div>

      {{-- ★ RIGHT COLUMN: DASHBOARD MOCKUP VISUAL ★ --}}
      <div class="ft-hero-right">
        <img src="{{ asset('assets/images/features-hero-visual.png') }}" alt="Geni Menu restaurant operations dashboard and mobile app mockup" loading="eager">
      </div>

    </div>
  </div>
</section>

{{-- ===== 02B REAL-TIME ACCESS SECTION (STAY UPDATED WITHOUT BEING EVERYWHERE) ===== --}}
<section class="ft-rta-section" id="realtime-access">
  <div class="wrap">
    <div class="ft-rta-grid">

      {{-- Left Column: Content & 6 Feature Cards --}}
      <div class="ft-rta-left" data-aos="fade-right">
        <div class="ft-rta-kicker">
          <span class="ft-rta-kicker-line"></span>
          <span>REAL-TIME ACCESS</span>
        </div>

        <h2 class="ft-rta-title">
          Stay updated<br>without being everywhere
        </h2>

        <p class="ft-rta-desc">
          Geni Menu gives restaurant teams access to the information they need while they work &mdash; on any device, from anywhere.
        </p>

        {{-- 6 Feature Cards Grid --}}
        <div class="ft-rta-cards-grid">

          {{-- 1. Live order visibility --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Live order visibility</h3>
            <p class="ft-rta-card-desc">See what's new, active, preparing, ready and completed.</p>
          </div>

          {{-- 2. Real-time table status --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><path d="M4 10h16M6 10v9M18 10v9M8 6h8M12 6v4"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Real-time table status</h3>
            <p class="ft-rta-card-desc">Know which tables are available, occupied, reserved or in service.</p>
          </div>

          {{-- 3. Payment records --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/><path d="M6 15h4"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Payment records</h3>
            <p class="ft-rta-card-desc">Review restaurant transactions and payment activity.</p>
          </div>

          {{-- 4. Inventory status --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Inventory status</h3>
            <p class="ft-rta-card-desc">Identify available and low-stock items.</p>
          </div>

          {{-- 5. Reservation information --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Reservation information</h3>
            <p class="ft-rta-card-desc">Keep upcoming bookings visible to the team.</p>
          </div>

          {{-- 6. Staff access --}}
          <div class="ft-rta-card">
            <div class="ft-rta-icon-box">
              <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 class="ft-rta-card-title">Staff access</h3>
            <p class="ft-rta-card-desc">Control what each role can view and manage.</p>
          </div>

        </div>

        {{-- CTA Button --}}
        <a href="#features-list" class="ft-rta-btn">
          <span>Explore All Features</span>
          <span>&rarr;</span>
        </a>
      </div>

      {{-- Right Column: Visual Image Graphic --}}
      <div class="ft-rta-right" data-aos="fade-left">
        <img src="{{ asset('assets/images/realtime-access-right-visual.png') }}" alt="Geni Menu Real-Time Access Dashboard and Mobile App Interface" loading="lazy">
      </div>

    </div>
  </div>
</section>

{{-- ===== 02B FEATURE DISCOVERY: BUILT FOR DIFFERENT ROLES ===== --}}
<section class="ft-roles-section" id="roles">
  <div class="wrap">
    
    {{-- Side Cursive Notes - Positioned in the section margins away from center heading --}}
    <span class="ft-roles-side-note left">People<br>Process<br>Better Food Business</span>
    <span class="ft-roles-side-note right">Different Roles<br>Same Goal<br>A Better Restaurant</span>

    {{-- Section Header --}}
    <div class="ft-roles-header" data-aos="fade-up">
      <div class="ft-roles-kicker">
        <span class="ft-roles-kicker-line"></span>
        <span>FEATURE DISCOVERY</span>
        <span class="ft-roles-kicker-line"></span>
      </div>

      <h2 class="ft-roles-title">
        Built for different roles across<br>your restaurant
      </h2>

      <p class="ft-roles-subtitle">
        Every person in your restaurant interacts with different parts of the operation.<br>Geni Menu gives each team the tools they need.
      </p>
    </div>

    {{-- 6 Role Cards Grid --}}
    <div class="ft-roles-grid">

      {{-- 1. For Owners --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="50">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><path d="M2 4l3 12h14l3-12-5 4-5-6-5 6-5-4z"/><path d="M4 18h16v2H4z"/></svg>
            </div>
            <h3 class="ft-role-title">For Owners</h3>
          </div>
          <p class="ft-role-desc">Get the information needed to oversee your business.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">Reports</span>
            <span class="ft-role-tag">Multiple Branch</span>
            <span class="ft-role-tag">Inventory</span>
            <span class="ft-role-tag">Payments</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Owners')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-owners.png') }}" alt="Geni Menu For Owners - Multi-Branch, Reports & Analytics" loading="lazy">
        </div>
      </div>

      {{-- 2. For Managers --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="100">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            </div>
            <h3 class="ft-role-title">For Managers</h3>
          </div>
          <p class="ft-role-desc">Manage daily operations from one place.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">Staff</span>
            <span class="ft-role-tag">Tables</span>
            <span class="ft-role-tag">Reservations</span>
            <span class="ft-role-tag">Orders</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Managers')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-managers.png') }}" alt="Geni Menu For Managers - Staff, Tables & Reservations" loading="lazy">
        </div>
      </div>

      {{-- 3. For Waiters --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="150">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <h3 class="ft-role-title">For Waiters</h3>
          </div>
          <p class="ft-role-desc">Keep customer service organized during busy hours.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">Tables</span>
            <span class="ft-role-tag">Orders</span>
            <span class="ft-role-tag">Waiter Requests</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Waiters')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-waiters.png') }}" alt="Geni Menu For Waiters - Tables, Orders & Service Requests" loading="lazy">
        </div>
      </div>

      {{-- 4. For Kitchen Teams --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="200">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" y1="17" x2="18" y2="17"/></svg>
            </div>
            <h3 class="ft-role-title">For Kitchen Teams</h3>
          </div>
          <p class="ft-role-desc">Receive and manage preparation orders clearly.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">KOT</span>
            <span class="ft-role-tag">Multiple Kitchen</span>
            <span class="ft-role-tag">Order Status</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Kitchen Teams')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-kitchen.png') }}" alt="Geni Menu For Kitchen Teams - Kitchen Display & KOT Tickets" loading="lazy">
        </div>
      </div>

      {{-- 5. For Cashiers --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="250">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            </div>
            <h3 class="ft-role-title">For Cashiers</h3>
          </div>
          <p class="ft-role-desc">Process orders and payments efficiently.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">POS</span>
            <span class="ft-role-tag">Billing</span>
            <span class="ft-role-tag">Payments</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Cashiers')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-cashiers.png') }}" alt="Geni Menu For Cashiers - POS Fast Billing & Payment Reconciliation" loading="lazy">
        </div>
      </div>

      {{-- 6. For Customers --}}
      <div class="ft-role-card" data-aos="fade-up" data-aos-delay="300">
        <div class="ft-role-card-left">
          <div class="ft-role-card-header">
            <div class="ft-role-badge-icon">
              <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 class="ft-role-title">For Customers</h3>
          </div>
          <p class="ft-role-desc">Browse and place orders through convenient digital channels.</p>
          <div class="ft-role-tags">
            <span class="ft-role-tag">QR Menu</span>
            <span class="ft-role-tag">Kiosk Ordering</span>
          </div>
          <a href="javascript:void(0)" onclick="openPopup('For Customers')" class="ft-role-learn-more">
            Learn More <span>&rarr;</span>
          </a>
        </div>
        <div class="ft-role-card-right">
          <img src="{{ asset('assets/images/roles/role-customers.png') }}" alt="Geni Menu For Customers - Self QR Ordering & Kiosk" loading="lazy">
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ===== 02C CONNECTED SUITE / INTERACTIVE 17-MODULE RING ===== --}}
@php
$suiteFeatures = [
    [
        'id' => 'menu-management',
        'num' => '01',
        'short' => 'Menu',
        'title' => 'Menu Management',
        'subtitle' => 'Create and manage your restaurant menu with ease.',
        'points' => [
            'Add menu items & categories',
            'Set pricing, variants & addons',
            'Manage item availability in real time',
            'Publish to QR Menu & Kiosks',
        ],
        'badge' => 'Easily manage your menu across all branches',
        'img' => asset('assets/images/features-suite-menu-mockup.png'),
        'x' => 12.81, 'y' => 22.91,
        'icon' => 'menu',
    ],
    [
        'id' => 'reservation-management',
        'num' => '02',
        'short' => 'Reservations',
        'title' => 'Reservation Management',
        'subtitle' => 'Handle guest bookings and table allocation effortlessly.',
        'points' => [
            'Real-time table booking tracking',
            'Instant table assignment & seating plans',
            'SMS & WhatsApp confirmation alerts',
            'Eliminate double bookings & no-shows',
        ],
        'badge' => 'Reduce guest wait times by 40%',
        'img' => asset('landing/reservations.svg'),
        'x' => 25.81, 'y' => 12.22,
        'icon' => 'calendar',
    ],
    [
        'id' => 'waiter-requests',
        'num' => '03',
        'short' => 'Waiter Requests',
        'title' => 'Waiter Requests',
        'subtitle' => 'Instant guest calls from digital QR menus directly to staff.',
        'points' => [
            'Live service requests from each table',
            'Water refill, bill request & waiter calls',
            'Real-time alerts on staff mobile devices',
            'Measure staff response time & floor speed',
        ],
        'badge' => 'Average response time under 45 seconds',
        'img' => asset('landing/waiter-requests.svg'),
        'x' => 42.09, 'y' => 6.62,
        'icon' => 'bell',
    ],
    [
        'id' => 'table-management',
        'num' => '04',
        'short' => 'Tables',
        'title' => 'Table Management',
        'subtitle' => 'Visual floor plan with real-time dining status tracking.',
        'points' => [
            'Live color-coded floor status (Vacant, Busy, Billed)',
            'Drag & drop table layout customizer',
            'Split or merge tables for group parties',
            'Multi-floor and outdoor seating zones',
        ],
        'badge' => 'Maximize table turnover & dining flow',
        'img' => asset('landing/table-management.svg'),
        'x' => 59.43, 'y' => 6.89,
        'icon' => 'table',
    ],
    [
        'id' => 'pos-management',
        'num' => '05',
        'short' => 'POS & Billing',
        'title' => 'POS Management',
        'subtitle' => 'Lightning-fast billing built for high-volume rush hours.',
        'points' => [
            '3-click bill generation with barcode support',
            'Dine-in, takeaway, delivery & counter sales',
            'Split bills, discounts & customized taxes',
            'Thermal receipt & digital e-bill printing',
        ],
        'badge' => 'Process bills 3x faster during peak hours',
        'img' => asset('landing/pos.svg'),
        'x' => 75.50, 'y' => 12.98,
        'icon' => 'pos',
    ],
    [
        'id' => 'order-management',
        'num' => '06',
        'short' => 'Orders',
        'title' => 'Order Management',
        'subtitle' => 'End-to-end order lifecycle tracking from punch to checkout.',
        'points' => [
            'Live order pipeline across kitchen and counter',
            'Integrated aggregator orders (Zomato / Swiggy)',
            'Order modification, addons & special notes',
            'Complete audit logs with cashier timestamps',
        ],
        'badge' => 'Zero missed orders across all dining channels',
        'img' => asset('landing/order-management.svg'),
        'x' => 88.13, 'y' => 24.06,
        'icon' => 'orders',
    ],
    [
        'id' => 'kot-management',
        'num' => '07',
        'short' => 'KOT',
        'title' => 'KOT (Kitchen Order Ticket)',
        'subtitle' => 'Instant digital & printed kitchen tickets with zero delay.',
        'points' => [
            'Auto-route items to specific kitchen stations',
            'Special cooking notes & allergen alerts',
            'Preparation timers & ready alerts',
            'Eliminates kitchen miscommunication completely',
        ],
        'badge' => 'Instant ticket dispatch under 2 seconds',
        'img' => asset('landing/kot.svg'),
        'x' => 95.60, 'y' => 38.66,
        'icon' => 'kot',
    ],
    [
        'id' => 'delivery-executive',
        'num' => '08',
        'short' => 'Delivery',
        'title' => 'Delivery Executive Management',
        'subtitle' => 'Assign, track and manage delivery riders seamlessly.',
        'points' => [
            'Real-time rider assignment & status updates',
            'Live GPS route & delivery progress tracking',
            'Cash-on-delivery reconciliation dashboard',
            'Rider commission & performance analytics',
        ],
        'badge' => 'On-time delivery tracking in real time',
        'img' => asset('landing/delivery-executive.svg'),
        'x' => 96.92, 'y' => 54.78,
        'icon' => 'delivery',
    ],
    [
        'id' => 'customer-management',
        'num' => '09',
        'short' => 'Customers',
        'title' => 'Customer Management (CRM)',
        'subtitle' => 'Build loyal repeat dining with integrated CRM & rewards.',
        'points' => [
            'Centralized guest database & dining history',
            'Automated loyalty points & cashback system',
            'Personalized SMS & WhatsApp offers on birthdays',
            'Guest feedback & rating management',
        ],
        'badge' => 'Boost guest retention by over 35%',
        'img' => asset('landing/customer-management.svg'),
        'x' => 91.90, 'y' => 70.26,
        'icon' => 'customers',
    ],
    [
        'id' => 'payments-management',
        'num' => '10',
        'short' => 'Payments',
        'title' => 'Payments Management',
        'subtitle' => 'Frictionless payment acceptance across all modern modes.',
        'points' => [
            'UPI QR, Debit/Credit Card, Net Banking & Cash',
            'Dynamic table QR for pay-at-table checkout',
            'Automated daily closing & reconciliation',
            'Instant digital receipt delivery via WhatsApp',
        ],
        'badge' => '100% reconciled daily cash & digital records',
        'img' => asset('landing/payments-management.svg'),
        'x' => 81.22, 'y' => 83.00,
        'icon' => 'payments',
    ],
    [
        'id' => 'staff-management',
        'num' => '11',
        'short' => 'Staff',
        'title' => 'Staff Management',
        'subtitle' => 'Role-based permissions, shift scheduling and staff security.',
        'points' => [
            'Granular roles for Waiter, Cashier, Chef & Admin',
            'Staff clock-in / clock-out & attendance logs',
            'Waiter table allocation & sales tracking',
            'Prevent unauthorized bill edits & discounts',
        ],
        'badge' => 'Complete accountability for every staff action',
        'img' => asset('landing/staff-management.svg'),
        'x' => 66.33, 'y' => 91.28,
        'icon' => 'staff',
    ],
    [
        'id' => 'reports',
        'num' => '12',
        'short' => 'Reports',
        'title' => 'Reports & Analytics',
        'subtitle' => 'Deep operational intelligence to drive restaurant profitability.',
        'points' => [
            'Daily, weekly & monthly sales revenue dashboards',
            'Top-selling vs dead inventory item analysis',
            'Peak hour footfall & table turnover rates',
            'One-click export to Excel, CSV & PDF for audits',
        ],
        'badge' => 'Make data-backed decisions every day',
        'img' => asset('landing/reports.svg'),
        'x' => 49.22, 'y' => 93.99,
        'icon' => 'reports',
    ],
    [
        'id' => 'customized-settings',
        'num' => '13',
        'short' => 'Settings',
        'title' => 'Customized Settings',
        'subtitle' => 'Tailor every aspect of Geni Menu to fit your restaurant brand.',
        'points' => [
            'Custom receipt logos, headers, footers & branding',
            'Configurable GST, VAT, service charge & tips',
            'Multi-language interface for staff & customers',
            'Custom printer routing for KOT and billing',
        ],
        'badge' => 'Fully flexible settings for any dining concept',
        'img' => asset('landing/customized-settings.svg'),
        'x' => 32.23, 'y' => 90.76,
        'icon' => 'settings',
    ],
    [
        'id' => 'inventory-management',
        'num' => '14',
        'short' => 'Inventory',
        'title' => 'Inventory Management',
        'subtitle' => 'Real-time stock tracking, recipe costing and zero food waste.',
        'points' => [
            'Automated stock deduction based on recipe orders',
            'Low-stock alerts to prevent ingredient shortage',
            'Vendor purchase order creation & cost tracking',
            'Wastage logs & ingredient expiration monitoring',
        ],
        'badge' => 'Cut ingredient food wastage by up to 25%',
        'img' => asset('landing/inventory-management.svg'),
        'x' => 17.63, 'y' => 82.03,
        'icon' => 'inventory',
    ],
    [
        'id' => 'multiple-kitchen',
        'num' => '15',
        'short' => 'Kitchens',
        'title' => 'Multiple Kitchen Management',
        'subtitle' => 'Route orders to specialized prep stations without chaos.',
        'points' => [
            'Direct routing to Grill, Tandoor, Bakery & Bar',
            'Station-specific digital KDS screens & printers',
            'Synchronized ready alerts across cooking stations',
            'Streamline complex multi-course dining prep',
        ],
        'badge' => 'Speed up preparation time by 30%',
        'img' => asset('landing/multiple-kitchen.svg'),
        'x' => 7.41, 'y' => 68.96,
        'icon' => 'kitchen',
    ],
    [
        'id' => 'multiple-branch',
        'num' => '16',
        'short' => 'Branches',
        'title' => 'Multiple Branch (Multi-Outlet)',
        'subtitle' => 'Control your entire restaurant chain from a single headquarters.',
        'points' => [
            'Switch between outlets with 1 click',
            'Centralized menu updates & outlet-level pricing',
            'Comparative branch performance & revenue leaderboards',
            'Inter-branch stock transfers & central warehouse sync',
        ],
        'badge' => 'Scale from 1 outlet to 50+ locations effortlessly',
        'img' => asset('landing/multiple-branch.svg'),
        'x' => 2.94, 'y' => 53.34,
        'icon' => 'branch',
    ],
    [
        'id' => 'kiosk-ordering',
        'num' => '17',
        'short' => 'Kiosk',
        'title' => 'Kiosk Ordering',
        'subtitle' => 'Self-service interactive ordering kiosks that eliminate queues.',
        'points' => [
            'Intuitive visual touch interface for guest self-order',
            'Automated upselling (combos, beverages, desserts)',
            'Integrated contactless card & UPI QR payments',
            'Direct auto-dispatch into KOT and kitchen display',
        ],
        'badge' => 'Boost average check size by 20% with smart upselling',
        'img' => asset('landing/kiosk-ordering.svg'),
        'x' => 4.82, 'y' => 37.27,
        'icon' => 'kiosk',
    ],
];

$suiteIcons = [
    'menu' => '<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'calendar' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4"/></svg>',
    'bell' => '<svg viewBox="0 0 24 24"><path d="M18 16V8a6 6 0 0 0-12 0v8"/><path d="M2 19h20"/><circle cx="12" cy="4" r="1.5"/><line x1="2" y1="16" x2="22" y2="16"/></svg>',
    'table' => '<svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="4" rx="1"/><line x1="6" y1="10" x2="6" y2="20"/><line x1="18" y1="10" x2="18" y2="20"/><line x1="2" y1="20" x2="10" y2="20"/><line x1="14" y1="20" x2="22" y2="20"/></svg>',
    'pos' => '<svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><path d="M6 8h4"/><path d="M14 8h4"/><path d="M6 12h12"/></svg>',
    'orders' => '<svg viewBox="0 0 24 24"><path d="M16 2H8a2 2 0 0 0-2 2v18l3-2 3 2 3-2 3 2 3-2V4a2 2 0 0 0-2-2z"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>',
    'kot' => '<svg viewBox="0 0 24 24"><path d="M6 13.8a4.5 4.5 0 1 1 2.6-6.6 5 5 0 0 1 6.8 0 4.5 4.5 0 1 1 2.6 6.6"/><path d="M6 14h12v6a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-6z"/><line x1="6" y1="17" x2="18" y2="17"/></svg>',
    'delivery' => '<svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    'customers' => '<svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'payments' => '<svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/><circle cx="6" cy="15" r="1"/><circle cx="10" cy="15" r="1"/></svg>',
    'staff' => '<svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><path d="M12 14v7"/></svg>',
    'reports' => '<svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><line x1="2" y1="20" x2="22" y2="20"/></svg>',
    'settings' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>',
    'inventory' => '<svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>',
    'kitchen' => '<svg viewBox="0 0 24 24"><path d="M4 3h16v4H4z"/><path d="M6 7v13a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7"/><circle cx="9" cy="13" r="1.5"/><circle cx="15" cy="13" r="1.5"/><path d="M9 17h6"/></svg>',
    'branch' => '<svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/><path d="M2 9h20"/></svg>',
    'kiosk' => '<svg viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="16" rx="2"/><rect x="8" y="5" width="8" height="9" rx="1"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="8" y1="22" x2="16" y2="22"/></svg>',
];
@endphp

<section class="ft-suite-section" id="suite">
  <div class="wrap">
    <div class="ft-suite-head" data-aos="fade-up">
      <div class="ft-suite-kicker">
        <span class="ft-suite-kicker-line"></span>
        <span>FEATURES</span>
        <span class="ft-suite-kicker-line"></span>
      </div>
      <h2 class="ft-suite-title">Everything your restaurant needs.</h2>
      <div class="ft-suite-sub">One connected platform for every operation.</div>
      <p class="ft-suite-desc">Explore Geni Menu's complete suite of restaurant tools. Select a feature to see how it fits into your daily workflow.</p>
    </div>

    {{-- Mobile / Tablet Horizontal Scroll Rail (<= 1080px) --}}
    <div class="ft-suite-mobile-rail-wrap">
      <div class="ft-suite-mobile-rail" id="ftSuiteMobileRail">
        @foreach($suiteFeatures as $i => $item)
          <button type="button" class="ft-suite-rail-pill {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}" onclick="selectSuiteFeature({{ $i }})">
            <span class="ft-suite-rail-pill-num">{{ $item['num'] }}</span>
            <span class="ft-suite-rail-pill-icon">{!! $suiteIcons[$item['icon']] !!}</span>
            <span>{{ $item['short'] }}</span>
          </button>
        @endforeach
      </div>
    </div>

    {{-- Interactive Orbital Stage (Desktop Orbit + Live Central Detail Card) --}}
    <div class="ft-suite-stage" id="ftSuiteStage" data-aos="zoom-in">
      {{-- SVG Elliptical Orbit Track --}}
      <svg class="ft-suite-orbit-svg" viewBox="0 0 1000 600" preserveAspectRatio="none">
        <ellipse cx="500" cy="300" rx="472" ry="264" fill="none" stroke="#E2D5C0" stroke-width="1.5" stroke-dasharray="4 6" opacity="0.8" />
        <ellipse cx="500" cy="300" rx="472" ry="264" fill="none" stroke="#C79A61" stroke-width="1" opacity="0.25" />
      </svg>

      {{-- 17 Interactive Orbit Nodes --}}
      @foreach($suiteFeatures as $i => $item)
        <button type="button" 
                class="ft-suite-node {{ $i === 0 ? 'active' : '' }}" 
                data-index="{{ $i }}" 
                style="left: {{ $item['x'] }}%; top: {{ $item['y'] }}%;"
                onclick="selectSuiteFeature({{ $i }})"
                aria-label="{{ $item['title'] }}">
          <div class="ft-suite-node-icon">
            {!! $suiteIcons[$item['icon']] !!}
          </div>
          <div class="ft-suite-node-num">{{ $item['num'] }}</div>
          <span class="ft-suite-node-label">{{ $item['short'] }}</span>
        </button>
      @endforeach

      {{-- Live Central Interactive Detail Card --}}
      <div class="ft-suite-card" id="ftSuiteCard">
        <div class="ft-card-info">
          <div class="ft-card-num-badge" id="ftCardNum">01</div>
          <h3 class="ft-card-title" id="ftCardTitle">Menu Management</h3>
          <p class="ft-card-sub" id="ftCardSub">Create and manage your restaurant menu with ease.</p>
          <div class="ft-card-points" id="ftCardPoints">
            <div class="ft-card-point">
              <div class="ft-card-point-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Add menu items & categories</span>
            </div>
            <div class="ft-card-point">
              <div class="ft-card-point-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Set pricing, variants & addons</span>
            </div>
            <div class="ft-card-point">
              <div class="ft-card-point-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Manage item availability in real time</span>
            </div>
            <div class="ft-card-point">
              <div class="ft-card-point-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
              <span>Publish to QR Menu & Kiosks</span>
            </div>
          </div>
          <a href="#menu-management" class="ft-card-btn" id="ftCardBtn">
            <span id="ftCardBtnText">Explore Menu Management</span>
            <span>&rarr;</span>
          </a>
        </div>

        <div class="ft-card-visual">
          <img id="ftCardImg" src="{{ asset('assets/images/features-suite-menu-mockup.png') }}" alt="Menu Management" class="ft-card-img">
          <div class="ft-card-tooltip" id="ftCardTooltip">
            <div class="ft-card-tooltip-icon">
              <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/></svg>
            </div>
            <div class="ft-card-tooltip-text" id="ftCardTooltipText">Easily manage your menu across all branches</div>
          </div>
        </div>

        {{-- Next / Prev Controls --}}
        <div class="ft-suite-arrows">
          <button type="button" class="ft-suite-arrow-btn" id="ftSuitePrev" aria-label="Previous Feature">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          </button>
          <button type="button" class="ft-suite-arrow-btn" id="ftSuiteNext" aria-label="Next Feature">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
          </button>
        </div>
      </div>
    </div>

    {{-- 3-Pillar Value Strip --}}
    <div class="ft-suite-strip" data-aos="fade-up">
      <div class="ft-suite-strip-item">
        <div class="ft-suite-strip-icon">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="ft-suite-strip-text">
          <h4>Save Time</h4>
          <p>Automate daily tasks</p>
        </div>
      </div>
      <div class="ft-suite-strip-item">
        <div class="ft-suite-strip-icon">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="ft-suite-strip-text">
          <h4>Improve Service</h4>
          <p>Deliver a better dining experience</p>
        </div>
      </div>
      <div class="ft-suite-strip-item">
        <div class="ft-suite-strip-icon">
          <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><path d="M4 14l8-8 6 6 4-4"/></svg>
        </div>
        <div class="ft-suite-strip-text">
          <h4>Grow Your Business</h4>
          <p>Make data-driven decisions</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ===== 02D CHALLENGES SECTION (BUILT FOR REAL RESTAURANTS) ===== --}}
<section class="ft-challenges-section" id="challenges">
  <div class="wrap">

    {{-- Cursive Side Note on Top Right --}}
    <span class="ft-challenges-side-note">Small Changes<br>Big Impact</span>

    {{-- Header --}}
    <div class="ft-challenges-header" data-aos="fade-up">
      <div class="ft-challenges-kicker">
        <span class="ft-challenges-kicker-line"></span>
        <span>BUILT FOR REAL RESTAURANTS</span>
        <span class="ft-challenges-kicker-line"></span>
      </div>

      <h2 class="ft-challenges-title">
        Features that solve everyday<br>restaurant challenges
      </h2>

      <p class="ft-challenges-subtitle">
        From faster service to better inventory control, <strong>Geni Menu</strong> helps you overcome real operational challenges &mdash; every day.
      </p>
    </div>

    {{-- 6 Challenge Cards Grid --}}
    <div class="ft-challenges-grid">

      {{-- 1. Faster service --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="50">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-service">
              <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"/><path d="M12 6v6l4 2"/></svg>
            </div>
            <h3 class="ft-challenge-title">Faster service</h3>
          </div>
          <p class="ft-challenge-desc">Reduce unnecessary steps across ordering, kitchen, tables, and billing.</p>
          <a href="javascript:void(0)" onclick="openPopup('Faster service')" class="ft-challenge-btn-circle" aria-label="Learn more about Faster service">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-service.png') }}" alt="Faster service - Service Bell" loading="lazy">
        </div>
      </div>

      {{-- 2. Less manual work --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="100">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-manual">
              <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            </div>
            <h3 class="ft-challenge-title">Less manual work</h3>
          </div>
          <p class="ft-challenge-desc">Replace repetitive manual processes with digital restaurant workflows.</p>
          <a href="javascript:void(0)" onclick="openPopup('Less manual work')" class="ft-challenge-btn-circle" aria-label="Learn more about Less manual work">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-manual.png') }}" alt="Less manual work - Digital Workflows" loading="lazy">
        </div>
      </div>

      {{-- 3. Fewer errors --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="150">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-errors">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
            </div>
            <h3 class="ft-challenge-title">Fewer errors</h3>
          </div>
          <p class="ft-challenge-desc">Keep order and billing information organized across your team.</p>
          <a href="javascript:void(0)" onclick="openPopup('Fewer errors')" class="ft-challenge-btn-circle" aria-label="Learn more about Fewer errors">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-errors.png') }}" alt="Fewer errors - Order Receipt" loading="lazy">
        </div>
      </div>

      {{-- 4. Better table management --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="200">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-tables">
              <svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="4" rx="1"/><line x1="6" y1="10" x2="6" y2="20"/><line x1="18" y1="10" x2="18" y2="20"/><line x1="2" y1="20" x2="10" y2="20"/><line x1="14" y1="20" x2="22" y2="20"/></svg>
            </div>
            <h3 class="ft-challenge-title">Better table management</h3>
          </div>
          <p class="ft-challenge-desc">Get clear visibility into your restaurant's seating and table activity.</p>
          <a href="javascript:void(0)" onclick="openPopup('Better table management')" class="ft-challenge-btn-circle" aria-label="Learn more about Better table management">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-tables.png') }}" alt="Better table management - Table Stand" loading="lazy">
        </div>
      </div>

      {{-- 5. Smarter inventory --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="250">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-inventory">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
            </div>
            <h3 class="ft-challenge-title">Smarter inventory</h3>
          </div>
          <p class="ft-challenge-desc">Monitor stock levels and identify items that need attention.</p>
          <a href="javascript:void(0)" onclick="openPopup('Smarter inventory')" class="ft-challenge-btn-circle" aria-label="Learn more about Smarter inventory">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-inventory.png') }}" alt="Smarter inventory - Food Containers" loading="lazy">
        </div>
      </div>

      {{-- 6. Better business visibility --}}
      <div class="ft-challenge-card" data-aos="fade-up" data-aos-delay="300">
        <div class="ft-challenge-card-left">
          <div class="ft-challenge-card-header">
            <div class="ft-challenge-icon-box c-visibility">
              <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><line x1="2" y1="20" x2="22" y2="20"/></svg>
            </div>
            <h3 class="ft-challenge-title">Better business visibility</h3>
          </div>
          <p class="ft-challenge-desc">Access useful information about sales, payments, orders, and operations.</p>
          <a href="javascript:void(0)" onclick="openPopup('Better business visibility')" class="ft-challenge-btn-circle" aria-label="Learn more about Better business visibility">
            &rarr;
          </a>
        </div>
        <div class="ft-challenge-card-right">
          <img src="{{ asset('assets/images/challenges/challenge-visibility.png') }}" alt="Better business visibility - Sales Analytics" loading="lazy">
        </div>
      </div>

    </div>

    {{-- Bottom Confidence Banner Card --}}
    <div class="ft-challenges-banner" data-aos="fade-up">
      <div class="ft-challenges-banner-left">
        <div class="ft-challenges-banner-icon">
          <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/><path d="M2 9h20"/></svg>
        </div>
        <div>
          <h3 class="ft-challenges-banner-title">Run your restaurant with confidence.</h3>
          <p class="ft-challenges-banner-sub">Simpler operations. Happier teams. Greater growth.</p>
        </div>
      </div>
      <a href="#features-list" class="ft-challenges-banner-btn">
        <span>Explore All Features</span>
        <span>&rarr;</span>
      </a>
    </div>

  </div>
</section>

{{-- ===== 03 FEATURES LIST (ALL 17 MODULES) ===== --}}
<section class="ft-features-section" id="features-list">
  <div class="wrap">
    @php
        $features = [
            ['id'=>'menu-management','kicker'=>'MENU & DINING','title'=>'Menu Management','desc'=>'Easily manage your entire menu from a single interface. Update items, categories, prices, and availability in real time.','points'=>['Keep menu items, categories, and prices updated instantly.','Control availability and item details from one place.','Set seasonal specials and time-based menus.'],'image'=>'landing/menu-management.svg','reverse'=>false],
            ['id'=>'reservation-management','kicker'=>'TABLE & SEATING','title'=>'Reservation Management','desc'=>'Handle all reservations from one screen. View, update, and allocate tables to guests with ease.','points'=>['Track and manage all upcoming reservations in real time.','Assign tables quickly to reduce waiting times.','Send confirmation and reminder notifications.'],'image'=>'landing/reservations.svg','reverse'=>true],
            ['id'=>'waiter-requests','kicker'=>'SERVICE & FLOOR','title'=>'Waiter Requests','desc'=>'Monitor and respond to service requests instantly. Improve customer satisfaction with faster response times.','points'=>['View live requests from each table and area.','Mark requests as attended to streamline service.','Measure staff response times.'],'image'=>'landing/waiter-requests.svg','reverse'=>false],
            ['id'=>'table-management','kicker'=>'FLOOR PLAN','title'=>'Table Management','desc'=>'View and manage all tables in one dashboard. Track availability, occupancy, and special table layouts.','points'=>['Monitor table status across all seating areas.','Add, update, or rearrange tables effortlessly.','Merge or split tables for group dining.'],'image'=>'landing/table-management.svg','reverse'=>true],
            ['id'=>'pos-management','kicker'=>'BILLING & COUNTER','title'=>'POS Management','desc'=>'Process dine-in, delivery, and pickup orders from one screen. Ensure fast, accurate billing for every customer.','points'=>['Add items, apply variations, and generate bills instantly.','Manage all order types from a single interface.','Support multi-payment modes with receipt printing.'],'image'=>'landing/pos.svg','reverse'=>false],
            ['id'=>'order-management','kicker'=>'ORDER FLOW','title'=>'Order Management','desc'=>'Track every order from placement to completion. Coordinate between service staff and kitchen efficiently.','points'=>['View all active and completed orders in real time.','Update order status to keep workflow organized.','Track modifications and cancellations with audit trails.'],'image'=>'landing/order-management.svg','reverse'=>true],
            ['id'=>'kot-management','kicker'=>'KITCHEN OPERATIONS','title'=>'KOT (Kitchen Order Ticket) Management','desc'=>'Send orders directly to the kitchen instantly. Reduce errors and improve preparation speed.','points'=>['Print or display KOTs for faster kitchen service.','Route items to specific kitchen sections automatically.','Display special instructions and allergen notes.'],'image'=>'landing/kot.svg','reverse'=>false],
            ['id'=>'delivery-executive','kicker'=>'TAKEAWAY & LOGISTICS','title'=>'Delivery Executive Management','desc'=>'Assign and monitor delivery staff from one dashboard. Track performance and ensure timely deliveries.','points'=>['View available delivery executives in real time.','Assign orders and monitor completion status.','Track cash collection and delivery metrics.'],'image'=>'landing/delivery-executive.svg','reverse'=>true],
            ['id'=>'customer-management','kicker'=>'CRM & LOYALTY','title'=>'Customer Management','desc'=>'Maintain a complete record of customer information. Track order history and preferences for better service.','points'=>['Search and update customer details instantly.','Build loyalty with personalized promotions.','Gather guest feedback to improve quality.'],'image'=>'landing/customer-management.svg','reverse'=>false],
            ['id'=>'payments-management','kicker'=>'FINANCE & CASHFLOW','title'=>'Payments Management','desc'=>'Track all transactions from a single screen. Filter by amount, method, or date for quick access.','points'=>['Monitor all payment records in real time.','Reconcile daily balances with cashier summaries.','Export data for financial tracking and audits.'],'image'=>'landing/payments-management.svg','reverse'=>true],
            ['id'=>'staff-management','kicker'=>'TEAM & PERMISSIONS','title'=>'Staff Management','desc'=>'Manage staff roles, permissions, and contact details. Keep your team organized and accountable.','points'=>['Assign specific roles and update permissions easily.','Monitor shift logs and attendance records.','Store staff contact information securely.'],'image'=>'landing/staff-management.svg','reverse'=>false],
            ['id'=>'reports','kicker'=>'ANALYTICS & INSIGHTS','title'=>'Reports','desc'=>'Generate detailed reports on sales, items, and categories. Use data to improve business decisions.','points'=>['Access dashboards showing daily sales trends.','Identify top-performing and low-performing items.','Export reports in PDF and Excel formats.'],'image'=>'landing/reports.svg','reverse'=>true],
            ['id'=>'customized-settings','kicker'=>'SYSTEM CONTROL','title'=>'Customized Settings','desc'=>'Adjust system settings to fit your business needs. Control everything from taxes to theme colors.','points'=>['Update restaurant details, payment settings, and taxes.','Customize the interface to match your brand.','Switch between multi-language options.'],'image'=>'landing/customized-settings.svg','reverse'=>false],
            ['id'=>'inventory-management','kicker'=>'STOCK & RECIPES','title'=>'Inventory Management','desc'=>'Track stock levels and manage ingredients efficiently to avoid shortages and reduce wastage.','points'=>['Monitor ingredient stock levels in real time.','Get alerts when stock is running low.','Manage vendor purchase orders and costs.'],'image'=>'landing/inventory-management.svg','reverse'=>true],
            ['id'=>'multiple-kitchen','kicker'=>'KITCHEN STATIONS','title'=>'Multiple Kitchen','desc'=>'Manage orders across multiple kitchen stations for faster and more organized food preparation.','points'=>['Send orders to the correct kitchen section automatically.','Improve coordination between kitchen teams.','Reduce confusion during rush hours.'],'image'=>'landing/multiple-kitchen.svg','reverse'=>false],
            ['id'=>'multiple-branch','kicker'=>'MULTI-OUTLET ERP','title'=>'Multiple Branch','desc'=>'Easily manage multiple restaurant branches from a single system dashboard.','points'=>['Switch between branches instantly.','Track orders, staff, and sales per branch.','Centrally update menus across all locations.'],'image'=>'landing/multiple-branch.svg','reverse'=>true],
            ['id'=>'kiosk-ordering','kicker'=>'SELF-SERVICE TECH','title'=>'Kiosk Ordering','desc'=>'Enable self-service kiosk ordering so customers can place orders quickly without waiting.','points'=>['Customers can browse menu and place orders directly.','Reduce queue time and improve order accuracy.','Direct ticket integration into KOT and billing.'],'image'=>'landing/kiosk-ordering.svg','reverse'=>false],
        ];
    @endphp

    @foreach ($features as $feature)
      <div id="{{ $feature['id'] }}" class="ft-feature-row {{ $feature['reverse'] ? 'reverse' : '' }}" data-aos="fade-up">
        
        {{-- Text --}}
        <div class="ft-fr-text">
          <div class="ft-fr-kicker">{{ $feature['kicker'] }}</div>
          <h3>{{ $feature['title'] }}</h3>
          <p class="ft-fr-desc">{{ $feature['desc'] }}</p>
          <div class="ft-fr-items">
            @foreach ($feature['points'] as $point)
              <div class="ft-fr-item">
                <div class="ft-fr-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <span>{{ $point }}</span>
              </div>
            @endforeach
          </div>
          <a href="javascript:void(0)" onclick="openPopup()" class="ft-fr-link">
            <span>Get Demo for {{ $feature['title'] }}</span>
            <span class="arr">&rarr;</span>
          </a>
        </div>

        {{-- Visual --}}
        <div class="ft-fr-visual">
          <div class="ft-fr-visual-card">
            <img src="{{ asset($feature['image']) }}" alt="{{ $feature['title'] }}" loading="lazy">
          </div>
        </div>

      </div>
    @endforeach
  </div>
</section>

{{-- ===== 04 BOTTOM CTA ===== --}}
<div class="wrap" style="padding-bottom:20px;">
  <div class="ft-bottom-cta" data-aos="zoom-in">
    <span style="font-family:'Caveat',cursive;font-size:1.6rem;color:#DCB98A;display:block;margin-bottom:8px;">
      Run Your Restaurant Anywhere
    </span>
    <h2 style="font-family:'Fraunces',serif;font-size:clamp(1.8rem,3vw,2.6rem);font-weight:650;color:#FFFFFF;line-height:1.15;margin-bottom:12px;">
      Everything your restaurant needs,<br>connected in one place.
    </h2>
    <p style="color:#C4B8AA;max-width:560px;margin:0 auto 28px;font-size:1rem;line-height:1.6;">
      Manage your menu, reservations, tables, orders, kitchen, billing, inventory, and business data through one unified restaurant management platform.
    </p>
    <a href="javascript:void(0)" onclick="openPopup()" class="ft-hero-btn-dark" style="background:#C79A61;box-shadow:0 6px 20px rgba(199,154,97,.35);">
      <span>Get a Free Demo</span>
      <span>&rarr;</span>
    </a>
  </div>
</div>

{{-- ===== 05 LEAD POPUP ===== --}}
<div id="leadPopup" class="ft-popup-overlay" role="dialog" aria-modal="true">
  <div class="ft-popup-card">
    <button type="button" class="ft-popup-close" onclick="closePopup()" aria-label="Close">✕</button>
    <div style="margin-bottom:16px;">
      <span style="display:inline-block;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#A87948;background:#F5ECE1;padding:4px 12px;border-radius:999px;margin-bottom:8px;">FREE PRODUCT DEMO</span>
      <h3 style="font-family:'Fraunces',serif;font-size:1.5rem;font-weight:650;color:var(--ink);line-height:1.25;">Experience Geni Menu in action</h3>
      <p style="font-size:0.88rem;color:var(--ink-soft);margin-top:4px;">Fill in your details and our team will guide you through all features.</p>
    </div>
    <form method="POST" action="{{ route('popup.lead.store') }}" id="featuresLeadForm" style="display:flex;flex-direction:column;gap:12px;">
      @csrf
      <div style="position:relative;">
        <span style="position:absolute;top:50%;left:14px;transform:translateY(-50%);color:#A89888;pointer-events:none;">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </span>
        <input type="text" name="full_name" class="ft-popup-input" placeholder="Your Full Name" required autocomplete="name">
      </div>
      <div style="position:relative;">
        <span style="position:absolute;top:50%;left:14px;transform:translateY(-50%);color:#A89888;pointer-events:none;">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </span>
        <input type="tel" name="phone" class="ft-popup-input" placeholder="Phone Number" required autocomplete="tel">
      </div>
      <div style="position:relative;">
        <span style="position:absolute;top:50%;left:14px;transform:translateY(-50%);color:#A89888;pointer-events:none;">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </span>
        <input type="text" name="restaurant_name" class="ft-popup-input" placeholder="Restaurant Name" required>
      </div>
      <div style="position:relative;">
        <span style="position:absolute;top:50%;left:14px;transform:translateY(-50%);color:#A89888;pointer-events:none;">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </span>
        <input type="text" name="city" class="ft-popup-input" placeholder="City / Location" required>
      </div>
      <p style="font-size:12px;color:var(--ink-faint);margin-top:2px;">🔒 We respect your privacy. No spam guaranteed.</p>
      <button type="submit" style="width:100%;background:var(--brown);color:#FFFFFF;font-weight:700;font-size:0.95rem;padding:14px;border:none;border-radius:14px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:background .2s;">
        <span>Request Free Demo Now</span>
        <span>&rarr;</span>
      </button>
    </form>
  </div>
</div>

</div>{{-- end .ft-page --}}

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  window.addEventListener('scroll', function() {
    const nav = document.getElementById('nb');
    if (nav) {
      if (window.scrollY > 20) {
        nav.classList.add('s');
      } else {
        nav.classList.remove('s');
      }
    }
  });

  const hmb = document.getElementById('hmb');
  const mnav = document.getElementById('mnav');
  if (hmb && mnav) {
    hmb.addEventListener('click', function() {
      mnav.classList.add('open');
    });
  }
  document.addEventListener("DOMContentLoaded", function(){
    AOS.init({duration:800,once:true});

    var form = document.getElementById("featuresLeadForm");
    if(form){
      form.addEventListener("submit", function(e){
        e.preventDefault();
        var fd = new FormData(form);
        var btn = form.querySelector("button[type='submit']");
        btn.disabled = true;
        btn.innerHTML = "<span>Submitting...</span>";
        fetch(form.action, {
          method:"POST",
          headers:{'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value},
          body:fd
        }).then(function(){
          var card = document.querySelector(".ft-popup-card");
          card.innerHTML = '<button type="button" class="ft-popup-close" onclick="closePopup()">✕</button><div style="text-align:center;padding:30px 0;"><div style="width:56px;height:56px;border-radius:50%;background:#E6F7ED;color:#1E7E34;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;"><svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></div><h3 style="font-family:Fraunces,serif;font-size:1.4rem;font-weight:650;color:#2A2420;margin-bottom:8px;">Demo Request Received!</h3><p style="font-size:0.9rem;color:#645B51;">Our team will contact you shortly for a personalized walkthrough.</p><button type="button" onclick="closePopup()" style="margin-top:20px;background:#4A3524;color:#fff;border:none;padding:10px 24px;border-radius:999px;font-weight:600;cursor:pointer;">Got It</button></div>';
        }).catch(function(){
          btn.disabled = false;
          btn.innerHTML = "<span>Request Free Demo Now</span><span>&rarr;</span>";
          alert("Something went wrong. Please call +91 8667205661.");
        });
      });
    }
  });

  // ===== INTERACTIVE 17-MODULE SUITE RING LOGIC =====
  var suiteFeaturesData = @json($suiteFeatures);
  var currentSuiteIdx = 0;
  var suiteIntervalTimer = null;
  var suiteIsPaused = false;

  function selectSuiteFeature(index) {
    if (!suiteFeaturesData || suiteFeaturesData.length === 0) return;

    var len = suiteFeaturesData.length;
    if (index < 0) index = len - 1;
    if (index >= len) index = 0;

    currentSuiteIdx = index;
    var data = suiteFeaturesData[index];

    // 1. Desktop Orbit Nodes Highlight
    var orbitNodes = document.querySelectorAll('.ft-suite-node');
    orbitNodes.forEach(function(node, i) {
      if (i === index) {
        node.classList.add('active');
      } else {
        node.classList.remove('active');
      }
    });

    // 2. Mobile Rail Pills Highlight & Auto Scroll
    var railPills = document.querySelectorAll('.ft-suite-rail-pill');
    railPills.forEach(function(pill, i) {
      if (i === index) {
        pill.classList.add('active');
        pill.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      } else {
        pill.classList.remove('active');
      }
    });

    // 3. Central Detail Card Content Update
    var numEl = document.getElementById('ftCardNum');
    var titleEl = document.getElementById('ftCardTitle');
    var subEl = document.getElementById('ftCardSub');
    var pointsEl = document.getElementById('ftCardPoints');
    var btnEl = document.getElementById('ftCardBtn');
    var btnTextEl = document.getElementById('ftCardBtnText');
    var imgEl = document.getElementById('ftCardImg');
    var tooltipTextEl = document.getElementById('ftCardTooltipText');

    if (numEl) numEl.textContent = data.num;
    if (titleEl) titleEl.textContent = data.title;
    if (subEl) subEl.textContent = data.subtitle;

    if (pointsEl && data.points) {
      var pointsHtml = '';
      data.points.forEach(function(pt) {
        pointsHtml += '<div class="ft-card-point">' +
          '<div class="ft-card-point-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>' +
          '<span>' + pt + '</span>' +
          '</div>';
      });
      pointsEl.innerHTML = pointsHtml;
    }

    if (btnEl) btnEl.href = '#' + data.id;
    if (btnTextEl) btnTextEl.textContent = 'Explore ' + data.title;

    if (imgEl) {
      imgEl.style.opacity = '0.3';
      imgEl.style.transform = 'scale(0.96)';
      setTimeout(function() {
        imgEl.src = data.img;
        imgEl.alt = data.title;
        imgEl.style.opacity = '1';
        imgEl.style.transform = 'scale(1)';
      }, 150);
    }

    if (tooltipTextEl) tooltipTextEl.textContent = data.badge;
  }

  // Prev & Next Button Controls
  document.addEventListener("DOMContentLoaded", function() {
    var prevBtn = document.getElementById('ftSuitePrev');
    var nextBtn = document.getElementById('ftSuiteNext');

    if (prevBtn) {
      prevBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        suiteIsPaused = true;
        selectSuiteFeature(currentSuiteIdx - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        suiteIsPaused = true;
        selectSuiteFeature(currentSuiteIdx + 1);
      });
    }

    // Auto-rotate every 6.5 seconds unless user hovers
    var suiteSection = document.getElementById('suite');
    if (suiteSection) {
      suiteSection.addEventListener('mouseenter', function() { suiteIsPaused = true; });
      suiteSection.addEventListener('mouseleave', function() { suiteIsPaused = false; });
    }

    if (suiteIntervalTimer) clearInterval(suiteIntervalTimer);
    suiteIntervalTimer = setInterval(function() {
      if (!suiteIsPaused) {
        selectSuiteFeature(currentSuiteIdx + 1);
      }
    }, 6500);
  });

  function openPopup(){
    var p = document.getElementById("leadPopup");
    if(p) p.style.display = "flex";
  }
  function closePopup(){
    var p = document.getElementById("leadPopup");
    if(p) p.style.display = "none";
  }
  window.addEventListener("click", function(e){
    var p = document.getElementById("leadPopup");
    if(e.target === p) closePopup();
  });
</script>

@endsection
