<h2 style="margin-bottom:6px">LABORATÓRIO</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">// RECURSOS DESBLOQUEADOS COM XP</p>

<!-- XP INFO -->
<div class="card card-purple" style="margin-bottom:22px">
  <h3>Seu XP Total</h3>
  <div class="stat-val purple"><?= $progresso ? (int)$progresso->xp_total : 0 ?></div>
</div>

<!-- RECURSOS -->
<div class="card">
  <h3 style="margin-bottom:16px">Ferramentas Disponíveis</h3>
  <?php if (empty($funcs)): ?>
    <div style="text-align:center;padding:32px 20px">
      <div style="font-size:2.5rem;margin-bottom:12px">🔒</div>
      <p style="color:var(--text-dim);font-family:var(--font-mono);font-size:.82rem">Nenhum recurso desbloqueado ainda.</p>
      <p style="color:var(--text-dim);font-size:.9rem;margin-top:8px">Ganhe XP resolvendo quizzes para desbloquear ferramentas!</p>
      <a href="<?= site_url('quizzes') ?>" class="btn btn-primary" style="margin-top:18px">🎲 Jogar Quiz</a>
    </div>
  <?php else: ?>
    <div style="display:flex;flex-direction:column;gap:10px">
      <?php foreach ($funcs as $f): ?>
        <div style="background:rgba(0,245,255,.04);border:1px solid rgba(0,245,255,.2);border-radius:var(--radius);padding:14px 18px;display:flex;align-items:center;gap:12px">
          <span style="color:var(--neon-green);font-size:1.2rem">⚡</span>
          <span style="font-weight:500"><?= html_escape($f) ?></span>
          <span class="badge b-green" style="margin-left:auto">ATIVO</span>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
