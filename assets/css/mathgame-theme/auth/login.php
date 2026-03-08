<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
  <style>
    body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;
      background-image:
        radial-gradient(ellipse 70% 50% at 30% 20%,rgba(0,245,255,.06) 0%,transparent 60%),
        radial-gradient(ellipse 60% 50% at 70% 80%,rgba(191,0,255,.07) 0%,transparent 60%),
        repeating-linear-gradient(0deg,transparent,transparent 59px,rgba(0,245,255,.015) 59px,rgba(0,245,255,.015) 60px),
        repeating-linear-gradient(90deg,transparent,transparent 59px,rgba(0,245,255,.015) 59px,rgba(0,245,255,.015) 60px);}
  </style>
</head>
<body>
<?php
  if ($this->session->userdata('logado')) {
    if ($this->session->userdata('role') === 'professor') redirect('questoes');
    else redirect('painel');
  }
?>

<div class="login-card">

  <div style="text-align:center;margin-bottom:28px">
    <div style="font-family:var(--font-display);font-size:1.4rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.12em">MATHGAME</div>
    <div style="font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);letter-spacing:.2em;margin-top:6px">// INSIRA SUAS CREDENCIAIS</div>
  </div>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('success')): ?>
    <div class="msg-success">✔ <?= html_escape($this->session->flashdata('success')) ?></div>
  <?php endif; ?>

  <form method="post" action="<?= site_url('auth/autenticar') ?>">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="player@email.com" required>

    <label for="senha">Senha</label>
    <input type="password" id="senha" name="senha" placeholder="••••••••" required>

    <button type="submit" class="btn btn-primary btn-full">ENTRAR NO JOGO ►</button>
  </form>

  <a class="link-small" href="<?= site_url('registrar') ?>">Criar conta</a>

</div>
</body>
</html>
