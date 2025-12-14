<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Painel — Matemática Interativa</title>
  <style>
    body { margin:0; display:flex; font-family:Arial, sans-serif; background: hsla(210, 40%, 96%, 1.00); }
    .sidebar { width:220px; background: #1e293b; color:#fff; display:flex; flex-direction:column; padding:20px; min-height:100vh; position:fixed; top:0; left:0; }
    .logo img { width:100%; border-radius:8px; margin-bottom:20px; }
    .avatar-row { display:flex; align-items:center; gap:12px; }
    .avatar { width:48px; height:48px; background:#2563eb; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:22px; color:#fff; font-weight:bold; }
    nav.menu a { display:block; color:#e2e8f0; padding:10px 8px; border-radius:6px; text-decoration:none; margin:6px 0; font-size:15px; }
    nav.menu a:hover, nav.menu a.active { background:#2563eb; }


    /* =========================
   AJUSTES RESPONSIVOS GLOBAIS
   ========================= */

@media (max-width: 1200px) {
    .section {
        padding: 70px 30px;
    }
}

@media (max-width: 992px) {
    header {
        padding: 16px 24px;
    }

    .hero {
        gap: 30px;
        padding-top: 120px;
    }

    .hero-text h1 {
        font-size: 36px;
    }

    .hero-text p {
        font-size: 16px;
    }

    .sobre-header h2 {
        font-size: 28px;
    }
}

@media (max-width: 768px) {

    /* HERO */
    .hero {
        flex-direction: column;
        text-align: center;
        padding: 110px 20px 60px;
    }

    .hero img {
        width: 260px;
    }

    /* SECTIONS */
    .section {
        padding: 60px 20px;
    }

    .section h2 {
        font-size: 24px;
    }

    .section p {
        font-size: 16px;
    }

    /* SOBRE */
    .sobre-cards {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .sobre-card {
        padding: 28px 24px;
    }

    /* FEATURES */
    .features {
        grid-template-columns: 1fr;
    }

    /* CRIADORES */
    .creator-img {
        width: 120px;
        height: 120px;
    }

    .creator-name {
        font-size: 20px;
    }

    .icons a {
        font-size: 26px;
    }

    /* ODS */
    .ods-item {
        grid-template-columns: 1fr !important;
        gap: 30px;
        margin-bottom: 60px;
    }

    .ods-item img {
        max-width: 260px;
        margin: 0 auto;
    }

    .ods-text h3 {
        font-size: 20px;
    }

    .ods-text p {
        font-size: 15px;
    }
}

@media (max-width: 480px) {

    header {
        padding: 14px 18px;
    }

    .logo {
        font-size: 22px;
    }

    .hero-text h1 {
        font-size: 28px;
    }

    .hero-btns a {
        font-size: 16px;
        padding: 10px 18px;
    }

    .sobre-icon {
        width: 50px;
        height: 50px;
        font-size: 22px;
    }

    .sobre-card h3 {
        font-size: 18px;
    }

    .sobre-card p,
    .sobre-card ul li {
        font-size: 15px;
    }
}

  </style>
</head>
<body>
  <aside class="sidebar">
    <div class="logo">
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
