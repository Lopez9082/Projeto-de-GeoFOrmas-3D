<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/professor/questoes_lista.css') ?>">
</head>

<div class="page-header">
    <div>
        <h2>GERENCIAR QUESTÕES</h2>
        <p class="page-subtitle">// BANCO DE QUESTÕES DO SISTEMA</p>
    </div>

    <a href="<?= base_url('professor/nova_questao') ?>" class="btn btn-primary">
        + NOVA QUESTÃO
    </a>
</div>

<?php if ($this->session->flashdata('sucesso')): ?>
    <div class="msg-success">
        ✔ <?= html_escape($this->session->flashdata('sucesso')) ?>
    </div>
<?php endif; ?>

<div class="card questoes-card">

    <div class="table-responsive">

        <table class="questoes-table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Enunciado</th>
                    <th>Tema</th>
                    <th>Nível</th>
                    <th>Correta</th>
                    <th>Imagem</th>
                    <th>Status</th>
                    <th>Motivo</th>
                    <th class="acoes-header">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($questoes as $q): ?>

                    <tr class="<?= $q->excluida ? 'questao-oculta' : '' ?>">

                        <td class="questao-id">
                            <?= $q->id ?>
                        </td>

                        <td class="questao-enunciado">
                            <?= html_escape(mb_strimwidth($q->enunciado, 0, 70, '…')) ?>
                        </td>

                        <td>
                            <span class="badge b-purple">
                                <?= html_escape($q->tema_titulo) ?>
                            </span>
                        </td>

                        <td>
                            <span class="badge b-cyan badge-small">
                                <?= html_escape($q->nivel) ?>
                            </span>
                        </td>

                        <td>
                            <span class="badge b-green">
                                <?= html_escape($q->correta) ?>
                            </span>
                        </td>

                        <td>

                            <?php if (!empty($q->imagem)): ?>

                                <img
                                    src="<?= base_url('uploads/questoes/'.$q->imagem) ?>"
                                    alt="Questão"
                                    class="questao-imagem">

                            <?php else: ?>

                                <span class="sem-imagem">—</span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?php if ($q->excluida): ?>

                                <span class="badge b-pink">
                                    👁 Oculta
                                </span>

                            <?php else: ?>

                                <span class="badge b-green">
                                    ✔ Ativa
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="questao-motivo">

                            <small>
                                <?= $q->excluida ? html_escape($q->motivo_exclusao) : '—' ?>
                            </small>

                        </td>

                        <td>

                            <div class="acoes">

                                <?php if (!$q->excluida): ?>

                                    <a href="<?= base_url('professor/editar_questao/'.$q->id) ?>"
                                       class="btn btn-secondary btn-sm">
                                        ✏ EDITAR
                                    </a>

                                    <a href="<?= base_url('professor/ocultar_questao/'.$q->id) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Ocultar esta questão?')">
                                        👁 OCULTAR
                                    </a>

                                <?php else: ?>

                                    <span class="badge b-pink">
                                        🔒 BLOQUEADA
                                    </span>

                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>