<?php
  $xp_total = $progresso ? (int)$progresso->xp_total : 0;

  // garante que nunca seja null
  $nome = $nome ?? 'Jogador';

  $initials = strtoupper(substr($nome, 0, 1));
?>
<script>
  document.querySelectorAll('#sidebar-xp, #topbar-xp').forEach(el => {
    el.textContent = el.id === 'topbar-xp' ? '⬡ XP: <?= $xp_total ?>' : '<?= $xp_total ?>';
  });
</script>

<!-- CABEÇALHO DA PÁGINA -->
<div style="margin-bottom:24px">
  <h2 style="margin-bottom:4px">PAINEL DO JOGADOR</h2>
  <p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim)">// BEM-VINDO DE VOLTA, <strong style="color:var(--neon-cyan)"><?= html_escape(strtoupper($nome)) ?></strong></p>
</div>

<!-- USER BOX -->
<div class="user-box" style="margin-bottom:22px">
  <div class="avatar-row">
    <div class="avatar"><?= $initials ?></div>
    <div style="flex:1">
      <strong style="font-family:var(--font-display);font-size:.85rem"><?= html_escape($nome) ?></strong><br>
      <small>Pontos totais: <?= $xp_total ?> XP</small>
    </div>
    <span class="badge b-cyan">JOGADOR ATIVO</span>
  </div>
</div>

<!-- STAT CARDS -->
<div class="top-status-grid" style="margin-bottom:22px">
  <div class="card card-green">
    <h3>Pontos Atuais</h3>
    <div class="stat-val green"><?= $xp_total ?></div>
  </div>
  <div class="card card-purple">
    <h3>Recursos Desbloqueados</h3>
    <div class="stat-val purple">Nível 1</div>
  </div>
</div>

<!-- XP BAR + CERTIFICADO -->
<div class="card" style="margin-bottom:22px">
  <h3>Progresso de XP</h3>

  <?php
    $xp_total = $xp_total ?? 0;

    // Próximo certificado
    $xp_proximo_cert = 1000; // você pode puxar do banco depois

    $faltando = max(0, $xp_proximo_cert - $xp_total);
    $pct = $xp_total > 0 ? min(100, round(($xp_total / $xp_proximo_cert) * 100)) : 0;
  ?>

  <div class="xp-bar-wrapper">
    <div class="xp-bar-label">
      <span>Certificado</span>
      <span><?= $xp_total ?> / <?= $xp_proximo_cert ?> XP</span>
    </div>

    <div class="xp-bar-track">
      <div class="xp-bar-fill" style="width:<?= $pct ?>%"></div>
    </div>
  </div>

  <div style="margin-top:12px">
    <?php if ($xp_total < $xp_proximo_cert): ?>
      <span class="badge b-yellow">
        ⚠ Faltam <?= $faltando ?> XP para desbloquear o certificado
      </span>
    <?php else: ?>
      <span class="badge b-green">
        🎉 Certificado desbloqueado!
      </span>
    <?php endif; ?>
  </div>

  <p style="margin-top:10px; font-size:.85rem; opacity:.7">
    Complete quizzes para ganhar XP e desbloquear certificados.
  </p>
</div>

<!-- AÇÕES RÁPIDAS -->
<div class="card">
  <h3 style="margin-bottom:16px">Ações Rápidas</h3>
  <div style="display:flex;flex-wrap:wrap;gap:12px">
    <a href="<?= site_url('quizzes') ?>" class="btn btn-primary">🎲 Jogar Quiz</a>
    <a href="<?= site_url('laboratorio') ?>" class="btn btn-secondary">🧪 Certificados</a>
  </div>
</div>
