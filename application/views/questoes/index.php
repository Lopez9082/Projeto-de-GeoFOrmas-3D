<h2>Questões</h2>

<a href="<?=base_url('questoes/criar')?>" class="btn btn-success">+ Nova Questão</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Enunciado</th>
            <th>Nível</th>
            <th>Correta</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($lista as $q): ?>
        <tr>
            <td><?=$q->id?></td>
            <td><?=substr($q->enunciado, 0, 50)?>...</td>
            <td><?=$q->nivel?></td>
            <td><?=$q->correta?></td>
            <td>
                <?php if(isset($q->imagem)): ?>
                    <img src="<?=base_url('uploads/questoes/'.$q->imagem)?>" width="70">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?=base_url('questoes/editar/'.$q->id)?>" class="btn btn-primary">Editar</a>
                <a href="<?=base_url('questoes/excluir/'.$q->id)?>" class="btn btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
