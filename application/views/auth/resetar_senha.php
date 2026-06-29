<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Redefinir Senha — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
  <style>body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}</style>
</head>
<body>
<div class="login-card">
  <div style="text-align:center;margin-bottom:28px">
    <div style="font-family:var(--font-display);font-size:1.1rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.1em">NOVA SENHA</div>
  </div>
  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>
  <form method="post" action="<?= site_url('recuperacao/resetar?token='.urlencode($token)) ?>">
    <label>Nova Senha</label>
    <input type="password" name="senha" placeholder="••••••••" required>
    <label>Confirmar Senha</label>
    <input type="password" name="senha_confirm" placeholder="••••••••" required>
    <button type="submit" class="btn btn-primary btn-full">REDEFINIR ►</button>
  </form>
</div>
</body>
</html>
