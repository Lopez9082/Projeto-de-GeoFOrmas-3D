<h2>Laboratório</h2>

<p>XP total: <?= $progresso ? (int)$progresso->xp_total : 0 ?></p>

<?php if (empty($funcs)): ?>
  <p>Você ainda não desbloqueou funcionalidades. Ganhe XP resolvendo questões!</p>
<?php else: ?>
  <ul>
    <?php foreach($funcs as $f): ?>
      <li><?= html_escape($f) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
