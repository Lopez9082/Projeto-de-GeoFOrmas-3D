<h2>Minhas Questões</h2>

<a href="<?= base_url('professor/nova_questao') ?>" class="btn btn-success">+ Nova Questão</a>

<br><br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Enunciado</th>
        <th>Nível</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($questoes as $q): ?>
        <tr>
            <td><?= $q->id ?></td>
            <td><?= substr($q->enunciado, 0, 60) ?>...</td>
            <td><?= $q->nivel ?></td>

            <td>
                <a href="<?= base_url('professor/editar_questao/'.$q->id) ?>" class="btn btn-primary">Editar</a>

                <a href="<?= base_url('professor/excluir_questao/'.$q->id) ?>"
                    class="btn btn-danger"
                    onclick="return confirm('Excluir esta questão?')">
                    Excluir
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
