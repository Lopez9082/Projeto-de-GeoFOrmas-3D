<div style="max-width:700px;margin:0 auto">
  <h2 style="margin-bottom:6px;color:var(--neon-pink);text-shadow:var(--glow-pink)">OCULTAR QUESTÃO</h2>
  <p style="font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim);margin-bottom:20px">// INFORME O MOTIVO DA OCULTAÇÃO</p>

  <?php if ($this->session->flashdata('erro')): ?>
    <div class="msg-erro" style="margin-bottom:14px">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
  <?php endif; ?>

  <div class="card" style="border-color:rgba(255,0,200,.35)">
    <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--neon-pink),var(--neon-purple))"></div>

    <h3 style="margin-bottom:12px">Enunciado da Questão</h3>
    <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.07);border-radius:var(--radius);padding:14px;margin-bottom:16px;font-size:.95rem;line-height:1.6">
      <?= nl2br(html_escape($questao->enunciado)) ?>
    </div>

    <?php if (!empty($questao->imagem)): ?>
      <div style="text-align:center;margin-bottom:16px">
        <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" style="max-width:320px;border-radius:var(--radius);border:1px solid rgba(0,245,255,.2)">
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('professor/ocultar_questao/'.$questao->id) ?>">
      <label>Motivo da ocultação</label>
      <textarea name="motivo" required rows="4" placeholder="Descreva o motivo..." style="resize:vertical"></textarea>

      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn" style="background:linear-gradient(135deg,var(--neon-pink),var(--neon-purple));color:#fff">
          👁 OCULTAR QUESTÃO
        </button>
        <a href="<?= base_url('professor/questoes') ?>" class="btn btn-secondary">← CANCELAR</a>
      </div>
    </form>
  </div>
</div>
