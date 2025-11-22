<h2>Questões: <?= html_escape($tema->titulo) ?></h2>

<?php if ($this->session->flashdata('sucesso')): ?>
  <div style="color:green"><?= html_escape($this->session->flashdata('sucesso')) ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('erro')): ?>
  <div style="color:red"><?= html_escape($this->session->flashdata('erro')) ?></div>
<?php endif; ?>

<?php if (empty($questoes)): ?>
  <p>Sem questões para este tema.</p>
<?php else: ?>
  <?php foreach($questoes as $q): ?>
    <div style="border:1px solid #ddd;padding:12px;margin-bottom:12px">
      <p><strong>Enunciado:</strong> <?= nl2br(html_escape($q->enunciado)) ?></p>

      <?php if ($q->imagem): ?>
        <p><img src="<?= base_url('uploads/questoes/'.$q->imagem) ?>" style="max-width:320px" alt="imagem"></p>
      <?php endif; ?>

      <form action="<?= site_url('responder/tentar/'.$q->id) ?>" method="post">
        <label><input type="radio" name="resp" value="A"> <?= html_escape($q->alternativa_a) ?></label><br>
        <label><input type="radio" name="resp" value="B"> <?= html_escape($q->alternativa_b) ?></label><br>
        <label><input type="radio" name="resp" value="C"> <?= html_escape($q->alternativa_c) ?></label><br>
        <label><input type="radio" name="resp" value="D"> <?= html_escape($q->alternativa_d) ?></label><br>
        <label><input type="radio" name="resp" value="E"> <?= html_escape($q->alternativa_e) ?></label><br><br>

        <button type="submit">Responder</button>
      </form>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
