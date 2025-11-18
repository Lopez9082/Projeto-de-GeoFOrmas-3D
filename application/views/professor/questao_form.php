<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($questao) ? 'Editar Questão' : 'Criar Questão' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h2><?= isset($questao) ? 'Editar Questão' : 'Criar Nova Questão' ?></h2>

<?php if ($this->session->flashdata('erro')): ?>
    <p style="color:red;"><?= $this->session->flashdata('erro') ?></p>
<?php endif; ?>

<form action="<?= base_url(isset($questao) ? 'professor/editar_questao/'.$questao->id : 'professor/nova_questao') ?>" method="post" enctype="multipart/form-data">

    <label>Tema:</label>
    <select name="tema_id" required>
        <option value="">Selecione...</option>
        <?php if(!empty($temas)): ?>
            <?php foreach ($temas as $t): ?>
                <option value="<?= $t->id ?>" <?= isset($questao) && $questao->tema_id == $t->id ? 'selected' : '' ?>>
                    <?= $t->titulo ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">Nenhum tema disponível</option>
        <?php endif; ?>
    </select>

    <br><br>

    <label>Nível:</label>
    <select name="nivel" required>
        <option value="Fácil" <?= isset($questao) && $questao->nivel == 'Fácil' ? 'selected' : '' ?>>Fácil</option>
        <option value="Médio" <?= isset($questao) && $questao->nivel == 'Médio' ? 'selected' : '' ?>>Médio</option>
        <option value="Difícil" <?= isset($questao) && $questao->nivel == 'Difícil' ? 'selected' : '' ?>>Difícil</option>
    </select>
    <br><br>

    <label>Enunciado:</label><br>
    <textarea name="enunciado" required><?= isset($questao) ? $questao->enunciado : '' ?></textarea>
    <br><br>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem">
    <?php if(isset($questao) && $questao->imagem): ?>
        <br>
        <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" alt="Imagem atual" width="150">
    <?php endif; ?>
    <br><br>

    <label>Alternativa A:</label>
    <input type="text" name="alternativa_a" value="<?= isset($questao) ? $questao->alternativa_a : '' ?>" required>
    <br><br>

    <label>Alternativa B:</label>
    <input type="text" name="alternativa_b" value="<?= isset($questao) ? $questao->alternativa_b : '' ?>" required>
    <br><br>

    <label>Alternativa C:</label>
    <input type="text" name="alternativa_c" value="<?= isset($questao) ? $questao->alternativa_c : '' ?>" required>
    <br><br>

    <label>Alternativa D:</label>
    <input type="text" name="alternativa_d" value="<?= isset($questao) ? $questao->alternativa_d : '' ?>" required>
    <br><br>

    <label>Alternativa E:</label>
    <input type="text" name="alternativa_e" value="<?= isset($questao) ? $questao->alternativa_e : '' ?>" required>
    <br><br>

    <label>Correta (A–E):</label>
    <input type="text" maxlength="1" name="correta" value="<?= isset($questao) ? $questao->correta : '' ?>" required>
    <br><br>

    <label>Feedback pedagógico:</label><br>
    <textarea name="feedback_pedagogico"><?= isset($questao) ? $questao->feedback_pedagogico : '' ?></textarea>
    <br><br>

    <button type="submit"><?= isset($questao) ? 'Atualizar Questão' : 'Salvar Questão' ?></button>
</form>

</body>
</html>
