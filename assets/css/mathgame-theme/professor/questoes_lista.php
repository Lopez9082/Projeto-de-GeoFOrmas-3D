<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px">
  <div>
    <h2 style="margin-bottom:4px">GERENCIAR QUESTÕES</h2>
    <p style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim)">// BANCO DE QUESTÕES DO SISTEMA</p>
  </div>
  <a href="<?= base_url('professor/nova_questao') ?>" class="btn btn-primary">+ NOVA QUESTÃO</a>
</div>

<?php if ($this->session->flashdata('sucesso')): ?>
  <div class="msg-success" style="margin-bottom:16px">✔ <?= html_escape($this->session->flashdata('sucesso')) ?></div>
<?php endif; ?>

<div class="card" style="padding:0;overflow:hidden">
  <div style="overflow-x:auto">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Enunciado</th>
          <th>Tema</th>
          <th>Nível</th>
          <th>Correta</th>
          <th>Imagem</th>
          <th>Status</th>
          <th>Motivo</th>
          <th style="text-align:center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($questoes as $q): ?>
          <tr style="<?= $q->excluida ? 'opacity:.55' : '' ?>">
            <td style="font-family:var(--font-mono);color:var(--text-dim)"><?= $q->id ?></td>
            <td style="max-width:240px">
              <?= html_escape(mb_strimwidth($q->enunciado, 0, 70, '…')) ?>
            </td>
            <td><span class="badge b-purple"><?= html_escape($q->tema_titulo) ?></span></td>
            <td><span class="badge b-cyan" style="font-size:.58rem"><?= html_escape($q->nivel) ?></span></td>
            <td><span class="badge b-green"><?= html_escape($q->correta) ?></span></td>
            <td>
              <?php if (!empty($q->imagem)): ?>
                <img src="<?= base_url('uploads/questoes/'.$q->imagem) ?>" style="width:60px;border-radius:6px;border:1px solid rgba(0,245,255,.2)">
              <?php else: ?>
                <span style="color:var(--text-ghost)">—</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($q->excluida): ?>
                <span class="badge b-pink">👁 Oculta</span>
              <?php else: ?>
                <span class="badge b-green">✔ Ativa</span>
              <?php endif; ?>
            </td>
            <td style="max-width:130px">
              <small><?= $q->excluida ? html_escape($q->motivo_exclusao) : '—' ?></small>
            </td>
            <td style="text-align:center">
              <div style="display:flex;gap:6px;justify-content:center">
                <?php if (!$q->excluida): ?>
                  <a href="<?= base_url('professor/editar_questao/'.$q->id) ?>" class="btn btn-secondary" style="padding:6px 12px;font-size:.6rem">✏ EDITAR</a>
                  <a href="<?= base_url('professor/ocultar_questao/'.$q->id) ?>" class="btn btn-danger" style="padding:6px 12px;font-size:.6rem;background:linear-gradient(135deg,var(--neon-pink),var(--neon-purple))"
                    onclick="return confirm('Ocultar esta questão?')">👁 OCULTAR</a>
                <?php else: ?>
                  <span class="badge b-pink">🔒 BLOQUEADA</span>
                <?php endif; ?>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
