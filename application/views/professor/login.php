<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Login do Professor</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #A9cddd, #1e3a8a);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: #fff;
      padding: 28px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      width: 380px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 16px;
      color: #1e293b;
    }

    .input {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border: 1px solid #cbd5e1;
      border-radius: 6px
    }

    .btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 6px;
      background: #1e40af;
      color: #fff;
      cursor: pointer;
      font-weight: bold;
    }

    .msg-erro {
      color: #b91c1c;
      margin-bottom: 12px;
      text-align: center
    }
  </style>
</head>

<body>

  <div class="login-box">
    <h2>Professor - Login</h2>

    <?php if ($this->session->flashdata('erro')): ?>
      <div class="msg-erro"><?= $this->session->flashdata('erro') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('professor/login') ?>">
      <input class="input" type="email" name="email" placeholder="E-mail" required>
      <input class="input" type="password" name="senha" placeholder="Senha" required>
      <button class="btn" type="submit">Entrar</button>
    </form>

  </div>

</body>

</html>