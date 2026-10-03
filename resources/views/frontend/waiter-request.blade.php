@extends('layouts.frontend-master')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

<style>
:root{
  --br:#876039;--br-dk:#6f4e2d;--br-lt:#f4efe9;--br-g:#b88e56;
  --bg:#fff;--bg2:#f9f6f0;--bg3:#f3ece1;
  --ink:#1e140e;--mute:#6b6259;--line:rgba(135,96,57,.13);
  --card:#fff;
  --s1:0 2px 10px rgba(30,20,14,.05);
  --s2:0 8px 32px rgba(30,20,14,.09);
  --s3:0 20px 50px rgba(30,20,14,.13);
  --green:#10b981;--amber:#f59e0b;--red:#ef4444;--blue:#3b82f6;
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;font:400 16px/1.65 'Plus Jakarta Sans',sans-serif;color:var(--ink);background:var(--bg);overflow-x:hidden;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4,h5{margin:0;font-family:'Outfit',sans-serif;font-weight:800;line-height:1.15;letter-spacing:-.025em;color:var(--ink)}
h1{font-size:clamp(34px,4.8vw,58px)}
h2{font-size:clamp(28px,3.6vw,44px)}
h3{font-size:20px;font-weight:700}
p{margin:0;color:var(--mute);font-size:16px;line-height:1.65}
a{color:inherit;text-decoration:none}
ul{list-style:none;margin:0;padding:0}

/* SF = serif italic accent */
.sf{font-family:'Playfair Display',Georgia,serif;font-style:italic;font-weight:700;
  background:linear-gradient(135deg,#876039,#b88e56);
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;display:inline-block}

/* Eyebrow badge */
.eb{display:inline-flex;align-items:center;gap:6px;font-size:11px;letter-spacing:.18em;
  font-weight:800;text-transform:uppercase;color:var(--br);margin-bottom:14px;
  background:linear-gradient(135deg,#fbf7f2,#f4efe9);padding:6px 16px;border-radius:99px;
  border:1px solid rgba(135,96,57,.2);font-family:'Plus Jakarta Sans',sans-serif}

/* Layout */
.w{max-width:1240px;margin:auto;padding:0 24px;position:relative;z-index:1}
section{padding:clamp(56px,7vw,96px) 0;background:var(--bg);position:relative;overflow:hidden}
.hd{max-width:720px;margin:0 auto 48px;text-align:center}
.hd p{margin-top:14px;font-size:17px}
.two{display:grid;grid-template-columns:1fr 1fr;gap:52px;align-items:center}
.hs{display:grid;grid-template-columns:1fr 1.18fr;gap:40px;align-items:center}

/* Buttons */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;
  padding:13px 26px;border-radius:11px;font:700 15px 'Plus Jakarta Sans',sans-serif;
  border:1.5px solid var(--br);transition:.22s ease;cursor:pointer;text-decoration:none}
.btn.p{background:linear-gradient(135deg,#876039,#a07040);color:#fff;box-shadow:0 4px 14px rgba(135,96,57,.28)}
.btn.p:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(135,96,57,.38)}
.btn.o{color:var(--br);background:#fff}
.btn.o:hover{background:var(--br);color:#fff;transform:translateY(-2px)}

/* Breadcrumb */
.bc{padding:104px 0 16px;background:var(--bg2);border-bottom:1px solid var(--line);
  font-size:13px;color:var(--mute);font-weight:600}
.bc .w{display:flex;align-items:center;gap:7px;flex-wrap:wrap}
.bc a{color:var(--mute);transition:color .2s}
.bc a:hover{color:var(--br)}
.bc span.cur{color:var(--br);font-weight:700}

/* Card + Icon */
.card{position:relative;overflow:hidden;background:var(--card);border:1px solid var(--line);
  border-radius:18px;box-shadow:var(--s1);transition:transform .28s,box-shadow .28s,border-color .28s}
.card:hover{border-color:rgba(135,96,57,.28);box-shadow:var(--s2)}
.ic{width:44px;height:44px;border-radius:12px;background:var(--bg2);color:var(--br);
  display:grid;place-items:center;flex:none;border:1px solid var(--line);transition:.28s}
.ic svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:1.8;
  stroke-linecap:round;stroke-linejoin:round}
.card:hover .ic{background:var(--br);color:#fff;border-color:var(--br)}

/* Window chrome */
.win{background:#fff;border:1px solid var(--line);border-radius:18px;
  overflow:hidden;box-shadow:var(--s2);font-size:13px}
.wb{display:flex;align-items:center;justify-content:space-between;
  padding:11px 16px;background:var(--bg2);border-bottom:1px solid var(--line);flex-wrap:wrap;gap:8px}
.wb .dots{display:flex;gap:5px}
.wb i{width:9px;height:9px;border-radius:50%;display:inline-block}
.wb i:nth-child(1){background:#ff5f56}
.wb i:nth-child(2){background:#ffbd2e}
.wb i:nth-child(3){background:#27c93f}
.wb .wt{color:var(--br);font-weight:800;font-family:'Outfit',sans-serif;
  letter-spacing:.06em;font-size:11px;text-transform:uppercase}

/* Status badges */
.bdg{font-size:10px;font-weight:800;padding:3px 9px;border-radius:7px;
  text-transform:uppercase;display:inline-block;letter-spacing:.04em}
.bdg.new{background:#fef3c7;color:#92400e}
.bdg.ip{background:#dbeafe;color:#1e40af}
.bdg.done{background:#d1fae5;color:#065f46}
.bdg.urg{background:#fee2e2;color:#991b1b}

/* Request card */
.req-card{padding:14px 16px;background:#fff;border:1px solid var(--line);
  border-radius:14px;display:flex;justify-content:space-between;
  align-items:center;gap:12px;transition:.22s}
.req-card:hover{border-color:rgba(135,96,57,.28);box-shadow:var(--s1)}
.req-card.new-r{border-left:3px solid var(--amber)}
.req-card.ip-r{border-left:3px solid var(--blue)}
.req-card.done-r{border-left:3px solid var(--green)}
.req-tbl{font-size:10px;font-weight:800;color:var(--br);letter-spacing:.1em;
  text-transform:uppercase;margin-bottom:3px}
.req-type{font-weight:800;font-size:14px;color:var(--ink)}
.req-meta{font-size:11px;color:var(--mute);margin-top:2px}
.req-act{padding:5px 13px;border-radius:8px;font-size:11px;font-weight:800;
  cursor:pointer;border:1px solid var(--line);background:var(--bg2);color:var(--ink);white-space:nowrap;transition:.18s}
.req-act:hover{background:var(--br);color:#fff;border-color:var(--br)}
.req-act.done-btn{background:#d1fae5;color:#065f46;border-color:#a7f3d0}

/* Table grid (floor plan) */
.tbl-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:12px}
.tbl-node{padding:16px 10px;border-radius:14px;text-align:center;
  border:2px solid;cursor:pointer;transition:transform .2s,box-shadow .2s}
.tbl-node:hover{transform:translateY(-3px);box-shadow:var(--s2)}
.tbl-node.idle{border-color:var(--line);background:#fff}
.tbl-node.active-r{border-color:var(--amber);background:#fffbeb}
.tbl-node.done-r{border-color:var(--green);background:#ecfdf5}
.tbl-num{font-weight:900;font-size:15px;font-family:'Outfit',sans-serif;margin-bottom:4px}
.tbl-lbl{font-size:10px;font-weight:700;margin-top:6px;padding:2px 8px;
  border-radius:5px;display:inline-block}
.tbl-node.active-r .tbl-lbl{background:var(--amber);color:#fff}
.tbl-node.done-r .tbl-lbl{background:var(--green);color:#fff}
.tbl-node.idle .tbl-lbl{background:var(--bg2);color:var(--mute)}

/* Workflow steps */
.wflow{display:flex;align-items:flex-start;justify-content:center;gap:0}
.wf-step{position:relative;z-index:1;text-align:center;flex:1}
.wf-icon{width:48px;height:48px;border-radius:50%;border:2px solid var(--br);
  color:var(--br);display:grid;place-items:center;margin:0 auto 12px;
  font-weight:800;font-size:15px;transition:.3s;background:#fff;
  font-family:'Outfit',sans-serif}
.wf-step.active .wf-icon{background:var(--br);color:#fff;
  box-shadow:0 4px 14px rgba(135,96,57,.32)}
.wf-step h5{font-size:13px;font-weight:800;color:var(--ink);margin-bottom:4px}
.wf-step p{font-size:11px;color:var(--mute)}
.wf-line{flex:1;height:2px;background:var(--line);margin-top:24px;max-width:60px;align-self:flex-start;margin-top:23px}
.wf-line.active{background:var(--br)}

/* Bar chart */
.bar-chart{display:flex;flex-direction:column;gap:12px}
.bar-row{display:flex;align-items:center;gap:12px;font-size:12px}
.bar-lbl{width:72px;color:var(--mute);font-weight:700;text-align:right;flex:none}
.bar-trk{flex:1;height:10px;background:#e8ddd0;border-radius:5px;overflow:hidden}
.bar-fill{height:100%;background:linear-gradient(90deg,#876039,#a87646);
  border-radius:5px;transition:width 1.2s cubic-bezier(.16,1,.3,1);width:0}
.bar-count{width:60px;font-size:12px;color:var(--ink);font-weight:700;flex:none}

/* Phone mockup */
.ph-wrap{width:258px;border-radius:38px;background:#1a1310;padding:9px;
  box-shadow:0 24px 52px rgba(30,20,14,.32),0 0 0 2px #3a2f25;flex:none}
.ph-in{height:520px;border-radius:32px;background:#fff;
  overflow:hidden;display:flex;flex-direction:column}
.ph-top{background:linear-gradient(135deg,#876039,#a07040);padding:18px 16px 14px;color:#fff}
.ph-title{font-weight:800;font-size:14px;font-family:'Outfit',sans-serif}
.ph-sub{font-size:10px;opacity:.8;margin-top:2px}
.ph-body{flex:1;overflow-y:auto;padding:12px;display:flex;flex-direction:column;gap:9px;scrollbar-width:none}
.ph-tbl{background:var(--br-lt);border:1px solid var(--line);border-radius:12px;
  padding:10px 12px;text-align:center;margin-bottom:4px}
.ph-tbl-lbl{font-size:10px;font-weight:800;color:var(--br);letter-spacing:.1em;text-transform:uppercase}
.ph-tbl-num{font-size:22px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--ink)}
.ph-help{font-size:11px;font-weight:600;color:var(--mute);margin-bottom:8px;text-align:center}
.ph-btn{width:100%;padding:10px 14px;border-radius:10px;border:1px solid var(--line);
  background:#fff;font-weight:700;font-size:12px;color:var(--ink);
  display:flex;align-items:center;gap:9px;cursor:pointer;transition:.18s}
.ph-btn:hover{border-color:var(--br);background:var(--br-lt)}
.ph-btn svg{width:15px;height:15px;stroke:var(--br);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;flex:none}

/* FAQ */
.faq-list{max-width:820px;margin:0 auto;display:flex;flex-direction:column;gap:12px}
.faq-item{background:#fff;border:1px solid var(--line);border-radius:14px;overflow:hidden;transition:.2s}
.faq-item.open{border-color:var(--br);box-shadow:0 4px 16px rgba(135,96,57,.1)}
.faq-q{padding:18px 22px;font-size:16px;font-weight:700;color:var(--ink);
  cursor:pointer;display:flex;justify-content:space-between;align-items:center;
  user-select:none;gap:12px}
.faq-q svg{width:18px;height:18px;transition:transform .3s;stroke:var(--br);flex:none}
.faq-item.open .faq-q svg{transform:rotate(180deg)}
.faq-a{padding:0 22px;max-height:0;overflow:hidden;
  transition:max-height .4s ease,padding .3s;font-size:14px;color:var(--mute);line-height:1.65}
.faq-item.open .faq-a{max-height:220px;padding:14px 22px 18px;
  border-top:1px solid rgba(135,96,57,.08)}

/* Ecosystem flow */
.eco{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:6px}
.eco-nd{display:flex;flex-direction:column;align-items:center;gap:6px;
  padding:14px 16px;background:#fff;border:1px solid var(--line);
  border-radius:14px;font-weight:700;font-size:12px;color:var(--ink);
  transition:.28s;min-width:84px;text-align:center}
.eco-nd svg{width:20px;height:20px;fill:none;stroke:var(--mute);stroke-width:1.8;transition:.28s}
.eco-nd.prime{background:var(--br);color:#fff;border-color:var(--br-dk);box-shadow:var(--s1)}
.eco-nd.prime svg{stroke:rgba(255,255,255,.8)}
.eco-nd:hover{border-color:rgba(135,96,57,.35);box-shadow:var(--s1)}
.eco-arr{color:var(--br);font-size:16px;opacity:.5;margin:0 4px}

/* Reveal */
.r{opacity:0;transform:translateY(20px);transition:opacity .6s cubic-bezier(.16,1,.3,1),transform .6s cubic-bezier(.16,1,.3,1)}
.r.in{opacity:1;transform:none}
.r.d1{transition-delay:.1s}.r.d2{transition-delay:.2s}.r.d3{transition-delay:.3s}

/* Industry cards */
.ind-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.ind-card{border-radius:16px;overflow:hidden;background:#fff;
  border:1px solid var(--line);transition:transform .28s,box-shadow .28s}
.ind-card:hover{transform:translateY(-4px);box-shadow:var(--s2);
  border-color:rgba(135,96,57,.28)}
.ind-img{height:170px;background-size:cover;background-position:center;position:relative}
.ind-ov{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(30,20,14,.84) 100%)}
.ind-ic{position:absolute;bottom:12px;left:14px;width:32px;height:32px;
  border-radius:9px;background:rgba(255,255,255,.16);backdrop-filter:blur(8px);
  display:grid;place-items:center;color:#fff;border:1px solid rgba(255,255,255,.22)}
.ind-ic svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2}
.ind-cn{padding:16px}
.ind-cn h4{font-size:16px;margin-bottom:5px}
.ind-cn p{font-size:13px}

/* Service journey */
.journey{display:flex;flex-direction:column;gap:0;max-width:500px;margin:0 auto}
.jstep{display:flex;align-items:flex-start;gap:16px;padding-bottom:24px;position:relative}
.jstep:not(:last-child)::before{content:'';position:absolute;left:19px;top:40px;
  bottom:0;width:2px;background:linear-gradient(180deg,var(--br),var(--line))}
.jstep-icon{width:40px;height:40px;border-radius:50%;background:var(--br-lt);
  border:2px solid var(--br);display:grid;place-items:center;color:var(--br);
  flex:none;transition:.28s}
.jstep.hi .jstep-icon{background:var(--br);color:#fff;box-shadow:0 4px 12px rgba(135,96,57,.3)}
.jstep-content h5{font-size:15px;font-weight:800;color:var(--ink);margin-bottom:3px}
.jstep-content p{font-size:13px}

/* Inline SVG icon util */
.svg-icon{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}

/* Stats row */
.stats-row{display:flex;gap:24px;flex-wrap:wrap}
.stat-box{flex:1;min-width:120px;padding:20px 24px;background:#fff;
  border:1px solid var(--line);border-radius:16px;text-align:center}
.stat-val{font-size:36px;font-weight:900;font-family:'Outfit',sans-serif;
  color:var(--br);line-height:1}
.stat-lbl{font-size:13px;font-weight:700;color:var(--ink);margin-top:6px}

/* Responsive */
@media(max-width:1024px){
  nav ul.mn{display:none}
  .hm{display:block}
  .ind-grid{grid-template-columns:repeat(3,1fr)}
  .eco{gap:8px}
  .eco-arr{display:none}
}
@media(max-width:768px){
  .bc{padding:85px 0 14px}
  .w{padding:0 16px}
  .hs,.two{grid-template-columns:1fr!important}
  .tbl-grid{grid-template-columns:repeat(3,1fr)}
  .wflow{flex-wrap:wrap;gap:24px}
  .wf-line{display:none}
  .ph-wrap{width:100%;max-width:300px;margin:0 auto}
  .stats-row{gap:12px}
  .win{min-width:0!important;width:100%;overflow-x:auto}
}
@media(max-width:640px){
  .ind-grid{grid-template-columns:1fr}
  .tbl-grid{grid-template-columns:repeat(2,1fr)}
  .stat-val{font-size:28px}
}
@media(max-width:480px){
  .btn{width:100%}
}
</style>
<!-- BREADCRUMB -->
<div class="bc">
  <div class="w">
    <a href="{{ route('home') }}">Home</a>
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('features') }}">Features</a>
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="cur">Waiter Requests</span>
  </div>
</div>

<!-- ===== HERO ===== -->
<section style="background:linear-gradient(160deg,var(--bg2) 0%,#fff 60%);padding-top:clamp(52px,6vw,80px)">
<div class="w">
  <div class="hs">
    <div class="r in">
      <div class="eb">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        WAITER REQUESTS
      </div>
      <h1>Every Table.<br>Every Request.<br><span class="sf">Right on Time.</span></h1>
      <p style="margin:20px 0 32px;font-size:17px;max-width:500px;line-height:1.7">
        Give guests an easier way to ask for assistance while helping your service team respond faster. Geni Menu connects table-side requests directly with your restaurant team.
      </p>
      <div style="display:flex;gap:12px;flex-wrap:wrap">
        <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
      </div>
      <div style="margin-top:26px;font-size:13px;color:var(--mute);font-weight:600;display:flex;align-items:center;gap:18px;flex-wrap:wrap">
        <span style="display:flex;align-items:center;gap:5px">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Real-time Request Tracking
        </span>
        <span style="display:flex;align-items:center;gap:5px">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Table-linked Visibility
        </span>
        <span style="display:flex;align-items:center;gap:5px">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Smoother Table-side Service
        </span>
      </div>
    </div>

    <!-- Hero Dashboard -->
    <div class="win r in d1" style="box-shadow:var(--s3);position:relative">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="wt">WAITER REQUESTS — LIVE</div>
        <div style="font-size:10px;background:var(--br-lt);color:var(--br);padding:3px 10px;border-radius:7px;font-weight:800">Today · 29 Sep</div>
      </div>
      <div style="padding:14px;background:#fff">
        <!-- Stats row -->
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:14px">
          <div style="text-align:center;padding:10px 8px;background:var(--bg2);border-radius:10px;border:1px solid var(--line)">
            <div style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:#92400e">08</div>
            <div style="font-size:10px;font-weight:700;color:var(--mute);margin-top:2px">New</div>
          </div>
          <div style="text-align:center;padding:10px 8px;background:var(--bg2);border-radius:10px;border:1px solid var(--line)">
            <div style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--blue)">05</div>
            <div style="font-size:10px;font-weight:700;color:var(--mute);margin-top:2px">In Progress</div>
          </div>
          <div style="text-align:center;padding:10px 8px;background:var(--bg2);border-radius:10px;border:1px solid var(--line)">
            <div style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--green)">24</div>
            <div style="font-size:10px;font-weight:700;color:var(--mute);margin-top:2px">Completed</div>
          </div>
        </div>
        <!-- Request list -->
        <div style="display:flex;flex-direction:column;gap:7px">
          <div class="req-card new-r">
            <div><div class="req-tbl">TABLE 08</div><div class="req-type">Call Waiter</div><div class="req-meta">2 min ago</div></div>
            <div style="display:flex;align-items:center;gap:7px"><span class="bdg new">New</span><button class="req-act">Respond</button></div>
          </div>
          <div class="req-card ip-r">
            <div><div class="req-tbl">TABLE 14</div><div class="req-type">Extra Water</div><div class="req-meta">4 min ago</div></div>
            <div style="display:flex;align-items:center;gap:7px"><span class="bdg ip">In Progress</span><button class="req-act">View</button></div>
          </div>
          <div class="req-card done-r">
            <div><div class="req-tbl">TABLE 05</div><div class="req-type">Request Bill</div><div class="req-meta">7 min ago</div></div>
            <div style="display:flex;align-items:center;gap:7px"><span class="bdg done">Completed</span><button class="req-act done-btn">Done ✓</button></div>
          </div>
          <div class="req-card new-r">
            <div><div class="req-tbl">TABLE 21</div><div class="req-type">Extra Spoon</div><div class="req-meta">9 min ago</div></div>
            <div style="display:flex;align-items:center;gap:7px"><span class="bdg new">New</span><button class="req-act">Respond</button></div>
          </div>
        </div>
      </div>
      <!-- Notification bubble -->
      <div style="position:absolute;bottom:14px;right:14px;background:#fff;border:2px solid var(--br);
        border-radius:14px;padding:10px 12px;box-shadow:var(--s3);font-size:12px;
        display:flex;gap:9px;align-items:center;z-index:10;animation:floatUp .4s ease 1.4s both">
        <div style="width:30px;height:30px;border-radius:50%;background:var(--br-lt);
          color:var(--br);display:grid;place-items:center;flex:none">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <div>
          <div style="font-size:9px;font-weight:800;color:var(--br);letter-spacing:.08em">NEW REQUEST</div>
          <div style="font-weight:800;color:var(--ink);font-size:12px">Table 08 — Call Waiter</div>
          <div style="font-size:10px;color:var(--mute)">Just now</div>
        </div>
        <button style="background:var(--br);color:#fff;border:0;padding:5px 10px;
          border-radius:7px;font-weight:800;font-size:10px;cursor:pointer;white-space:nowrap">Respond</button>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== VALUE STRIP ===== -->
<section style="padding:36px 0;background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
<div class="w">
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px">
    <div class="card r d1" style="padding:22px">
      <div class="ic" style="margin-bottom:12px"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:5px">Faster Response</h4>
      <p style="font-size:13px">Help staff see customer requests without constantly checking every table.</p>
    </div>
    <div class="card r d1" style="padding:22px">
      <div class="ic" style="margin-bottom:12px"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:5px">Clear Table Requests</h4>
      <p style="font-size:13px">Know exactly which table needs attention and what the guest needs.</p>
    </div>
    <div class="card r d2" style="padding:22px">
      <div class="ic" style="margin-bottom:12px"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:5px">Better Guest Experience</h4>
      <p style="font-size:13px">Reduce unnecessary waiting and make service feel more responsive.</p>
    </div>
    <div class="card r d2" style="padding:22px">
      <div class="ic" style="margin-bottom:12px"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:5px">Smoother Team Coordination</h4>
      <p style="font-size:13px">Keep waiter requests visible to the right restaurant team members.</p>
    </div>
  </div>
</div>
</section>

<!-- ===== PROBLEM SECTION ===== -->
<section>
<div class="w">
  <div class="hd r">
    <h2>Stop Making Guests Wait<br>for <span class="sf">Attention.</span></h2>
    <p>In a busy restaurant, guests may need a waiter, water, extra cutlery, the bill or assistance — but staff may not immediately notice. Geni Menu makes it easier to connect table-side needs with the team.</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:28px;align-items:stretch">
    <!-- Without -->
    <div class="r d1" style="border-radius:20px;padding:28px;background:#fff5f5;border:1.5px solid #fecdd3">
      <div style="display:flex;align-items:center;gap:11px;margin-bottom:22px">
        <div style="width:36px;height:36px;border-radius:11px;background:#fee2e2;color:#dc2626;display:grid;place-items:center">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </div>
        <h3 style="color:#991b1b;font-size:17px">Traditional Service</h3>
      </div>
      <div style="display:flex;flex-direction:column;gap:7px">
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid #fca5a5;font-weight:700;color:#7f1d1d;font-size:13px">Guest looks around for help</div>
        <div style="text-align:center;color:#ef4444;font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid #fca5a5;font-weight:700;color:#7f1d1d;font-size:13px">Tries to get waiter's attention</div>
        <div style="text-align:center;color:#ef4444;font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid #fca5a5;font-weight:700;color:#7f1d1d;font-size:13px">Waits... waiter is busy</div>
        <div style="text-align:center;color:#ef4444;font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid #fca5a5;font-weight:700;color:#7f1d1d;font-size:13px">Waiter notices (eventually)</div>
        <div style="text-align:center;color:#ef4444;font-weight:800;font-size:16px">↓</div>
        <div style="padding:12px 14px;background:#fee2e2;border-radius:11px;border:1.5px solid #dc2626;font-weight:800;color:#dc2626;font-size:13px;text-align:center">Request handled — after a delay</div>
      </div>
    </div>
    <!-- With Geni Menu -->
    <div class="r d2" style="border-radius:20px;padding:28px;background:#fbf7f2;border:2px solid var(--br);box-shadow:var(--s2)">
      <div style="display:flex;align-items:center;gap:11px;margin-bottom:22px">
        <div style="width:36px;height:36px;border-radius:11px;background:var(--br);color:#fff;display:grid;place-items:center">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 style="color:var(--br);font-size:17px">With Geni Menu</h3>
      </div>
      <div style="display:flex;flex-direction:column;gap:7px">
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid var(--line);font-weight:700;color:var(--ink);font-size:13px">Guest sends a request from the table</div>
        <div style="text-align:center;color:var(--br);font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid var(--line);font-weight:700;color:var(--ink);font-size:13px">Restaurant team receives notification</div>
        <div style="text-align:center;color:var(--br);font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid var(--line);font-weight:700;color:var(--ink);font-size:13px">Staff member responds</div>
        <div style="text-align:center;color:var(--br);font-weight:800;font-size:16px">↓</div>
        <div style="padding:10px 14px;background:#fff;border-radius:11px;border:1px solid var(--line);font-weight:700;color:var(--ink);font-size:13px">Request marked as complete</div>
        <div style="text-align:center;color:var(--br);font-weight:800;font-size:16px">↓</div>
        <div style="padding:12px 14px;background:linear-gradient(135deg,#876039,#a07040);border-radius:11px;color:#fff;font-weight:800;font-size:13px;text-align:center">Smooth, organized table-side service</div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== REQUEST DASHBOARD ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="hd r">
    <h2>See Every Request.<br>From <span class="sf">One Place.</span></h2>
    <p>Give your service team a clear view of table-side requests so nothing gets overlooked during busy service.</p>
  </div>
  <div class="win r" style="box-shadow:var(--s3)">
    <div class="wb" style="flex-wrap:wrap;gap:10px">
      <div class="dots"><i></i><i></i><i></i></div>
      <div class="wt">WAITER REQUESTS CONSOLE</div>
      <div style="display:flex;gap:6px;flex-wrap:wrap">
        <button style="padding:4px 11px;border-radius:7px;border:1px solid var(--br);background:var(--br);color:#fff;font-size:11px;font-weight:800;cursor:pointer">All</button>
        <button style="padding:4px 11px;border-radius:7px;border:1px solid var(--line);background:#fff;font-size:11px;font-weight:700;cursor:pointer">New</button>
        <button style="padding:4px 11px;border-radius:7px;border:1px solid var(--line);background:#fff;font-size:11px;font-weight:700;cursor:pointer">In Progress</button>
        <button style="padding:4px 11px;border-radius:7px;border:1px solid var(--line);background:#fff;font-size:11px;font-weight:700;cursor:pointer">Completed</button>
      </div>
    </div>
    <div style="padding:18px;background:#fff">
      <div style="display:grid;grid-template-columns:1fr 180px;gap:16px">
        <div>
          <div style="font-size:10px;font-weight:800;color:var(--mute);letter-spacing:.1em;text-transform:uppercase;margin-bottom:12px">TODAY'S REQUESTS</div>
          <div style="display:flex;flex-direction:column;gap:8px">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border:1px solid var(--line);border-left:3px solid var(--amber);border-radius:12px">
              <div><div style="font-size:10px;font-weight:800;color:var(--br);letter-spacing:.08em;text-transform:uppercase">TABLE 08</div><div style="font-weight:800;font-size:14px;color:var(--ink)">Call Waiter</div><div style="font-size:11px;color:var(--mute)">2 min ago</div></div>
              <div style="display:flex;align-items:center;gap:7px"><span class="bdg new">New</span><button class="req-act">Respond</button></div>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border:1px solid var(--line);border-left:3px solid var(--blue);border-radius:12px">
              <div><div style="font-size:10px;font-weight:800;color:var(--br);letter-spacing:.08em;text-transform:uppercase">TABLE 14</div><div style="font-weight:800;font-size:14px;color:var(--ink)">Extra Water</div><div style="font-size:11px;color:var(--mute)">4 min ago</div></div>
              <div style="display:flex;align-items:center;gap:7px"><span class="bdg ip">In Progress</span><button class="req-act">View</button></div>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border:1px solid var(--line);border-left:3px solid var(--green);border-radius:12px;opacity:.75">
              <div><div style="font-size:10px;font-weight:800;color:var(--br);letter-spacing:.08em;text-transform:uppercase">TABLE 05</div><div style="font-weight:800;font-size:14px;color:var(--ink)">Request Bill</div><div style="font-size:11px;color:var(--mute)">7 min ago</div></div>
              <div style="display:flex;align-items:center;gap:7px"><span class="bdg done">Completed</span><button class="req-act done-btn">Done ✓</button></div>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border:1px solid var(--line);border-left:3px solid var(--amber);border-radius:12px">
              <div><div style="font-size:10px;font-weight:800;color:var(--br);letter-spacing:.08em;text-transform:uppercase">TABLE 21</div><div style="font-weight:800;font-size:14px;color:var(--ink)">Extra Spoon</div><div style="font-size:11px;color:var(--mute)">9 min ago</div></div>
              <div style="display:flex;align-items:center;gap:7px"><span class="bdg new">New</span><button class="req-act">Respond</button></div>
            </div>
          </div>
        </div>
        <!-- Summary sidebar -->
        <div style="background:var(--bg2);border-radius:14px;padding:16px;border:1px solid var(--line);display:flex;flex-direction:column;gap:12px">
          <div style="font-size:10px;font-weight:800;color:var(--mute);letter-spacing:.1em;text-transform:uppercase;margin-bottom:4px">SUMMARY</div>
          <div style="display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--mute)">New Requests</span>
            <span style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:#92400e">08</span>
          </div>
          <div style="height:1px;background:var(--line)"></div>
          <div style="display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--mute)">In Progress</span>
            <span style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--blue)">05</span>
          </div>
          <div style="height:1px;background:var(--line)"></div>
          <div style="display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--mute)">Completed</span>
            <span style="font-size:20px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--green)">24</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== COMMON REQUESTS ===== -->
<section>
<div class="w">
  <div class="hd r">
    <div class="eb">REQUEST TYPES</div>
    <h2>Simple Requests. <span class="sf">Clear Actions.</span></h2>
    <p>Restaurant guests can send common table-side requests directly through Geni Menu.</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:16px" class="r">
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Call Waiter</h4>
      <p style="font-size:13px">Guest needs general assistance from staff.</p>
    </div>
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><path d="M20 16V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v9m16 0H2m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Request Water</h4>
      <p style="font-size:13px">Guest needs drinking water brought to the table.</p>
    </div>
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/><path d="M9 7h6M9 11h4"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Request Bill</h4>
      <p style="font-size:13px">Guest is ready to check out and needs the bill.</p>
    </div>
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2"/><path d="M18 15h3"/><path d="M15 2h6v6h-6z"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Extra Cutlery</h4>
      <p style="font-size:13px">Request additional spoons, forks or knives for the table.</p>
    </div>
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Extra Items</h4>
      <p style="font-size:13px">Napkins, plates, glasses or other table items.</p>
    </div>
    <div class="card" style="padding:24px;text-align:center">
      <div class="ic" style="margin:0 auto 14px"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
      <h4 style="font-size:15px;margin-bottom:6px">Custom Request</h4>
      <p style="font-size:13px">Guest communicates another specific requirement.</p>
    </div>
  </div>
</div>
</section>

<!-- ===== TABLE-LINKED REQUESTS ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="two r">
    <div>
      <div class="eb">TABLE-LINKED VISIBILITY</div>
      <h2>Know Exactly Which Table <span class="sf">Needs You.</span></h2>
      <p style="margin:16px 0 24px">Every request is connected to the table that created it, giving your team the context they need to respond quickly.</p>
      <ul style="display:flex;flex-direction:column;gap:11px">
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Table number attached to every request
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Request type and time visible at a glance
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Status updates tracked per table request
        </li>
      </ul>
    </div>
    <!-- Floor plan -->
    <div class="win" style="box-shadow:var(--s2)">
      <div class="wb"><div class="dots"><i></i><i></i><i></i></div><div class="wt">RESTAURANT FLOOR — REQUEST VIEW</div></div>
      <div style="padding:20px;background:#fff">
        <div class="tbl-grid">
          <div class="tbl-node idle"><div class="tbl-num">T01</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T02</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T03</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node active-r" title="Call Waiter"><div class="tbl-num">T04</div><div class="tbl-lbl">Call Waiter</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T05</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T06</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T07</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node active-r" title="Extra Water"><div class="tbl-num">T08</div><div class="tbl-lbl">Extra Water</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T09</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T10</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node done-r" title="Bill Completed"><div class="tbl-num">T11</div><div class="tbl-lbl">Done ✓</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T12</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T13</div><div class="tbl-lbl">Free</div></div>
          <div class="tbl-node active-r" title="Request Bill"><div class="tbl-num">T14</div><div class="tbl-lbl">Req. Bill</div></div>
          <div class="tbl-node idle"><div class="tbl-num">T15</div><div class="tbl-lbl">Free</div></div>
        </div>
        <!-- Legend -->
        <div style="margin-top:16px;padding-top:14px;border-top:1px solid var(--line);display:flex;gap:16px;flex-wrap:wrap;font-size:11px;font-weight:700">
          <span style="display:flex;align-items:center;gap:5px"><i style="width:9px;height:9px;border-radius:50%;background:var(--amber);display:inline-block"></i> Active Request</span>
          <span style="display:flex;align-items:center;gap:5px"><i style="width:9px;height:9px;border-radius:50%;background:var(--green);display:inline-block"></i> Completed</span>
          <span style="display:flex;align-items:center;gap:5px"><i style="width:9px;height:9px;border-radius:50%;background:var(--line);display:inline-block;border:1px solid var(--line)"></i> Free</span>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== STATUS WORKFLOW ===== -->
<section>
<div class="w">
  <div class="hd r"><h2>From Request <span class="sf">to Resolution.</span></h2><p>A simple, clear status path keeps your team informed from the moment a request is created to when it's completed.</p></div>
  <div class="wflow r">
    <div class="wf-step active">
      <div class="wf-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
      <h5>Request Created</h5>
      <p>Guest sends a request from the table.</p>
    </div>
    <div class="wf-line active"></div>
    <div class="wf-step active">
      <div class="wf-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg></div>
      <h5>Team Notified</h5>
      <p>Restaurant team sees the request.</p>
    </div>
    <div class="wf-line active"></div>
    <div class="wf-step active">
      <div class="wf-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
      <h5>Staff Responds</h5>
      <p>The appropriate staff member handles it.</p>
    </div>
    <div class="wf-line active"></div>
    <div class="wf-step active">
      <div class="wf-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
      <h5>Request Completed</h5>
      <p>The request is marked complete.</p>
    </div>
  </div>
</div>
</section>

<!-- ===== REQUEST DETAILS UI ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="two r" style="grid-template-columns:1.1fr 1fr">
    <!-- Detail panel -->
    <div class="win" style="box-shadow:var(--s3)">
      <div class="wb"><div class="dots"><i></i><i></i><i></i></div><div class="wt">REQUEST DETAIL</div><div style="font-size:10px;background:var(--amber);color:#fff;padding:3px 9px;border-radius:6px;font-weight:800">NEW</div></div>
      <div style="padding:22px;background:#fff">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:18px;padding-bottom:18px;border-bottom:1px solid var(--line)">
          <div>
            <div style="font-size:10px;font-weight:800;color:var(--mute);letter-spacing:.1em;text-transform:uppercase;margin-bottom:4px">REQUEST ID</div>
            <div style="font-size:18px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--br)">#REQ-1048</div>
          </div>
          <span class="bdg new" style="font-size:11px;padding:4px 12px">New</span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:13px;margin-bottom:16px">
          <div style="padding:11px 13px;background:var(--bg2);border-radius:10px;border:1px solid var(--line)">
            <div style="font-size:10px;font-weight:800;color:var(--mute);text-transform:uppercase;letter-spacing:.06em;margin-bottom:4px">Table</div>
            <div style="font-weight:800;color:var(--br);font-size:16px">T08</div>
          </div>
          <div style="padding:11px 13px;background:var(--bg2);border-radius:10px;border:1px solid var(--line)">
            <div style="font-size:10px;font-weight:800;color:var(--mute);text-transform:uppercase;letter-spacing:.06em;margin-bottom:4px">Created</div>
            <div style="font-weight:700;color:var(--ink)">12:42 PM</div>
          </div>
          <div style="padding:11px 13px;background:var(--bg2);border-radius:10px;border:1px solid var(--line);grid-column:1/-1">
            <div style="font-size:10px;font-weight:800;color:var(--mute);text-transform:uppercase;letter-spacing:.06em;margin-bottom:4px">Request Type</div>
            <div style="font-weight:800;color:var(--ink);font-size:15px">Extra Water</div>
          </div>
        </div>
        <div style="padding:11px 13px;background:#fffbeb;border:1px solid #fde68a;border-radius:10px;margin-bottom:16px">
          <div style="font-size:10px;font-weight:800;color:#92400e;text-transform:uppercase;letter-spacing:.06em;margin-bottom:4px">Guest Note</div>
          <div style="font-weight:600;color:#78350f;font-size:13px;font-style:italic">"Please bring two bottles."</div>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 13px;background:var(--bg2);border-radius:10px;border:1px solid var(--line);margin-bottom:16px">
          <span style="font-size:13px;font-weight:700;color:var(--mute)">Assigned Staff</span>
          <span style="font-weight:800;color:var(--ink);font-size:13px">Waiter 03</span>
        </div>
        <div style="display:flex;flex-direction:column;gap:8px">
          <button class="btn p" style="justify-content:center;padding:11px;font-size:13px">Accept Request</button>
          <button class="btn o" style="justify-content:center;padding:11px;font-size:13px">Mark In Progress</button>
          <button style="width:100%;padding:11px;border-radius:10px;border:1.5px solid var(--green);
            background:#ecfdf5;color:#065f46;font:700 13px 'Plus Jakarta Sans',sans-serif;cursor:pointer">Complete Request ✓</button>
        </div>
      </div>
    </div>
    <!-- Content -->
    <div>
      <div class="eb">REQUEST DETAILS</div>
      <h2>Help Your Team Respond <span class="sf">With Context.</span></h2>
      <p style="margin:16px 0 24px">Staff can see all the information they need to act on each request without any confusion about which table or what is required.</p>
      <ul style="display:flex;flex-direction:column;gap:12px">
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Table number and request type
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Time of request creation
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Additional notes from the guest
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Current status and assigned staff
        </li>
        <li style="display:flex;align-items:center;gap:11px;font-size:15px;font-weight:600;color:var(--ink)">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Clear action buttons to accept or complete
        </li>
      </ul>
    </div>
  </div>
</div>
</section>

<!-- ===== BUSY HOUR ===== -->
<section>
<div class="w">
  <div class="two r">
    <div>
      <div class="eb">PEAK-HOUR MANAGEMENT</div>
      <h2>Stay Organized When the Dining Room <span class="sf">Gets Busy.</span></h2>
      <p style="margin:16px 0 28px">During peak service periods, multiple requests arrive simultaneously. Having them all visible in one place helps your team stay on top of every table.</p>
      <!-- Bar chart -->
      <div class="bar-chart">
        <div class="bar-row"><span class="bar-lbl">11 AM</span><div class="bar-trk"><div class="bar-fill" data-w="18%"></div></div><span class="bar-count">2 req</span></div>
        <div class="bar-row"><span class="bar-lbl">12 PM</span><div class="bar-trk"><div class="bar-fill" data-w="48%"></div></div><span class="bar-count">5 req</span></div>
        <div class="bar-row"><span class="bar-lbl">1 PM</span><div class="bar-trk"><div class="bar-fill" data-w="70%"></div></div><span class="bar-count">8 req</span></div>
        <div class="bar-row"><span class="bar-lbl">3 PM</span><div class="bar-trk"><div class="bar-fill" data-w="28%"></div></div><span class="bar-count">3 req</span></div>
        <div class="bar-row"><span class="bar-lbl">7 PM</span><div class="bar-trk"><div class="bar-fill" data-w="88%"></div></div><span class="bar-count">10 req</span></div>
        <div class="bar-row"><span class="bar-lbl">8 PM</span><div class="bar-trk"><div class="bar-fill" data-w="100%"></div></div><span class="bar-count">12 req</span></div>
      </div>
    </div>
    <!-- Active requests overlay -->
    <div style="position:relative;border-radius:20px;overflow:hidden;aspect-ratio:4/3">
      <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&auto=format&fit=crop&q=80" alt="Busy restaurant" style="width:100%;height:100%;object-fit:cover" loading="lazy">
      <div style="position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(20,14,10,.88) 100%)"></div>
      <div style="position:absolute;top:16px;left:16px;right:16px">
        <div style="background:rgba(255,255,255,.95);backdrop-filter:blur(10px);border-radius:14px;padding:14px 16px;border:1px solid rgba(135,96,57,.2)">
          <div style="font-size:10px;font-weight:800;color:var(--br);letter-spacing:.1em;text-transform:uppercase;margin-bottom:10px">LIVE REQUEST STATUS</div>
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px">
            <div style="text-align:center">
              <div style="font-size:22px;font-weight:900;font-family:'Outfit',sans-serif;color:#92400e">12</div>
              <div style="font-size:10px;font-weight:700;color:var(--mute)">Active</div>
            </div>
            <div style="text-align:center">
              <div style="font-size:22px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--amber)">08</div>
              <div style="font-size:10px;font-weight:700;color:var(--mute)">New</div>
            </div>
            <div style="text-align:center">
              <div style="font-size:22px;font-weight:900;font-family:'Outfit',sans-serif;color:var(--blue)">04</div>
              <div style="font-size:10px;font-weight:700;color:var(--mute)">In Progress</div>
            </div>
          </div>
        </div>
      </div>
      <div style="position:absolute;bottom:20px;left:20px;right:20px;color:#fff">
        <div style="font-weight:900;font-size:18px;font-family:'Outfit',sans-serif;margin-bottom:4px">Peak Dinner Service — 8 PM</div>
        <div style="font-size:13px;opacity:.85">12 requests across multiple tables, all visible from one dashboard</div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== GUEST EXPERIENCE ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="hd r">
    <div class="eb">GUEST-FACING INTERFACE</div>
    <h2>A Simpler Way for Guests <span class="sf">to Ask for Help.</span></h2>
    <p>Guests send requests directly from their table through a clean, mobile-friendly interface — and the restaurant team receives them instantly.</p>
  </div>
  <div class="two r" style="align-items:flex-start;gap:48px">
    <!-- Phone mockup -->
    <div style="display:flex;justify-content:center">
      <div class="ph-wrap">
        <div class="ph-in">
          <div class="ph-top">
            <div style="font-size:10px;font-weight:700;opacity:.75;letter-spacing:.12em;text-transform:uppercase;margin-bottom:6px">GENI MENU</div>
            <div class="ph-title">How can we help?</div>
            <div class="ph-sub">Table 08 · Tap to send a request</div>
          </div>
          <div class="ph-body">
            <div class="ph-tbl">
              <div class="ph-tbl-lbl">YOUR TABLE</div>
              <div class="ph-tbl-num">08</div>
            </div>
            <div class="ph-help">Select a request type below</div>
            <button class="ph-btn">
              <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
              Call Waiter
            </button>
            <button class="ph-btn">
              <svg viewBox="0 0 24 24"><path d="M20 16V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v9m16 0H2m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/></svg>
              Request Water
            </button>
            <button class="ph-btn">
              <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M9 7h6M9 11h4"/></svg>
              Request Bill
            </button>
            <button class="ph-btn">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
              Extra Items
            </button>
            <button class="ph-btn">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              Custom Request
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Journey -->
    <div style="flex:1">
      <h3 style="font-size:20px;margin-bottom:24px;color:var(--ink)">The Request Journey</h3>
      <div class="journey">
        <div class="jstep hi">
          <div class="jstep-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
          <div class="jstep-content"><h5>Guest Needs Help</h5><p>Guest is seated at Table 08 and needs assistance.</p></div>
        </div>
        <div class="jstep hi">
          <div class="jstep-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div>
          <div class="jstep-content"><h5>Guest Sends Request</h5><p>Guest selects "Call Waiter" from the menu interface.</p></div>
        </div>
        <div class="jstep hi">
          <div class="jstep-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg></div>
          <div class="jstep-content"><h5>Team Sees the Request</h5><p>Restaurant dashboard shows Table 08 — Call Waiter, New.</p></div>
        </div>
        <div class="jstep hi">
          <div class="jstep-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
          <div class="jstep-content"><h5>Staff Responds</h5><p>Waiter heads to Table 08 and marks request in progress.</p></div>
        </div>
        <div class="jstep">
          <div class="jstep-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
          <div class="jstep-content"><h5>Request Completed</h5><p>Staff marks it complete. Guest is helped. Table cleared.</p></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== BENEFITS ===== -->
<section>
<div class="w">
  <div class="hd r"><h2>Built for Better <span class="sf">Table-Side Service.</span></h2></div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:20px" class="r">
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">Faster Response</h3>
      <p>Staff see requests as they arrive and can respond without delay.</p>
    </div>
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">Better Visibility</h3>
      <p>Know which table needs attention without walking the floor.</p>
    </div>
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">Less Confusion</h3>
      <p>Give staff clear request information so nothing is misunderstood.</p>
    </div>
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">Improved Coordination</h3>
      <p>Keep front-of-house teams aligned during every service period.</p>
    </div>
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">Better Guest Experience</h3>
      <p>Make it easier for guests to ask for help without feeling ignored.</p>
    </div>
    <div class="card" style="padding:26px">
      <div class="ic" style="margin-bottom:16px"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
      <h3 style="font-size:17px;margin-bottom:7px">More Organized Service</h3>
      <p>Keep requests visible and tracked until they are completed.</p>
    </div>
  </div>
</div>
</section>

<!-- ===== INDUSTRIES ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="hd r"><div class="eb">WORKS FOR EVERY VENUE</div><h2>Made for Every Kind of <span class="sf">Dining Experience.</span></h2></div>
  <div class="ind-grid r">
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v4l3 3"/></svg></div></div><div class="ind-cn"><h4>Fine Dining</h4><p>Discreet, elegant request management.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div></div><div class="ind-cn"><h4>Casual Dining</h4><p>Keep everyday service organized during rush hours.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div></div><div class="ind-cn"><h4>Family Restaurants</h4><p>Handle multiple tables and larger group requests.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M17 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div></div><div class="ind-cn"><h4>Cafés</h4><p>Manage requests during busy brunch and coffee hours.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg></div></div><div class="ind-cn"><h4>QSR / Fast Food</h4><p>Handle quick requests efficiently during high-volume service.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/></svg></div></div><div class="ind-cn"><h4>Multi-Cuisine</h4><p>Manage requests across different sections and floors.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg></div></div><div class="ind-cn"><h4>Hotels & Resorts</h4><p>Connect dining requests within hotel hospitality operations.</p></div></div>
    <div class="ind-card"><div class="ind-img" style="background-image:url('https://images.unsplash.com/photo-1552566626-52f8b828add9?w=400&auto=format&fit=crop&q=70')"><div class="ind-ov"></div><div class="ind-ic"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div></div><div class="ind-cn"><h4>Food Courts</h4><p>Track requests across multiple stalls and seating areas.</p></div></div>
  </div>
</div>
</section>

<!-- ===== ECOSYSTEM ===== -->
<section>
<div class="w">
  <div class="hd r">
    <h2>Waiter Requests. <span class="sf">Connected to Your Restaurant.</span></h2>
    <p>A request is part of the guest experience. Geni Menu connects service activity with the wider restaurant operation.</p>
  </div>
  <div class="eco r" style="margin-bottom:44px">
    <div class="eco-nd prime"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>WAITER REQUESTS</div>
    <span class="eco-arr">→</span>
    <div class="eco-nd"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>TABLE MGMT</div>
    <span class="eco-arr">→</span>
    <div class="eco-nd"><svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2"/></svg>ORDER MGMT</div>
    <span class="eco-arr">→</span>
    <div class="eco-nd"><svg viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M4 17h16M8 21h8"/></svg>POS</div>
    <span class="eco-arr">→</span>
    <div class="eco-nd"><svg viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>PAYMENTS</div>
    <span class="eco-arr">→</span>
    <div class="eco-nd"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>REPORTS</div>
  </div>
  <!-- Service journey -->
  <div class="card r" style="padding:32px;background:var(--bg2);max-width:860px;margin:0 auto">
    <h3 style="text-align:center;margin-bottom:24px;color:var(--br);font-size:17px">Full Restaurant Service Journey</h3>
    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:0">
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div style="font-size:11px;font-weight:700;color:var(--ink)">Guest Arrives</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/></svg>
          </div>
          <div style="font-size:11px;font-weight:700;color:var(--ink)">Table Assigned</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
          </div>
          <div style="font-size:11px;font-weight:700;color:var(--ink)">Menu Viewed</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2"/></svg>
          </div>
          <div style="font-size:11px;font-weight:700;color:var(--ink)">Order Placed</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br);border:2px solid var(--br-dk);display:grid;place-items:center;margin:0 auto 6px;color:#fff;box-shadow:0 4px 12px rgba(135,96,57,.3)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
          </div>
          <div style="font-size:11px;font-weight:800;color:var(--br)">Waiter Request</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="display:flex;align-items:center;gap:0">
        <div style="text-align:center;padding:12px 10px">
          <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div style="font-size:11px;font-weight:700;color:var(--ink)">Staff Responds</div>
        </div>
        <div style="font-size:14px;color:var(--br);padding:0 4px;margin-bottom:18px">→</div>
      </div>
      <div style="text-align:center;padding:12px 10px">
        <div style="width:40px;height:40px;border-radius:50%;background:var(--br-lt);border:2px solid var(--br);display:grid;place-items:center;margin:0 auto 6px;color:var(--br)">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M4 17h16M8 21h8"/></svg>
        </div>
        <div style="font-size:11px;font-weight:700;color:var(--ink)">Bill & Payment</div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ===== FAQ ===== -->
<section style="background:var(--bg2)">
<div class="w">
  <div class="hd r"><h2>Frequently Asked <span class="sf">Questions</span></h2><p>Everything you need to know about Waiter Requests in Geni Menu.</p></div>
  <div class="faq-list r">
    <div class="faq-item open">
      <div class="faq-q" onclick="faq(this)"><span>What are Waiter Requests in Geni Menu?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Waiter Requests is a feature that allows restaurant guests to send service requests from their table — such as calling a waiter, requesting water, asking for the bill, or making a custom request. Restaurant staff can view, manage, and respond to these requests from a central dashboard.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>How does a customer send a waiter request?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Guests can send requests through the Geni Menu interface linked to their table. They select the type of assistance they need and submit the request, which is then visible to the restaurant team immediately.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Can requests be linked to specific tables?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Yes. Each request is associated with the specific table from which it was created. Staff can immediately see which table needs attention, the request type, and how long ago it was submitted.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>What types of requests can customers send?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Guests can send common request types including Call Waiter, Request Water, Request Bill, Extra Cutlery, Extra Items, and Custom Requests where they can type a specific requirement.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Can restaurant staff track request status?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Yes. Requests have status states — New, In Progress, and Completed — that staff can update as they handle each request. This keeps the dashboard organized during busy service.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Can staff see which table created the request?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Yes. The table number is always displayed alongside the request type and time, giving staff immediate context on where to go and what is needed.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Can guests make custom requests?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Yes. In addition to predefined request types, guests can submit a custom request with their own specific message or requirement.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Does Waiter Requests work with Table Management?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Where Geni Menu Table Management is enabled, Waiter Requests are connected to the corresponding table, allowing your team to see request activity alongside table status information.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Does it connect with Order Management?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Geni Menu is built as a connected restaurant platform. Where Order Management is active, service activity including waiter requests forms part of the overall guest experience at the table.</div>
    </div>
    <div class="faq-item">
      <div class="faq-q" onclick="faq(this)"><span>Is Geni Menu suitable for small and large restaurants?</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></div>
      <div class="faq-a">Yes. Geni Menu is designed for restaurants of different sizes — from small cafés and single-location restaurants to multi-branch operations and hotel dining rooms.</div>
    </div>
  </div>
</div>
</section>

<!-- ===== FINAL CTA ===== -->
<section style="background:linear-gradient(135deg,#6f4e2d 0%,#876039 50%,#a07040 100%);color:#fff;text-align:center;padding:clamp(68px,8vw,108px) 0;position:relative;overflow:hidden">
  <div style="position:absolute;top:-80px;right:-80px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.04)"></div>
  <div style="position:absolute;bottom:-100px;left:-60px;width:260px;height:260px;border-radius:50%;background:rgba(255,255,255,.04)"></div>
  <div class="w r">
    <div class="eb" style="background:rgba(255,255,255,.14);color:#fff;border-color:rgba(255,255,255,.22);margin-bottom:20px">TABLE-SIDE SERVICE</div>
    <h2 style="color:#fff;font-size:clamp(30px,4.5vw,50px);max-width:760px;margin:0 auto 18px">
      Give Every Guest an Easier Way<br><span style="font-family:'Playfair Display',Georgia,serif;font-style:italic;font-weight:700;background:linear-gradient(135deg,#f4efe9,#e0c9a8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;display:inline-block">to Ask for Help.</span>
    </h2>
    <p style="color:rgba(255,255,255,.82);max-width:560px;margin:0 auto 38px;font-size:17px;line-height:1.7">
      Bring table-side requests into one connected restaurant workflow with Geni Menu.
    </p>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background:#fff;color:var(--br);border-color:#fff;font-size:15px;padding:14px 36px;box-shadow:0 6px 22px rgba(0,0,0,.18)">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background:transparent;color:#fff;border-color:rgba(255,255,255,.4);font-size:15px;padding:14px 36px">Book a Demo</a>
    </div>
    <div style="margin-top:36px;font-size:13px;color:rgba(255,255,255,.6);font-weight:600">
      Built for restaurants, cafés, hotels, QSRs and modern food businesses across India.
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer style="background:#19120e;color:#9a8a7e;padding:56px 0 28px;font-size:14px;border-top:1px solid #2c2118">
<div class="w">
  <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:36px;margin-bottom:36px">
    <div>
      <div style="font-family:'Outfit',sans-serif;font-weight:800;font-size:21px;color:#fff;margin-bottom:12px">Geni <span style="color:var(--br-g)">Menu</span></div>
      <p style="color:#7a6c64;font-size:13px;max-width:260px;line-height:1.7">Smart restaurant management for modern food businesses. Built by WeGeni.</p>
    </div>
    <div>
      <h5 style="color:#fff;font-size:14px;margin-bottom:12px">Product</h5>
      <ul style="display:flex;flex-direction:column;gap:9px">
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">Digital Menu</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">QR Menu</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">Restaurant POS</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">Order Management</a></li>
        <li><a href="{{ route('features.reservation-management') }}" style="color:#9a8a7e;font-size:13px">Reservations</a></li>
      </ul>
    </div>
    <div>
      <h5 style="color:#fff;font-size:14px;margin-bottom:12px">Features</h5>
      <ul style="display:flex;flex-direction:column;gap:9px">
        <li><a href="{{ route('features.menu-management') }}" style="color:#9a8a7e;font-size:13px">Menu Management</a></li>
        <li><a href="{{ route('features.waiter-request') }}" style="color:#c7b8a8;font-size:13px">Waiter Requests</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">KOT Management</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">Inventory Management</a></li>
        <li><a href="{{ route('features') }}" style="color:#9a8a7e;font-size:13px">Staff Management</a></li>
      </ul>
    </div>
    <div>
      <h5 style="color:#fff;font-size:14px;margin-bottom:12px">Company</h5>
      <ul style="display:flex;flex-direction:column;gap:9px">
        <li><a href="{{ route('about.us') }}" style="color:#9a8a7e;font-size:13px">About WeGeni</a></li>
        <li><a href="{{ route('pricing') }}" style="color:#9a8a7e;font-size:13px">Pricing</a></li>
        <li><a href="{{ route('contact.us') }}" style="color:#9a8a7e;font-size:13px">Contact Support</a></li>
        <li><a href="{{ route('privacy-and-policy') }}" style="color:#9a8a7e;font-size:13px">Privacy Policy</a></li>
        <li><a href="{{ route('terms-and-conditions') }}" style="color:#9a8a7e;font-size:13px">Terms & Conditions</a></li>
      </ul>
    </div>
  </div>
  <div style="padding-top:22px;border-top:1px solid #2c2118;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
    <div style="color:#5e5248;font-size:12px">© {{ date('Y') }} WeGeni IT Services & Consulting Pvt. Ltd. · Geni Menu™</div>
    <div style="display:flex;gap:18px;flex-wrap:wrap">
      <a href="{{ route('terms-and-conditions') }}" style="color:#5e5248;font-size:12px">Terms</a>
      <a href="{{ route('privacy-and-policy') }}" style="color:#5e5248;font-size:12px">Privacy</a>
      <a href="{{ route('compliance') }}" style="color:#5e5248;font-size:12px">Compliance</a>
    </div>
  </div>
</div>
</footer>

<style>
@keyframes floatUp{from{opacity:0;transform:translateY(10px) scale(.96)}to{opacity:1;transform:none}}
@media(max-width:640px){
  footer>.w>div:first-child{grid-template-columns:1fr!important}
  .ind-grid{grid-template-columns:1fr 1fr!important}
}
</style>

<script>
function faq(el){
  const p=el.parentElement,was=p.classList.contains('open');
  document.querySelectorAll('.faq-item.open').forEach(i=>i.classList.remove('open'));
  if(!was)p.classList.add('open');
}

const nb=document.getElementById('nb');
window.addEventListener('scroll',()=>nb.classList.toggle('s',scrollY>60),{passive:true});

const hmb=document.getElementById('hmb'),mnv=document.getElementById('mnav');
hmb.addEventListener('click',()=>mnv.classList.add('open'));
mnv.addEventListener('click',e=>{if(e.target===mnv)mnv.classList.remove('open')});

const io=new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}});
},{threshold:.07,rootMargin:'0px 0px -36px 0px'});
document.querySelectorAll('.r').forEach(el=>io.observe(el));

const bio=new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.querySelectorAll('.bar-fill').forEach(f=>{
        const w=f.getAttribute('data-w');if(w)f.style.width=w;
      });
      bio.unobserve(e.target);
    }
  });
},{threshold:.25});
document.querySelectorAll('.bar-chart').forEach(c=>bio.observe(c));
</script>

@endsection
