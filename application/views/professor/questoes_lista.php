<head>
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/professor/questoes_lista.css') ?>">

</head>
<div class="page-header">

  <div>
    <h2>GERENCIAR QUESTÕES</h2>
    <p>// BANCO DE QUESTÕES DO SISTEMA</p>
  </div>

  <a href="<?= site_url('professor/nova_questao') ?>" class="btn-new">
    + NOVA QUESTÃO
  </a>

</div>

<?php if ($this->session->flashdata('sucesso')): ?>
  <div class="msg-success">
    ✔ <?= html_escape($this->session->flashdata('sucesso')) ?>
  </div>
<?php endif; ?>

<div class="table-card">

  <div class="table-wrapper">

    <table>

      <thead>
        <tr>
          <th>#</th>
          <th>ENUNCIADO</th>
          <th>TEMA</th>
          <th>NÍVEL</th>
          <th>CORRETA</th>
          <th>IMAGEM</th>
          <th>STATUS</th>
          <th>MOTIVO</th>
          <th>AÇÕES</th>
        </tr>
      </thead>

      <tbody>

        <?php foreach ($questoes as $q): ?>
        <tr class="<?= $q->excluida ? 'row-disabled' : '' ?>">

          <td class="mono"><?= $q->id ?></td>

          <td class="enunciado">
            <?= html_escape(mb_strimwidth($q->enunciado, 0, 80, '...')) ?>
          </td>

          <td><span class="badge purple"><?= html_escape($q->tema_titulo) ?></span></td>

          <td><span class="badge cyan"><?= html_escape($q->nivel) ?></span></td>

          <td><span class="badge green"><?= html_escape($q->correta) ?></span></td>

          <td>
            <?php if (!empty($q->imagem)): ?>
              <img src="<?= base_url('uploads/questoes/'.$q->imagem) ?>" class="thumb">
            <?php else: ?>
              <span class="muted">—</span>
            <?php endif; ?>
          </td>

          <td>
            <?php if ($q->excluida): ?>
              <span class="badge pink">OCULTA</span>
            <?php else: ?>
              <span class="badge green">ATIVA</span>
            <?php endif; ?>
          </td>

          <td class="motivo">
            <?= $q->excluida ? html_escape($q->motivo_exclusao) : '—' ?>
          </td>

          <td>
            <div class="actions">

              <?php if (!$q->excluida): ?>

                <a href="<?= site_url('professor/editar_questao/'.$q->id) ?>" class="btn edit">
                  ✏ EDITAR
                </a>

                <a href="<?= site_url('professor/ocultar_questao/'.$q->id) ?>" class="btn danger"
                   onclick="return confirm('Ocultar esta questão?')">
                  👁 OCULTAR
                </a>

              <?php else: ?>

                <span class="locked">🔒 BLOQUEADA</span>

              <?php endif; ?>

            </div>
          </td>

        </tr>
        <?php endforeach; ?>

      </tbody>

    </table>

  </div>

</div>