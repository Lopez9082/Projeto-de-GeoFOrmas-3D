<!doctype html><html lang="pt-br"><head><meta charset="utf-8"><title>Redefinir senha</title></head><body>
  <h2>Redefinir senha</h2>
  <?php if($this->session->flashdata('erro')): ?><div style="color:red"><?=html_escape($this->session->flashdata('erro'))?></div><?php endif; ?>
  <form method="post" action="<?=site_url('recuperacao/resetar?token='.urlencode($token))?>">
    <input type="password" name="senha" placeholder="Nova senha" required><br><br>
    <input type="password" name="senha_confirm" placeholder="Confirme a nova senha" required><br><br>
    <button type="submit">Redefinir senha</button>
  </form>
</body></html>
