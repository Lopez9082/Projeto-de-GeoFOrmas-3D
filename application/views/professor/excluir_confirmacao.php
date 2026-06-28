<head>
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/professor/excluir_confirmacao.css') ?>">

</head>
<div class="container-ocultar">

  <div class="header">
    <h2>OCULTAR QUESTÃO</h2>
    <p>// INFORME O MOTIVO DA OCULTAÇÃO</p>
  </div>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro">
      ⚠ <?= html_escape($this->session->flashdata('erro')) ?>
    </div>
  <?php endif; ?>

  <div class="card-ocultar">

    <div class="badge-alert">
      ⚠ AÇÃO IRREVERSÍVEL DE MODERAÇÃO
    </div>

    <h3>Enunciado</h3>

    <div class="box-enunciado">
      <?= nl2br(html_escape($questao->enunciado)) ?>
    </div>

    <?php if (!empty($questao->imagem)): ?>
      <div class="img-box">
        <img src="<?= site_url('uploads/questoes/'.$questao->imagem) ?>">
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('professor/ocultar_questao/'.$questao->id) ?>">

      <label>Motivo da ocultação</label>

      <textarea name="motivo" required rows="4" placeholder="Explique o motivo da ocultação..."></textarea>

      <div class="actions">

        <button type="submit" class="btn-danger">
          👁 OCULTAR QUESTÃO
        </button>

        <a href="<?= site_url('professor/questoes') ?>" class="btn-cancelar">
          ← CANCELAR
        </a>

      </div>

    </form>

  </div>

</div>