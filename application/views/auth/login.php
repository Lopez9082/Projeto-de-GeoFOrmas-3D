<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Login - App Matemática</title>
<link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>">
<style>
/* CSS minimal para exemplo */
body{font-family:Arial,Helvetica,sans-serif;background:#f3f4f6;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
.login-box{background:#fff;padding:28px;border-radius:10px;box-shadow:0 6px 20px rgba(0,0,0,0.08);width:380px;}
.login-box h2{margin:0 0 16px}
.input{width:100%;padding:10px;margin-bottom:12px;border:1px solid #ddd;border-radius:6px}
.btn{width:100%;padding:10px;border:none;border-radius:6px;background:#2563eb;color:#fff;cursor:pointer}
.msg-erro{color:#b91c1c;margin-bottom:12px;text-align:center}
.link-small{display:block;text-align:center;margin-top:10px}
</style>
</head>
<body>
  <div class="login-box">
    <h2>Entrar</h2>
    <?php if($this->session->flashdata('erro')): ?>
      <div class="msg-erro"><?= html_escape($this->session->flashdata('erro')) ?></div>
    <?php endif; ?>
    <form method="post" action="<?=site_url('auth/autenticar')?>">
      <input class="input" type="email" name="email" placeholder="E-mail" required>
      <input class="input" type="password" name="senha" placeholder="Senha" required>
      <button class="btn" type="submit">Entrar</button>
    </form>
    <a class="link-small" href="<?= site_url('auth/registrar') ?>" target="_blank">Criar conta</a>
    <a class="link-small" href="<?=site_url('recuperar-senha')?>">Esqueci minha senha</a>
  </div>
</body>
</html>
