<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($questao) ? 'Editar Questão' : 'Criar Questão' ?></title>

    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f2f5fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 25px;
            color: #2b4ea2;
            font-size: 28px;
        }

        .card {
            width: 70%;
            max-width: 850px;
            background: #fff;
            margin: 30px auto;
            padding: 30px 40px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        }

        label {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccd3df;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 15px;
            background: #fafbff;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #2b4ea2;
            box-shadow: 0 0 4px rgba(43, 78, 162, 0.4);
            background: #fff;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        input[type="file"] {
            margin-bottom: 18px;
        }

        .img-preview {
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            max-width: 180px;
            display: block;
        }

        button {
            background: #2b4ea2;
            color: #fff;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            font-weight: 600;
            transition: 0.2s;
        }

        button:hover {
            background: #1c3c82;
        }

        .erro {
            color: red;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
    </style>

</head>
<body>

<h2><?= isset($questao) ? 'Editar Questão' : 'Criar Nova Questão' ?></h2>

<?php if ($this->session->flashdata('erro')): ?>
    <p class="erro"><?= $this->session->flashdata('erro') ?></p>
<?php endif; ?>

<div class="card">

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

    <label>Nível:</label>
    <select name="nivel" required>
        <option value="Ensino Fundamental I" <?= isset($questao) && $questao->nivel == 'Ensino Fundamental I' ? 'selected' : '' ?>>Ensino Fundamental I</option>
        <option value="Ensino Fundamental II" <?= isset($questao) && $questao->nivel == 'Ensino Fundamental II' ? 'selected' : '' ?>>Ensino Fundamental II</option>
        <option value="Ensino medio" <?= isset($questao) && $questao->nivel == 'Ensino medio' ? 'selected' : '' ?>>Ensino médio</option>
    </select>

    <label>Enunciado:</label>
    <textarea name="enunciado" required><?= isset($questao) ? $questao->enunciado : '' ?></textarea>

    <label>Imagem (opcional):</label>
    <input type="file" name="imagem">

    <?php if(isset($questao) && $questao->imagem): ?>
        <img src="<?= base_url('uploads/questoes/'.$questao->imagem) ?>" class="img-preview">
    <?php endif; ?>

    <label>Alternativa A:</label>
    <input type="text" name="alternativa_a" value="<?= isset($questao) ? $questao->alternativa_a : '' ?>" required>

    <label>Alternativa B:</label>
    <input type="text" name="alternativa_b" value="<?= isset($questao) ? $questao->alternativa_b : '' ?>" required>

    <label>Alternativa C:</label>
    <input type="text" name="alternativa_c" value="<?= isset($questao) ? $questao->alternativa_c : '' ?>" required>

    <label>Alternativa D:</label>
    <input type="text" name="alternativa_d" value="<?= isset($questao) ? $questao->alternativa_d : '' ?>" required>

    <label>Alternativa E:</label>
    <input type="text" name="alternativa_e" value="<?= isset($questao) ? $questao->alternativa_e : '' ?>" required>

    <label>Correta (A–E):</label>
    <input type="text" maxlength="1" name="correta" value="<?= isset($questao) ? $questao->correta : '' ?>" required>

    <label>Feedback pedagógico:</label>
    <textarea name="feedback_pedagogico"><?= isset($questao) ? $questao->feedback_pedagogico : '' ?></textarea>

    <button type="submit"><?= isset($questao) ? 'Atualizar Questão' : 'Salvar Questão' ?></button>

</form>

</div>

</body>
</html>
