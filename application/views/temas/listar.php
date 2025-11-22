<h2>Escolha um tema</h2>

<?php if (empty($temas)): ?>
  <p>Nenhum tema cadastrado.</p>
<?php else: ?>
  <ul>
    <?php foreach($temas as $t): ?>
      <li>
        <a href="<?= site_url('temas/questoes/'.$t->id) ?>"><?= html_escape($t->titulo) ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
