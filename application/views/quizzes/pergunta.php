<head>
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/quizzes/pergunta.css') ?>"> 
</head>

<div class="question-container">

  <!-- BARRA DE PROGRESSO -->
  <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px">
    <span style="font-family:var(--font-display);font-size:.72rem;color:var(--text-dim);white-space:nowrap">QUESTÃO <?= $numero ?>/10</span>
    <div style="flex:1;height:6px;background:rgba(0,245,255,.1);border-radius:3px;overflow:hidden">
      <div style="height:100%;width:<?= ($numero / 10) * 100 ?>%;background:linear-gradient(90deg,var(--neon-cyan),var(--neon-pink));border-radius:3px;box-shadow:var(--glow-cyan);transition:width .5s ease"></div>
    </div>
    <span style="font-family:var(--font-mono);font-size:.72rem;color:var(--neon-green);text-shadow:var(--glow-green)">⬡ +25 pts</span>
  </div>

  <!-- CARD DA QUESTÃO -->
  <div class="question-card">

    <p class="question-text"><?= nl2br(html_escape($questao->enunciado)) ?></p>

    <?php if (!empty($questao->imagem)): ?>
      <div class="question-image">
        <img src="<?= base_url('/uploads/questoes/'.$questao->imagem) ?>" alt="Imagem da questão">
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('quizzes/responder') ?>">
      <input type="hidden" name="correta"   value="<?= $questao->correta ?>">
      <input type="hidden" name="enunciado" value="<?= html_escape($questao->enunciado) ?>">
      <input type="hidden" name="feedback"  value="<?= html_escape($questao->feedback_pedagogico) ?>">

      <div class="options-wrapper">
        <button name="resposta" value="A" class="option-btn"><strong style="color:var(--neon-cyan);font-family:var(--font-mono)">A)</strong> &nbsp;<?= html_escape($questao->alternativa_a) ?></button>
        <button name="resposta" value="B" class="option-btn"><strong style="color:var(--neon-cyan);font-family:var(--font-mono)">B)</strong> &nbsp;<?= html_escape($questao->alternativa_b) ?></button>
        <button name="resposta" value="C" class="option-btn"><strong style="color:var(--neon-cyan);font-family:var(--font-mono)">C)</strong> &nbsp;<?= html_escape($questao->alternativa_c) ?></button>
        <button name="resposta" value="D" class="option-btn"><strong style="color:var(--neon-cyan);font-family:var(--font-mono)">D)</strong> &nbsp;<?= html_escape($questao->alternativa_d) ?></button>
        <button name="resposta" value="E" class="option-btn"><strong style="color:var(--neon-cyan);font-family:var(--font-mono)">E)</strong> &nbsp;<?= html_escape($questao->alternativa_e) ?></button>
      </div>
    </form>

  </div>
</div>
