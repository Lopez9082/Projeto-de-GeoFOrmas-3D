<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel Admin</title>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/admin/dashboard.css') ?>">
</head>

<body>

<h1>⚡ Painel do Administrador</h1>

<?php if($this->session->flashdata('sucesso')): ?>
  <div class="alert">
    <?= $this->session->flashdata('sucesso') ?>
  </div>
<?php endif; ?>

<div class="card">
  <h2>👨‍🏫 Professores Pendentes</h2>

  <?php if(empty($pendentes)): ?>
    <p class="empty">Nenhum professor aguardando aprovação.</p>
  <?php else: ?>

  <table>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Ação</th>
    </tr>

    <?php foreach($pendentes as $p): ?>
      <tr>
        <td><?= $p->nome ?></td>
        <td><?= $p->email ?></td>
        <td>
          <a href="<?= site_url('admin/aprovar/'.$p->id) ?>" class="btn btn-approve">
            ✔ Aprovar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

  <?php endif; ?>
</div>

<a href="<?= site_url('professor/logout') ?>" class="logout">Sair</a>

</body>
</html>