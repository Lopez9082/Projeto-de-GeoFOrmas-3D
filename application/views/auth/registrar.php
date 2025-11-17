<!doctype html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Registrar</title></head>
<body>
  <div style="max-width:420px;margin:40px auto;">
    <h2>Criar conta</h2>
    <?php if($this->session->flashdata('erro')): ?>
      <div style="color:red"><?=html_escape($this->session->flashdata('erro'))?></div>
    <?php endif; ?>
    <form method="post" action="<?=site_url('auth/registrar')?>">
      <input name="nome" placeholder="Nome completo" required><br><br>
      <input type="email" name="email" placeholder="E-mail" required><br><br>
      <input type="password" name="senha" placeholder="Senha" required><br><br>
      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
