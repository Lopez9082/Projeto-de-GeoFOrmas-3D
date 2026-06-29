<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px">
  <div>
    <h2 style="margin-bottom:4px">GERENCIAR QUESTÕES</h2>
    <p style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim)">// PAINEL ADMIN</p>
  </div>
  <a href="<?= site_url('admin/novo') ?>" class="btn btn-primary">+ NOVA QUESTÃO</a>
</div>

<?php if ($this->session->flashdata('sucesso')): ?>
  <div class="msg-success" style="margin-bottom:16px">✔ <?= html_escape($this->session->flashdata('sucesso')) ?></div>
<?php endif; ?>

<div class="card" style="padding:0;overflow:hidden">
  <div style="overflow-x:auto">
    <table>
      <thead>
        <tr><th>#</th><th>Tema</th><th>Nível</th><th>Enunciado</th><th>Autor</th><th>Criada em</th><th style="text-align:center">Ações</th></tr>
      </thead>
      <tbody>
        <?php foreach ($questoes as $q): ?>
          <tr>
            <td style="font-family:var(--font-mono);color:var(--text-dim)"><?= $q->id ?></td>
            <td><span class="badge b-purple"><?= html_escape($q->tema_titulo) ?></span></td>
            <td><span class="badge b-cyan" style="font-size:.58rem"><?= html_escape($q->nivel) ?></span></td>
            <td><?= html_escape(mb_strimwidth($q->enunciado, 0, 70, '…')) ?></td>
            <td style="font-family:var(--font-mono);font-size:.8rem"><?= html_escape($q->autor) ?></td>
            <td style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim)"><?= $q->criado_em ?></td>
            <td style="text-align:center">
              <div style="display:flex;gap:6px;justify-content:center">
                <a href="<?= site_url('admin/editar/'.$q->id) ?>" class="btn btn-secondary" style="padding:6px 12px;font-size:.6rem">✏ EDITAR</a>
                <a href="<?= site_url('admin/excluir/'.$q->id) ?>" class="btn btn-danger" style="padding:6px 12px;font-size:.6rem;background:linear-gradient(135deg,var(--neon-pink),var(--neon-purple))"
                   onclick="return confirm('Confirma exclusão?')">🗑 EXCLUIR</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
