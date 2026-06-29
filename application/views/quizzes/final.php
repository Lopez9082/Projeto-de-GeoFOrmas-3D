<!-- PLACAR TOTAL -->
<div style="text-align:center;padding:32px;background:var(--bg-card);border:1px solid rgba(0,245,255,.25);border-radius:var(--radius-lg);margin-bottom:24px;position:relative;overflow:hidden">
  <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--neon-cyan),var(--neon-green))"></div>
  <div style="font-family:var(--font-display);font-size:3.5rem;font-weight:900;color:var(--neon-green);text-shadow:var(--glow-green);line-height:1"><?= $pontos ?></div>
  <div style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);letter-spacing:.15em;text-transform:uppercase;margin-top:6px">PONTOS CONQUISTADOS</div>
  <?php
    $acertos = 0;
    foreach ($historico as $h) { if ($h['resposta'] === $h['correta']) $acertos++; }
    $erros = count($historico) - $acertos;
  ?>
  <div style="display:flex;justify-content:center;gap:10px;margin-top:16px;flex-wrap:wrap">
    <span class="badge b-green">🎯 <?= $acertos ?> acerto<?= $acertos != 1 ? 's' : '' ?></span>
    <span class="badge b-pink">✘ <?= $erros ?> erro<?= $erros != 1 ? 's' : '' ?></span>
    <span class="badge b-yellow">+<?= $pontos ?> XP</span>
  </div>
</div>

<!-- REVISÃO -->
<h2 style="margin-bottom:16px">REVISÃO DA MISSÃO</h2>

<?php foreach ($historico as $h): ?>
  <?php $ok = ($h['resposta'] === $h['correta']); ?>
  <div class="result-item <?= $ok ? 'correct' : 'wrong' ?>" style="margin-bottom:12px">
    <div class="result-verdict <?= $ok ? 'v-ok' : 'v-err' ?>">
      <?= $ok ? '✔ ACERTOU! +25 PONTOS' : '✘ ERROU! +0 PONTOS' ?>
    </div>
    <p style="margin-bottom:6px"><strong>Questão:</strong> <?= html_escape($h['enunciado']) ?></p>
    <p style="font-size:.9rem;color:var(--text-dim)">
      <strong style="color:<?= $ok ? 'var(--neon-green)' : 'var(--neon-pink)' ?>">Sua resposta:</strong> <?= html_escape($h['resposta']) ?>
      &nbsp;|&nbsp;
      <strong style="color:var(--neon-green)">Correta:</strong> <?= html_escape($h['correta']) ?>
    </p>
    <?php if (!empty($h['feedback'])): ?>
      <p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-top:10px;border-top:1px solid rgba(255,255,255,.06);padding-top:10px">
        💡 <?= html_escape($h['feedback']) ?>
      </p>
    <?php endif; ?>
  </div>
<?php endforeach; ?>

<div style="display:flex;gap:12px;justify-content:center;margin-top:24px;flex-wrap:wrap">
  <a href="<?= site_url('quizzes') ?>" class="btn btn-primary">⟳ JOGAR NOVAMENTE</a>
  <a href="<?= site_url('painel') ?>"  class="btn btn-secondary">← PAINEL</a>
</div>
