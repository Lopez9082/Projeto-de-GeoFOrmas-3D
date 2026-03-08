<h2 style="margin-bottom:6px">ESCOLHER TEMA</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">// SELECIONE O ASSUNTO DA MISSÃO</p>

<div class="levels-wrapper">
<?php foreach ($temas as $t): ?>
  <a href="<?= base_url('quizzes/tema/'.$t->id) ?>" class="level-btn" style="text-decoration:none">
    <div class="level-card">
      <span style="font-size:2rem;display:block;margin-bottom:12px">📐</span>
      <h5><?= html_escape($t->titulo) ?></h5>
    </div>
  </a>
<?php endforeach; ?>
</div>
