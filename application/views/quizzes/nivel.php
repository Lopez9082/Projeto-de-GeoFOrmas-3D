<head>
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/quizzes/nivel') ?>">
</head>


<h2 style="margin-bottom:6px">ESCOLHER DIFICULDADE</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:4px">TEMA: <strong style="color:var(--neon-cyan)"><?= html_escape($tema->titulo) ?></strong></p>
<hr>

<div class="levels-wrapper">
<!--
  <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
    <input type="hidden" name="tema" value="<?= $tema->id ?>">
    <input type="hidden" name="nivel" value="Ensino fundamental I">
    <button type="submit" class="level-btn">
      <div class="level-card">
        <span style="font-size:2rem;display:block;margin-bottom:12px">🌱</span>
        <h5>Fund. I</h5>
        <p style="font-family:var(--font-mono);font-size:.65rem;color:var(--text-dim);margin-top:8px">DIFICULDADE: FÁCIL</p>
      </div>
    </button>
  </form>
-->
  <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
    <input type="hidden" name="tema" value="<?= $tema->id ?>">
    <input type="hidden" name="nivel" value="Ensino fundamental II">
    <button type="submit" class="level-btn">
      <div class="level-card" style="border-color:rgba(255,229,0,.3)">
        <span style="font-size:2rem;display:block;margin-bottom:12px">⚔️</span>
        <h5 style="color:var(--neon-yellow)">Fund. II</h5>
        <p style="font-family:var(--font-mono);font-size:.65rem;color:var(--text-dim);margin-top:8px">DIFICULDADE: MÉDIO</p>
      </div>
    </button>
  </form>

  <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
    <input type="hidden" name="tema" value="<?= $tema->id ?>">
    <input type="hidden" name="nivel" value="Ensino médio">
    <button type="submit" class="level-btn">
      <div class="level-card" style="border-color:rgba(255,0,200,.3)">
        <span style="font-size:2rem;display:block;margin-bottom:12px">💀</span>
        <h5 style="color:var(--neon-pink)">Ens. Médio</h5>
        <p style="font-family:var(--font-mono);font-size:.65rem;color:var(--text-dim);margin-top:8px">DIFICULDADE: DIFÍCIL</p>
      </div>
    </button>
  </form>

</div>
