<?php
$is_edit = isset($q);
$action = $is_edit ? 'questoes/atualizar/'.$q->id : 'questoes/salvar';
?>

<h2><?=$is_edit ? 'Editar Questão' : 'Cadastrar Questão'?></h2>

<form method="post" enctype="multipart/form-data" action="<?=base_url($action)?>">

    <label>Tema ID:</label>
    <input type="number" name="tema_id" class="form-control" value="<?=$q->tema_id ?? ''?>" required>

    <label>Nível:</label>
    <select name="nivel" class="form-control">
        <option value="facil"  <?=($is_edit && $q->nivel=='facil')?'selected':''?>>Fácil</option>
        <option value="medio"  <?=($is_edit && $q->nivel=='medio')?'selected':''?>>Médio</option>
        <option value="dificil"<?=($is_edit && $q->nivel=='dificil')?'selected':''?>>Difícil</option>
    </select>

    <label>Enunciado:</label>
    <textarea name="enunciado" class="form-control" required><?=$q->enunciado ?? ''?></textarea>

    <label>Alternativa A:</label>
    <textarea name="alternativa_a" class="form-control"><?=$q->alternativa_a ?? ''?></textarea>

    <label>Alternativa B:</label>
    <textarea name="alternativa_b" class="form-control"><?=$q->alternativa_b ?? ''?></textarea>

    <label>Alternativa C:</label>
    <textarea name="alternativa_c" class="form-control"><?=$q->alternativa_c ?? ''?></textarea>

    <label>Alternativa D:</label>
    <textarea name="alternativa_d" class="form-control"><?=$q->alternativa_d ?? ''?></textarea>

    <label>Resposta Correta:</label>
    <select name="correta" class="form-control" required>
        <option value="A" <?=($is_edit && $q->correta=='A')?'selected':''?>>A</option>
        <option value="B" <?=($is_edit && $q->correta=='B')?'selected':''?>>B</option>
        <option value="C" <?=($is_edit && $q->correta=='C')?'selected':''?>>C</option>
        <option value="D" <?=($is_edit && $q->correta=='D')?'selected':''?>>D</option>
    </select>

    <label>Feedback Pedagógico:</label>
    <textarea name="feedback_pedagogico" class="form-control"><?=$q->feedback_pedagogico ?? ''?></textarea>

    <label>Imagem da Questão (opcional):</label>
    <input type="file" name="imagem" class="form-control">

    <?php if($is_edit && isset($q->imagem)): ?>
        <p>Imagem atual:</p>
        <img src="<?=base_url('uploads/questoes/'.$q->imagem)?>" width="120">
    <?php endif; ?>

    <br>
    <button class="btn btn-success">Salvar</button>
</form>
