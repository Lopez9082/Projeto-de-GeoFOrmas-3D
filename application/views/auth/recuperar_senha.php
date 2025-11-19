<!doctype html><html lang="pt-br"><head><meta charset="utf-8"><title>Recuperar senha</title></head><body>
  <h2>Recuperar senha</h2>
  <?php if($this->session->flashdata('erro')): ?><div style="color:red"><?=html_escape($this->session->flashdata('erro'))?></div><?php endif; ?>
  <?php if($this->session->flashdata('sucesso')): ?><div style="color:green"><?=html_escape($this->session->flashdata('sucesso'))?></div><?php endif; ?>
  <form method="post" action="<?=site_url('recuperacao/solicitar')?>">
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Enviar link de recuperação</button>
  </form>
</body></html>
