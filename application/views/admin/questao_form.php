<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($acao === 'novo') ? 'Nova Questão' : 'Editar Questão'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body { font-family: Roboto, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #007bff; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: 400; }
        input, select, textarea { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        textarea { resize: vertical; }
        .alternativas { display: flex; flex-wrap: wrap; gap: 10px; }
        .alternativas input { width: calc(50% - 10px); } /* 2 colunas em telas grandes */
        button { background: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        .cancel { background: #6c757d; margin-left: 10px; }
        .cancel:hover { background: #545b62; }
        .flash { padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .flash.success { background: #d4edda; color: #155724; }
        .flash.error { background: #f8d7da; color: #721c24; }
        @media (max-width: 600px) { .alternativas input { width: 100%; } .container { padding: 10px; } }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo ($acao === 'novo') ? 'Nova Questão' : 'Editar Questão'; ?></h2>

        <!-- Mensagens de Flashdata (sucesso/erro) -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="flash success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="flash error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <!-- Formulário com CSRF automático -->
        <?php echo form_open(($acao === 'novo') ? 'questoes/salvar' : 'questoes/atualizar/' . (isset($questao) ? $questao->id : ''), ['enctype' => 'multipart/form-data']); ?>

            <label for="tema_id">Tema</label>
            <select name="tema_id" id="tema_id" required>
                <?php foreach ($temas as $t): 
                    $sel = (isset($questao) && $questao->tema_id == $t->id) ? 'selected' : ''; ?>
                    <option value="<?php echo $t->id; ?>" <?php echo $sel; ?>><?php echo html_escape($t->titulo); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="nivel">Nível</label>
            <select name="nivel" id="nivel">
                <?php $nivels = ['facil' => 'Fácil', 'medio' => 'Médio', 'dificil' => 'Difícil']; 
                foreach ($nivels as $k => $v): 
                    $sel = (isset($questao) && $questao->nivel == $k) ? 'selected' : ''; ?>
                    <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="enunciado">Enunciado</label>
            <textarea name="enunciado" id="enunciado" rows="6" required><?php echo isset($questao) ? html_escape($questao->enunciado) : ''; ?></textarea>

            <div class="alternativas">
                <div><label for="alternativa_a">Alternativa A</label><input type="text" name="alternativa_a" id="alternativa_a" value="<?php echo isset($questao) ? html_escape($questao->alternativa_a) : ''; ?>" required></div>
                <div><label for="alternativa_b">Alternativa B</label><input type="text" name="alternativa_b" id="alternativa_b" value="<?php echo isset($questao) ? html_escape($questao->alternativa_b) : ''; ?>" required></div>
                <div><label for="alternativa_c">Alternativa C</label><input type="text" name="alternativa_c" id="alternativa_c" value="<?php echo isset($questao) ? html_escape($questao->alternativa_c) : ''; ?>" required></div>
                <div><label for="alternativa_d">Alternativa D</label><input type="text" name="alternativa_d" id="alternativa_d" value="<?php echo isset($questao) ? html_escape($questao->alternativa_d) : ''; ?>" required></div>
                <div><label for="alternativa_e">Alternativa E</label><input type="text" name="alternativa_e" id="alternativa_e" value="<?php echo isset($questao) ? html_escape($questao->alternativa_e) : ''; ?>"></div>
            </div>

            <label for="correta">Alternativa Correta (A/B/C/D/E)</label>
            <input type="text" name="correta" id="correta" value="<?php echo isset($questao) ? html_escape($questao->correta) : ''; ?>" required pattern="[A-Ea-e]" title="Digite A, B, C, D ou E">

            <label for="feedback_pedagogico">Feedback Pedagógico</label>
            <textarea name="feedback_pedagogico" id="feedback_pedagogico" rows="4"><?php echo isset($questao) ? html_escape($questao->feedback_pedagogico) : ''; ?></textarea>

            <label for="imagem">Imagem (opcional)</label>
            <input type="file" name="imagem" id="imagem" accept="image/*">
            <?php if (isset($questao) && !empty($questao->imagem)): ?>
                <p>Imagem atual: <img src="<?php echo base_url('uploads/questoes/' . $questao->imagem); ?>" alt="Imagem" style="max-width: 200px;"></p>
            <?php endif; ?>

            <button type="submit"><?php echo ($acao === 'novo') ? 'Cadastrar' : 'Atualizar'; ?></button>
            <a href="<?php echo site_url('questoes'); ?>" class="cancel">Cancelar</a>
        <?php echo form_close(); ?>
    </div>
</body>
</html>