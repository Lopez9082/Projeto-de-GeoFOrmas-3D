<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/auth/registrar.css') ?>">
  <style>
    body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;
      background-image:radial-gradient(ellipse 70% 50% at 30% 20%,rgba(0,245,255,.06) 0%,transparent 60%),radial-gradient(ellipse 60% 50% at 70% 80%,rgba(191,0,255,.07) 0%,transparent 60%);}
  </style>
</head>
<body>

<div class="login-card">
  <div style="text-align:center;margin-bottom:28px">
    <div style="font-family:var(--font-display);font-size:1.3rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.12em">CRIAR CONTA</div>
    <div style="font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);letter-spacing:.2em;margin-top:6px">// REGISTRAR NOVO JOGADOR</div>
  </div>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>

  <form method="post" action="<?= site_url('auth/registrar') ?>">
    <label>Nome completo</label>
    <input type="text" name="nome" placeholder="Seu nome" required>

    <label>E-mail</label>
    <input type="email" name="email" placeholder="player@email.com" required>

    <label>Senha</label>
    <input type="password" name="senha" placeholder="••••••••" required>

    <button type="submit" class="btn btn-primary btn-full">CADASTRAR ►</button>
  </form>

  <a class="link-small" href="<?= site_url('auth/login') ?>">← Já tenho conta</a>
</div>

</body>
</html>
