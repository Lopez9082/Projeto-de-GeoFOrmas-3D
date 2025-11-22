<h2>Resultado do Quiz</h2>

<h3>Total: <?= $pontos ?> pontos</h3>
<hr>

<?php foreach ($historico as $h): ?>

<div class="card" style="padding:15px;margin-bottom:10px">

    <p><b>Pergunta:</b> <?= $h['enunciado'] ?></p>

    <p>
        <b>Sua resposta:</b> <?= $h['resposta'] ?><br>
        <b>Correta:</b> <?= $h['correta'] ?>
    </p>

    <?php if ($h['resposta'] === $h['correta']): ?>
        <p style="color:green"><b>✔ Acertou! +25 pontos</b></p>
    <?php else: ?>
        <p style="color:red"><b>✘ Errou!</b></p>
    <?php endif; ?>

    <p><b>Feedback do professor:</b><br>
        <?= $h['feedback'] ?>
    </p>

</div>

<?php endforeach; ?>
