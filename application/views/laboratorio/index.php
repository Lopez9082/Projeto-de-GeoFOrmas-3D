<h2 style="margin-bottom:6px">LABORATÓRIO</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">// RECURSOS DESBLOQUEADOS COM XP</p>

<!-- XP INFO -->
<div class="card card-purple" style="margin-bottom:22px">
  <h3>Seu XP Total</h3>
  <div class="stat-val purple"><?= $progresso ? (int)$progresso->xp_total : 0 ?></div>
</div>


<!-- CERTIFICADOS -->
<div class="card" style="margin-top:22px">
  <h3>🏅 Certificados Conquistados</h3>

<?php if (empty($certificados)): ?>
  <p>Nenhum certificado conquistado ainda.</p>
<?php endif; ?>

<?php foreach ($certificados as $c): ?>
  <div style="margin-top:12px">
    🎓 <strong><?= $c->titulo ?></strong>
    (<?= $c->xp_minimo ?> XP)
    <a href="<?= base_url($c->arquivo_pdf) ?>" target="_blank" class="btn btn-primary">
      📄 Baixar PDF
    </a>
  </div>
<?php endforeach; ?>
</div>

