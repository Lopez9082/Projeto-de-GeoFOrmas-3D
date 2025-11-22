<h3>Pergunta <?= $numero ?>/5</h3>

<p><?= $questao->enunciado ?></p>

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

    <button name="resposta" value="D" class="btn btn-outline-primary btn-block" style="margin-bottom:5px">
        E) <?= html_escape($questao->alternativa_e) ?>
    </button>

</form>