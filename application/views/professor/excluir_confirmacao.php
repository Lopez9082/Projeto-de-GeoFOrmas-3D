<!-- application/views/professor/excluir_confirmacao.php -->
<div class="container" style="max-width:820px;margin:30px auto;">
    <div style="background:#fff;border-radius:10px;padding:22px;box-shadow:0 6px 18px rgba(0,0,0,0.06);">

        <h3 style="margin-top:0;color:#c62828;">Ocultar Questão</h3>

        <?php if ($this->session->flashdata('erro')): ?>
            <div style="color:#b91c1c;margin-bottom:12px;"><?= html_escape($this->session->flashdata('erro')) ?></div>
        <?php endif; ?>

        <p><strong>Enunciado:</strong></p>
        <div style="background:#f7fafc;padding:12px;border-radius:6px;margin-bottom:12px;">
            <?= nl2br(html_escape($questao->enunciado)) ?>
        </div>

        <?php if (!empty($questao->imagem)): ?>
            <div style="text-align:center;margin-bottom:12px;">
                <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" alt="Imagem" style="max-width:360px;border-radius:6px;border:1px solid #eee;">
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('professor/ocultar_questao/'.$questao->id) ?>">
            <label for="motivo" style="font-weight:600">Motivo da ocultação (visível apenas para administradores):</label>
            <textarea id="motivo" name="motivo" required rows="4" style="width:100%;padding:10px;border-radius:6px;border:1px solid #ccc;margin-top:6px;"></textarea>

            <div style="display:flex;gap:10px;margin-top:14px;">
                <button type="submit" class="btn btn-danger" style="background:#c62828;border:none;padding:10px 16px;border-radius:8px;color:#fff;">
                    Ocultar questão
                </button>
                <a href="<?= base_url('professor/questoes') ?>" class="btn" style="background:#eee;padding:10px 16px;border-radius:8px;color:#333;text-decoration:none;">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
