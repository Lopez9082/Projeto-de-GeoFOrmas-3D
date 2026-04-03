<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel Admin</title>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">

<style>
:root{
  --bg:#03020a;
  --card:#120f2e;
  --cyan:#00f5ff;
  --pink:#ff00c8;
  --text:#e8f4ff;
}

body{
  background: var(--bg);
  font-family: 'Rajdhani', sans-serif;
  color: var(--text);
  padding:40px;
}

/* TITULOS */
h1{
  font-family: 'Orbitron';
  color: var(--cyan);
  text-shadow: 0 0 10px var(--cyan);
  margin-bottom:20px;
}

h2{
  margin-top:40px;
  color: var(--cyan);
}

/* ALERTA */
.alert{
  background: rgba(0,255,150,.1);
  border:1px solid rgba(0,255,150,.5);
  padding:12px;
  border-radius:8px;
  margin-bottom:20px;
}

/* CARD */
.card{
  background: var(--card);
  border-radius:12px;
  padding:20px;
  box-shadow: 0 0 20px rgba(0,245,255,.1);
  border:1px solid rgba(0,245,255,.2);
}

/* TABELA */
table{
  width:100%;
  border-collapse: collapse;
  margin-top:20px;
}

th, td{
  padding:12px;
  text-align:left;
}

th{
  color: var(--cyan);
  border-bottom:1px solid rgba(0,245,255,.3);
}

td{
  border-bottom:1px solid rgba(255,255,255,.05);
}

/* BOTÃO */
.btn{
  padding:8px 14px;
  border-radius:6px;
  text-decoration:none;
  font-weight:bold;
  font-size:13px;
  display:inline-block;
}

.btn-approve{
  background: linear-gradient(135deg, var(--cyan), var(--pink));
  color:#000;
  box-shadow: 0 0 10px var(--cyan);
}

.btn-approve:hover{
  transform:scale(1.05);
}

/* VAZIO */
.empty{
  opacity:.7;
}

/* LOGOUT */
.logout{
  display:inline-block;
  margin-top:30px;
  color: var(--pink);
}
</style>
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