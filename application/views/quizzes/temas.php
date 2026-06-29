<style>
/* GRID DOS TEMAS */
.levels-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

/* BOTÃO DO TEMA */
.level-btn {
  text-decoration: none;
}

.level-card {
  background: #120f2e;
  border: 1px solid rgba(0,245,255,.2);
  border-radius: 10px;

  padding: 10px 14px;
  min-width: 120px;

  display: flex;
  align-items: center;
  gap: 8px;

  transition: all .2s ease;
  cursor: pointer;
}

/* ÍCONE */
.tema-icon {
  font-size: 1.3rem;
  text-shadow: 0 0 8px #00f5ff;
}

/* TEXTO */
.level-card h5 {
  font-size: .8rem;
  margin: 0;
  color: #e8f4ff;
}

/* HOVER */
.level-card:hover {
  transform: translateY(-2px) scale(1.03);
  box-shadow: 0 0 10px #00f5ff;
  border-color: #00f5ff;
}
</style>

<h2 style="margin-bottom:6px">ESCOLHER TEMA</h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">
// SELECIONE O ASSUNTO DA MISSÃO
</p>

<div class="levels-wrapper">
<?php foreach ($temas as $t): ?>
  <a href="<?= base_url('quizzes/tema/'.$t->id) ?>" class="level-btn">
    <div class="level-card">
      <span class="tema-icon">📐</span>
      <h5><?= html_escape($t->titulo) ?></h5>
    </div>
  </a>
<?php endforeach; ?>
</div>