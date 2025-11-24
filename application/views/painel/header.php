<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Painel — Matemática Interativa</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
  <style>
    body { margin:0; display:flex; font-family:Arial, sans-serif; background:#f1f5f9; }
    .sidebar { width:270px; background:#1e293b; color:#fff; display:flex; flex-direction:column; padding:20px; min-height:100vh; position:fixed; top:0; left:0; }
    .logo img { width:100%; border-radius:8px; margin-bottom:20px; }
    .avatar-row { display:flex; align-items:center; gap:12px; }
    .avatar { width:48px; height:48px; background:#2563eb; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:22px; color:#fff; font-weight:bold; }
    nav.menu a { display:block; color:#e2e8f0; padding:10px 8px; border-radius:6px; text-decoration:none; margin:6px 0; font-size:15px; }
    nav.menu a:hover, nav.menu a.active { background:#2563eb; }
  </style>
</head>
<body>
  <aside class="sidebar">
    <div class="logo">
      <img src="<?= base_url('/images/logo_unig.png') ?>" alt="Logo">
    </div>

    <?php $current_url = current_url(); ?>
    <nav class="menu">
      <a href="<?= site_url('painel') ?>" class="<?= strpos($current_url, site_url('painel')) !== false ? 'active' : '' ?>">Início</a>
      <a href="<?= site_url('quizzes') ?>" class="<?= strpos($current_url, site_url('quizzes')) !== false ? 'active' : '' ?>">🎲 Quizzes</a>
      <a href="<?= site_url('laboratorio') ?>" class="<?= strpos($current_url, site_url('laboratorio')) !== false ? 'active' : '' ?>">🧪 Laboratório</a>
     <!-- <a href="<?= site_url('painel/historico') ?>" class="<?= strpos($current_url, site_url('painel/historico')) !== false ? 'active' : '' ?>">Histórico</a>-->
      <?php if ($this->session->userdata('papel') == 'professor' || $this->session->userdata('papel') == 'licenciado'): ?>
        <a href="<?= site_url('admin/lista_questoes') ?>" class="<?= strpos($current_url, site_url('admin')) !== false ? 'active' : '' ?>">Gerenciar Questões</a>
      <?php endif; ?>
      <a href="<?= site_url('auth/logout') ?>">Sair</a>
    </nav>
  </aside>

  <main class="content" style="margin-left:270px; padding:25px; width:calc(100% - 270px);">
