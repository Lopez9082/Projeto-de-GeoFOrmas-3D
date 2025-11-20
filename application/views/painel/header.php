<!doctype html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Painel</title>
<link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>">
</head>
<body>
<div class="container">
  <aside class="sidebar">
    <div class="logo">
      <img src="<?=base_url('assets/images/logo_unig.png')?>" alt="Logo" style="max-width:100%">
    </div>
    <div class="user-box">
      <strong><?=html_escape($nome)?></strong><br>
      <small>Pontos: <?= $progresso ? (int)$progresso->pontuacao : 0 ?></small>
    </div>
    <nav class="menu">
      <a href="<?=site_url('painel')?>">Início</a>
      <a href="<?=site_url('quiz/iniciar/geometria/facil')?>">Quizzes</a>
      <a href="<?=site_url('painel/historico')?>">Histórico</a>
      <?php if($this->session->userdata('papel')=='professor' || $this->session->userdata('papel')=='licenciado'): ?>
        <a href="<?=site_url('admin/lista_questoes')?>">Gerenciar Questões</a>
      <?php endif; ?>
      <a href="<?=site_url('auth/logout')?>">Sair</a>
    </nav>
  </aside>
  <main class="content">
