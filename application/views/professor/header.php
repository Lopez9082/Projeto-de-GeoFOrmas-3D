<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Painel do Professor — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/professor/header.css') ?>">
</head>
<body>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div style="font-family:var(--font-display);font-size:.95rem;font-weight:900;color:var(--neon-pink);text-shadow:var(--glow-pink);letter-spacing:.12em">PROFESSOR</div>
    <div style="font-family:var(--font-mono);font-size:.62rem;color:var(--text-dim);letter-spacing:.18em;margin-top:4px">MATHGAME ADMIN</div>
  </div>

  <nav class="menu">
    <a href="<?= site_url('professor/dashboard') ?>"><span class="nav-icon">🏠</span> Início</a>
    <a href="<?= site_url('professor/questoes') ?>"><span class="nav-icon">📝</span> Questões</a>
    <div style="height:1px;background:rgba(0,245,255,.1);margin:10px 0"></div>
    <a href="<?= site_url('professor/logout') ?>" style="color:var(--neon-pink)!important"><span class="nav-icon">⏻</span> Sair</a>
  </nav>
</aside>

<div style="margin-left:var(--sidebar-w);display:flex;flex-direction:column;min-height:100vh">
  <div style="background:rgba(3,2,10,.95);border-bottom:1px solid rgba(255,0,200,.2);padding:13px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100">
    <span style="font-family:var(--font-display);font-size:.75rem;color:var(--text-dim);letter-spacing:.15em">// PAINEL DO PROFESSOR</span>
    <button onclick="document.getElementById('sidebar').classList.toggle('open')"
      style="background:transparent;border:none;color:var(--neon-cyan);font-size:1.4rem;cursor:pointer;display:none" id="mob-btn-prof">☰</button>
  </div>
  <div class="content">

<style>
  .sidebar-brand{text-align:center;padding:16px 8px 22px;border-bottom:1px solid rgba(255,0,200,.15);margin-bottom:20px}
  .nav-icon{font-size:.95rem;width:18px;text-align:center;flex-shrink:0}
  @media(max-width:820px){
    .sidebar{position:fixed;transform:translateX(-100%);transition:transform .3s;z-index:200}
    .sidebar.open{transform:translateX(0)}
    [style*="margin-left:var(--sidebar-w)"]{margin-left:0!important}
    #mob-btn-prof{display:block!important}
    .content{padding:16px 12px!important}
  }
</style>
