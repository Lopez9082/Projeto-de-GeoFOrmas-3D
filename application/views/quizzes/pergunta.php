<h3>Pergunta <?= $numero ?>/5</h3>

<p><?= $questao->enunciado ?></p>

<!-- EXIBIR IMAGEM SE EXISTIR -->
<?php if (!empty($questao->imagem)) : ?>
    <div style="margin: 20px auto; text-align: center;">
        <img src="<?= base_url('/uploads/questoes/' . $questao->imagem) ?>" 
             alt="Imagem da questão"
             style="
                max-width: 500px;
                max-height: 350px;
                width: 100%;
                height: auto;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.15);
             ">
    </div>
<?php endif; ?>


<form method="post" action="<?= base_url('quizzes/responder') ?>">

    <input type="hidden" name="correta" value="<?= $questao->correta ?>">
    <input type="hidden" name="enunciado" value="<?= $questao->enunciado ?>">
    <input type="hidden" name="feedback" value="<?= $questao->feedback_pedagogico ?>">

    <button name="resposta" value="A" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        A) <?= html_escape($questao->alternativa_a) ?>
    </button>

    <button name="resposta" value="B" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        B) <?= html_escape($questao->alternativa_b) ?>
    </button>

    <button name="resposta" value="C" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        C) <?= html_escape($questao->alternativa_c) ?>
    </button>

    <button name="resposta" value="D" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        D) <?= html_escape($questao->alternativa_d) ?>
    </button>

    <button name="resposta" value="E" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        E) <?= html_escape($questao->alternativa_e) ?>
    </button>

</form>
