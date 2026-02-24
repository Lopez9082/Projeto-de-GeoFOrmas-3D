<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= ($acao === 'novo') ? 'Nova Questão' : 'Editar Questão' ?> — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">
</head>
<body style="padding:28px">

<div style="max-width:860px;margin:0 auto">
  <h2 style="margin-bottom:6px"><?= ($acao === 'novo') ? 'NOVA QUESTÃO' : 'EDITAR QUESTÃO' ?></h2>
  <p style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim);margin-bottom:20px">// ADMIN PANEL</p>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="msg-success" style="margin-bottom:14px">✔ <?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="msg-erro" style="margin-bottom:14px">⚠ <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <?php echo form_open(
      ($acao === 'novo') ? 'questoes/salvar' : 'questoes/atualizar/' . (isset($questao) ? $questao->id : ''),
      ['enctype' => 'multipart/form-data']
    ); ?>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
        <div>
          <label>Tema</label>
          <select name="tema_id" required>
            <?php foreach ($temas as $t):
              $sel = (isset($questao) && $questao->tema_id == $t->id) ? 'selected' : ''; ?>
              <option value="<?= $t->id ?>" <?= $sel ?>><?= html_escape($t->titulo) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label>Nível</label>
          <select name="nivel">
            <?php $nivels = ['facil'=>'Fácil','medio'=>'Médio','dificil'=>'Difícil'];
            foreach ($nivels as $k => $v):
              $sel = (isset($questao) && $questao->nivel == $k) ? 'selected' : ''; ?>
              <option value="<?= $k ?>" <?= $sel ?>><?= $v ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <label>Enunciado</label>
      <textarea name="enunciado" rows="5" required style="resize:vertical"><?= isset($questao) ? html_escape($questao->enunciado) : '' ?></textarea>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
        <?php foreach (['a','b','c','d','e'] as $alt): ?>
          <div>
            <label>Alternativa <?= strtoupper($alt) ?></label>
            <input type="text" name="alternativa_<?= $alt ?>"
              value="<?= isset($questao) ? html_escape($questao->{'alternativa_'.$alt}) : '' ?>"
              <?= in_array($alt, ['a','b','c','d']) ? 'required' : '' ?>>
          </div>
        <?php endforeach; ?>
        <div>
          <label>Resposta Correta (A–E)</label>
          <input type="text" name="correta" maxlength="1" pattern="[A-Ea-e]"
            value="<?= isset($questao) ? html_escape($questao->correta) : '' ?>" required>
        </div>
      </div>

      <label>Feedback Pedagógico</label>
      <textarea name="feedback_pedagogico" rows="4" style="resize:vertical"><?= isset($questao) ? html_escape($questao->feedback_pedagogico) : '' ?></textarea>

      <label>Imagem (opcional)</label>
      <input type="file" name="imagem" accept="image/*" style="color:var(--text-dim);font-family:var(--font-mono);font-size:.82rem">
      <?php if (isset($questao) && !empty($questao->imagem)): ?>
        <div style="margin-bottom:14px">
          <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" style="max-width:200px;border-radius:var(--radius)">
        </div>
      <?php endif; ?>

      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary"><?= ($acao === 'novo') ? '+ CADASTRAR' : '✔ ATUALIZAR' ?></button>
        <a href="<?= site_url('questoes') ?>" class="btn btn-secondary">← CANCELAR</a>
      </div>

    <?php echo form_close(); ?>
  </div>
</div>

</body>
</html>
