<h2 style="margin-bottom:6px">LABORATÓRIO</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">
// RECURSOS DESBLOQUEADOS COM XP
</p>

<!-- XP -->
<div class="card card-purple" style="margin-bottom:22px">
  <h3>Seu XP Total</h3>
  <div class="stat-val purple"><?= $xp ?></div>
</div>

<!-- CERTIFICADOS -->
<div class="card" style="margin-top:22px">
  <h3>🏅 Certificados</h3>

<?php if (empty($certificados)): ?>

  <p>😢 Você ainda não conquistou nenhum certificado.</p>

  <?php if($proximo): ?>
    <p>
      🚀 Faltam <strong><?= $proximo->xp_minimo - $xp ?> XP</strong>
      para desbloquear:
      <strong><?= $proximo->titulo ?></strong>
    </p>

    <?php $porcentagem = ($xp / $proximo->xp_minimo) * 100; ?>

    <div style="background:#222;border-radius:10px;overflow:hidden;margin-top:10px">
      <div style="width:<?= $porcentagem ?>%;background:#00f5ff;height:10px"></div>
    </div>

  <?php endif; ?>

<?php else: ?>

  <?php foreach ($certificados as $c): ?>
    <div style="margin-top:12px">
      🎓 <strong><?= $c->titulo ?></strong>
      (<?= $c->xp_minimo ?> XP)

      <a href="<?= base_url($c->arquivo_pdf) ?>" target="_blank" class="btn btn-primary">
        📄 Baixar PDF
      </a>
    </div>
  <?php endforeach; ?>

  <?php if($proximo): ?>
    <p style="margin-top:15px">
      🚀 Faltam <strong><?= $proximo->xp_minimo - $xp ?> XP</strong>
      para o próximo certificado:
      <strong><?= $proximo->titulo ?></strong>
    </p>
  <?php else: ?>
    <p>🏆 Você já conquistou todos os certificados!</p>
  <?php endif; ?>

<?php endif; ?>
</div>