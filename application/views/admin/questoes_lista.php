<div style="padding:20px">
  <h2>Gerenciar Questões</h2>
  <?php if($this->session->flashdata('sucesso')): ?>
    <div style="color:green"><?=html_escape($this->session->flashdata('sucesso'))?></div>
  <?php endif; ?>
  <a href="<?=site_url('admin/novo')?>" style="display:inline-block;margin:10px 0;padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none">Nova questão</a>
  <table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
      <tr><th>ID</th><th>Tema</th><th>Nível</th><th>Enunciado</th><th>Autor</th><th>Criada em</th><th>Ações</th></tr>
    </thead>
    <tbody>
      <?php foreach($questoes as $q): ?>
      <tr>
        <td><?=$q->id?></td>
        <td><?=html_escape($q->tema_titulo)?></td>
        <td><?=html_escape($q->nivel)?></td>
        <td><?=html_escape(mb_strimwidth($q->enunciado,0,80,'...'))?></td>
        <td><?=html_escape($q->autor)?></td>
        <td><?=$q->criado_em?></td>
        <td>
          <a href="<?=site_url('admin/editar/'.$q->id)?>">Editar</a> |
          <a href="<?=site_url('admin/excluir/'.$q->id)?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
