<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Recuperar Senha — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
  <style>body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}</style>
</head>
<body>
<div class="login-card">
  <div style="text-align:center;margin-bottom:28px">
    <div style="font-family:var(--font-display);font-size:1.1rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.1em">RECUPERAR SENHA</div>
    <div style="font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);letter-spacing:.18em;margin-top:4px">// REDEFINA SEU ACESSO</div>
  </div>
  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('sucesso')): ?>
    <div class="msg-success">✔ <?= html_escape($this->session->flashdata('sucesso')) ?></div>
  <?php endif; ?>
  <form method="post" action="<?= site_url('recuperacao/solicitar') ?>">
    <label>E-mail cadastrado</label>
    <input type="email" name="email" placeholder="player@email.com" required>
    <button type="submit" class="btn btn-primary btn-full">ENVIAR LINK ►</button>
  </form>
  <a class="link-small" href="<?= site_url('auth/login') ?>">← Voltar ao login</a>
</div>
</body>
</html>
