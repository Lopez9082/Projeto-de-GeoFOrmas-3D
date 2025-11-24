<div class="question-container">

    <h3 class="text-center mb-4">
        Pergunta <?= $numero ?>/5
    </h3>

    <div class="question-card shadow-sm">

        <p class="question-text"><?= nl2br(html_escape($questao->enunciado)) ?></p>

        <!-- IMAGEM -->
        <?php if (!empty($questao->imagem)) : ?>
            <div class="question-image">
                <img src="<?= base_url('/uploads/questoes/' . $questao->imagem) ?>">
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('quizzes/responder') ?>">
            <input type="hidden" name="correta" value="<?= $questao->correta ?>">
            <input type="hidden" name="enunciado" value="<?= $questao->enunciado ?>">
            <input type="hidden" name="feedback" value="<?= $questao->feedback_pedagogico ?>">

            <div class="options-wrapper">

                <button name="resposta" value="A" class="option-btn">
                    A) <?= html_escape($questao->alternativa_a) ?>
                </button>

                <button name="resposta" value="B" class="option-btn">
                    B) <?= html_escape($questao->alternativa_b) ?>
                </button>

                <button name="resposta" value="C" class="option-btn">
                    C) <?= html_escape($questao->alternativa_c) ?>
                </button>

                <button name="resposta" value="D" class="option-btn">
                    D) <?= html_escape($questao->alternativa_d) ?>
                </button>

                <button name="resposta" value="E" class="option-btn">
                    E) <?= html_escape($questao->alternativa_e) ?>
                </button>

            </div>

        </form>

    </div>
</div>

<style>
.question-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 15px;
}

.question-card {
    background: #fff;
    border-radius: 14px;
    padding: 25px;
    border: 1px solid #e4e8f2;
    background: linear-gradient(135deg, #ffffff, #f4f7ff);
}

.question-text {
    font-size: 1.15rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 500;
}

/* IMAGEM */
.question-image {
    text-align: center;
    margin-bottom: 20px;
}

.question-image img {
    max-width: 100%;
    max-height: 320px;
    border-radius: 10px;
    border: 1px solid #ddd;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

/* BOTÕES */
.options-wrapper {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.option-btn {
    border: none;
    border-radius: 10px;
    padding: 14px 18px;
    text-align: left;
    background: #fff;
    font-size: 1.05rem;
    font-weight: 500;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: .25s ease;
    border: 1px solid #dce2f0;
    color: #333;
}

.option-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.15);
    background: linear-gradient(135deg, #eaf0ff, #ffffff);
}

/* MOBILE */
@media (max-width: 576px) {
    .question-card {
        padding: 18px;
    }
    .option-btn {
        font-size: 1rem;
        padding: 12px 14px;
    }
}
</style>
