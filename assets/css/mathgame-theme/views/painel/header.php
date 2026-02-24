<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MathGame — Painel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
</head>
<body>

<aside class="sidebar" id="sidebar">

  <div class="sidebar-brand">
    <div class="sidebar-logo-text">MATHGAME</div>
    <div class="sidebar-logo-sub">UNIG · NEAD · GEMATECH</div>
  </div>

  <?php
    $initials = strtoupper(substr($this->session->userdata('nome') ?? 'U', 0, 1));
    $nome_session = $this->session->userdata('nome') ?? 'Jogador';
    $xp = 0; // será sobrescrito pela view se disponível
  ?>
  <div class="avatar-row">
    <div class="avatar"><?= $initials ?></div>
    <div style="flex:1;min-width:0">
      <strong style="font-family:var(--font-display);font-size:.72rem;color:var(--text-bright);display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><?= html_escape($nome_session) ?></strong>
      <small>XP: <span id="sidebar-xp">—</span></small>
    </div>
  </div>

  <?php $current_url = current_url(); ?>
  <nav class="menu">
    <a href="<?= site_url('painel') ?>" class="<?= strpos($current_url, site_url('painel')) !== false ? 'active' : '' ?>">
      <span class="nav-icon">🏠</span> Início
    </a>
    <a href="<?= site_url('quizzes') ?>" class="<?= strpos($current_url, site_url('quizzes')) !== false ? 'active' : '' ?>">
      <span class="nav-icon">🎲</span> Quizzes
    </a>
    <a href="<?= site_url('laboratorio') ?>" class="<?= strpos($current_url, site_url('laboratorio')) !== false ? 'active' : '' ?>">
      <span class="nav-icon">🧪</span> Laboratório
    </a>
    <?php if ($this->session->userdata('papel') == 'professor' || $this->session->userdata('papel') == 'licenciado'): ?>
      <a href="<?= site_url('admin/lista_questoes') ?>" class="<?= strpos($current_url, site_url('admin')) !== false ? 'active' : '' ?>">
        <span class="nav-icon">⚙️</span> Gerenciar
      </a>
    <?php endif; ?>
    <div style="height:1px;background:rgba(0,245,255,.1);margin:10px 0"></div>
    <a href="<?= site_url('auth/logout') ?>" style="color:var(--neon-pink)!important">
      <span class="nav-icon">⏻</span> Sair
    </a>
  </nav>

</aside>

<div style="margin-left:var(--sidebar-w);display:flex;flex-direction:column;min-height:100vh">

  <!-- TOPBAR -->
  <div style="background:rgba(3,2,10,.95);border-bottom:1px solid rgba(0,245,255,.15);backdrop-filter:blur(12px);padding:13px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100">
    <span style="font-family:var(--font-display);font-size:.75rem;color:var(--text-dim);letter-spacing:.15em;text-transform:uppercase">// MATHGAME</span>
    <span style="font-family:var(--font-mono);font-size:.82rem;color:var(--neon-green);text-shadow:var(--glow-green)" id="topbar-xp">⬡ XP: —</span>
  </div>

  <div class="content">

<!-- botão mobile -->
<button onclick="document.getElementById('sidebar').classList.toggle('open')"
  style="display:none;position:fixed;bottom:20px;right:20px;width:48px;height:48px;background:var(--neon-cyan);border:none;border-radius:50%;color:var(--bg-void);font-size:1.3rem;cursor:pointer;z-index:300;box-shadow:var(--glow-cyan);align-items:center;justify-content:center"
  id="mob-btn">☰</button>

<style>
  @media(max-width:820px){
    .sidebar{position:fixed;transform:translateX(-100%);transition:transform .3s;z-index:200}
    .sidebar.open{transform:translateX(0)}
    [style*="margin-left:var(--sidebar-w)"]{margin-left:0!important}
    #mob-btn{display:flex!important}
    .content{padding:16px 12px!important}
  }
  .sidebar-brand{text-align:center;padding:16px 8px 22px;border-bottom:1px solid rgba(0,245,255,.12);margin-bottom:20px}
  .sidebar-logo-text{font-family:var(--font-display);font-size:.95rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.12em}
  .sidebar-logo-sub{font-family:var(--font-mono);font-size:.62rem;color:var(--text-dim);letter-spacing:.18em;margin-top:4px}
  .nav-icon{font-size:.95rem;width:18px;text-align:center;flex-shrink:0}
</style>
