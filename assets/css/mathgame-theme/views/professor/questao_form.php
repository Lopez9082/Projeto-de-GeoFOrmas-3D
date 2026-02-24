<div style="max-width:860px;margin:0 auto">

  <h2 style="margin-bottom:6px"><?= isset($questao) ? 'EDITAR QUESTÃO' : 'NOVA QUESTÃO' ?></h2>
  <p style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim);margin-bottom:22px">
    // <?= isset($questao) ? 'ATUALIZE OS DADOS ABAIXO' : 'PREENCHA TODOS OS CAMPOS' ?>
  </p>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro" style="margin-bottom:16px">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>

  <div class="card">
    <form action="<?= base_url(isset($questao) ? 'professor/editar_questao/'.$questao->id : 'professor/nova_questao') ?>"
          method="post" enctype="multipart/form-data">

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
        <div>
          <label>Tema</label>
          <select name="tema_id" required>
            <option value="">Selecione...</option>
            <?php foreach ($temas as $t): ?>
              <option value="<?= $t->id ?>" <?= isset($questao) && $questao->tema_id == $t->id ? 'selected' : '' ?>>
                <?= html_escape($t->titulo) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label>Nível</label>
          <select name="nivel" required>
            <option value="Ensino Fundamental I"  <?= isset($questao) && $questao->nivel == 'Ensino Fundamental I'  ? 'selected' : '' ?>>Ensino Fundamental I</option>
            <option value="Ensino Fundamental II" <?= isset($questao) && $questao->nivel == 'Ensino Fundamental II' ? 'selected' : '' ?>>Ensino Fundamental II</option>
            <option value="Ensino medio"          <?= isset($questao) && $questao->nivel == 'Ensino medio'          ? 'selected' : '' ?>>Ensino Médio</option>
          </select>
        </div>
      </div>

      <label>Enunciado</label>
      <textarea name="enunciado" rows="5" required style="resize:vertical"><?= isset($questao) ? html_escape($questao->enunciado) : '' ?></textarea>

      <label>Imagem (opcional)</label>
      <input type="file" name="imagem" accept="image/*" style="color:var(--text-dim);font-family:var(--font-mono);font-size:.82rem">
      <?php if (isset($questao) && !empty($questao->imagem)): ?>
        <div style="margin-bottom:14px">
          <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" style="max-width:200px;border-radius:var(--radius);border:1px solid rgba(0,245,255,.2)">
        </div>
      <?php endif; ?>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
        <div>
          <label>Alternativa A</label>
          <input type="text" name="alternativa_a" value="<?= isset($questao) ? html_escape($questao->alternativa_a) : '' ?>" required>
        </div>
        <div>
          <label>Alternativa B</label>
          <input type="text" name="alternativa_b" value="<?= isset($questao) ? html_escape($questao->alternativa_b) : '' ?>" required>
        </div>
        <div>
          <label>Alternativa C</label>
          <input type="text" name="alternativa_c" value="<?= isset($questao) ? html_escape($questao->alternativa_c) : '' ?>" required>
        </div>
        <div>
          <label>Alternativa D</label>
          <input type="text" name="alternativa_d" value="<?= isset($questao) ? html_escape($questao->alternativa_d) : '' ?>" required>
        </div>
        <div>
          <label>Alternativa E</label>
          <input type="text" name="alternativa_e" value="<?= isset($questao) ? html_escape($questao->alternativa_e) : '' ?>">
        </div>
        <div>
          <label>Resposta Correta (A–E)</label>
          <input type="text" name="correta" maxlength="1" pattern="[A-Ea-e]"
            value="<?= isset($questao) ? html_escape($questao->correta) : '' ?>" required
            placeholder="A, B, C, D ou E">
        </div>
      </div>

      <label>Feedback Pedagógico</label>
      <textarea name="feedback_pedagogico" rows="4" style="resize:vertical"><?= isset($questao) ? html_escape($questao->feedback_pedagogico) : '' ?></textarea>

      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary"><?= isset($questao) ? '✔ ATUALIZAR' : '+ SALVAR QUESTÃO' ?></button>
        <a href="<?= base_url('professor/questoes') ?>" class="btn btn-secondary">← CANCELAR</a>
      </div>

    </form>
  </div>
</div>
