<head>
<link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/professor/dashboard.css') ?>">
</head>

<div class="dashboard">

<h2 class="dashboard-title">
BEM-VINDO, <?= html_escape(strtoupper($nome)) ?>
</h2>

<p class="dashboard-subtitle">
// PAINEL DE GERENCIAMENTO
</p>


<div class="dashboard-grid">

  <div class="card card-pink">
    <h3>Cadastrar Questão</h3>

    <p class="card-desc">
      Adicione novas questões ao banco
    </p>

    <a href="<?= site_url('professor/nova_questao') ?>" class="btn btn-primary">
      + NOVA QUESTÃO
    </a>
  </div>


  <div class="card card-purple">
    <h3>Gerenciar Questões</h3>

    <p class="card-desc">
      Editar, ocultar e organizar
    </p>

    <a href="<?= site_url('professor/questoes') ?>" class="btn btn-secondary">
      VER LISTA →
    </a>
  </div>

</div>


<div class="card card-functions">

<h3>Funções Disponíveis</h3>

<div class="feature-list">

  <div class="feature-item">
    <span class="check">✔</span>
    <span>Cadastrar questões com imagem e feedback pedagógico</span>
  </div>

  <div class="feature-item">
    <span class="check">✔</span>
    <span>Editar questões existentes</span>
  </div>

  <div class="feature-item">
    <span class="check">✔</span>
    <span>Ocultar questões inadequadas</span>
  </div>

</div>

</div>

</div>