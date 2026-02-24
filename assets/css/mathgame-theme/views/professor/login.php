<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Login do Professor — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
  <style>
    body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;
      background-image:radial-gradient(ellipse 70% 50% at 30% 20%,rgba(255,0,200,.05) 0%,transparent 60%),radial-gradient(ellipse 60% 50% at 70% 80%,rgba(191,0,255,.07) 0%,transparent 60%);}
    .login-card::before{background:linear-gradient(90deg,transparent,var(--neon-pink),transparent)!important}
  </style>
</head>
<body>
<div class="login-card">
  <div style="text-align:center;margin-bottom:28px">
    <div style="font-family:var(--font-display);font-size:1rem;font-weight:900;color:var(--neon-pink);text-shadow:var(--glow-pink);letter-spacing:.1em">ACESSO PROFESSOR</div>
    <div style="font-family:var(--font-mono);font-size:.65rem;color:var(--text-dim);letter-spacing:.2em;margin-top:4px">// ÁREA RESTRITA</div>
  </div>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('success')): ?>
    <div class="msg-success">✔ <?= html_escape($this->session->flashdata('success')) ?></div>
  <?php endif; ?>

  <form method="post" action="<?= site_url('professor/login') ?>">
    <label>E-mail</label>
    <input type="email" name="email" placeholder="professor@unig.edu.br" required>
    <label>Senha</label>
    <input type="password" name="senha" placeholder="••••••••" required>
    <button type="submit" class="btn btn-full" style="background:linear-gradient(135deg,var(--neon-pink),var(--neon-purple));color:#fff;box-shadow:var(--glow-pink)">
      ENTRAR ►
    </button>
  </form>
  <a class="link-small" href="<?= site_url('auth/login') ?>">← Login de aluno</a>
</div>
</body>
</html>
