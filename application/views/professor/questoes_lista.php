<h2>Minhas Questões</h2>

<a href="<?= base_url('professor/nova_questao') ?>" class="btn btn-success">+ Nova Questão</a>

<br><br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Enunciado</th>
        <th>Nível</th>
        <th>Status</th>
        <th>Motivo (se ocultada)</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($questoes as $q): ?>
        <tr style="<?= $q->excluida ? 'background:#ffe5e5;' : '' ?>">
            
            <td><?= $q->id ?></td>
            <td><?= substr($q->enunciado, 0, 60) ?>...</td>
            <td><?= $q->nivel ?></td>

            <td>
                <?php if ($q->excluida): ?>
                    <span style="color:red;font-weight:bold;">OCULTADA</span>
                <?php else: ?>
                    <span style="color:green;font-weight:bold;">ATIVA</span>
                <?php endif; ?>
            </td>

            <td>
                <?php if ($q->excluida): ?>
                    <?= nl2br($q->motivo_exclusao) ?>
                <?php else: ?>
                    —
                <?php endif; ?>
            </td>

            <td>
                <a href="<?= base_url('professor/editar_questao/'.$q->id) ?>" class="btn btn-primary">Editar</a>

                <?php if (!$q->excluida): ?>

                    <a href="<?= base_url('professor/ocultar_questao/'.$q->id) ?>"
                        class="btn btn-warning">
                        Ocultar
                    </a>

                <?php else: ?>

                    <a href="<?= base_url('professor/reativar_questao/'.$q->id) ?>"
                        class="btn btn-success">
                        Reativar
                    </a>

                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
