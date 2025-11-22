<h2>Ocultar Questão</h2>

<p><strong>Questão:</strong> <?= $questao->enunciado ?></p>

<form action="" method="post">
    <label>Motivo da Ocultação:</label><br>
    <textarea name="motivo" required placeholder="Explique o motivo..." style="width:100%;height:120px;"></textarea>
    <br><br>
    <button type="submit">Ocultar Questão</button>
</form>
