<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold m-0">
            <i class="bi bi-layer-forward"></i> Gerenciar Questões
        </h2>

        <a href="<?=base_url('professor/nova_questao')?>"
           class="btn btn-success shadow-sm px-4 py-2">
            <i class="bi bi-plus-circle"></i> Nova Questão
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-light border-0">
                    <tr>
                        <th>#</th>
                        <th style="width:32%">Enunciado</th>
                        <th>Nível</th>
                        <th>Correta</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Motivo</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($questoes as $q): ?>
                    <tr class="<?= $q->excluida ? 'table-warning' : '' ?>">

                        <td class="fw-bold"><?=$q->id?></td>

                        <td>
                            <div class="text-dark fw-semibold">
                                <?=strlen($q->enunciado) > 80 
                                    ? substr($q->enunciado,0,80).'...' 
                                    : $q->enunciado ?>
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-info text-dark px-3 py-2">
                                <?=$q->nivel?>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-success px-3 py-2"><?=$q->correta?></span>
                        </td>

                        <td>
                            <?php if(!empty($q->imagem)): ?>
                                <img src="<?=base_url('uploads/questoes/'.$q->imagem)?>" 
                                     class="rounded shadow-sm border"
                                     style="width: 60px; height: auto;">
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>

                        <!-- STATUS -->
                        <td>
                            <?php if ($q->excluida): ?>
                                <span class="badge bg-danger px-3 py-2">
                                    <i class="bi bi-eye-slash"></i> Oculta
                                </span>
                            <?php else: ?>
                                <span class="badge bg-success px-3 py-2">
                                    <i class="bi bi-check-circle"></i> Ativa
                                </span>
                            <?php endif; ?>
                        </td>

                        <!-- MOTIVO -->
                        <td style="max-width:150px;">
                            <small class="text-muted fst-italic">
                                <?= $q->excluida 
                                    ? html_escape($q->motivo_exclusao) 
                                    : '—' ?>
                            </small>
                        </td>

                        <!-- AÇÕES -->
                        <td class="text-center">

                            <!-- EDITAR (bloqueado se excluída) -->
                            <?php if ($q->excluida): ?>
                                <button class="btn btn-sm btn-secondary disabled shadow-sm"
                                        data-bs-toggle="tooltip"
                                        title="Esta questão está oculta e não pode ser editada.">
                                    <i class="bi bi-lock-fill"></i>
                                </button>
                            <?php else: ?>
                                <a href="<?=base_url('professor/editar_questao/'.$q->id)?>" 
                                   class="btn btn-sm btn-primary me-1 shadow-sm"
                                   data-bs-toggle="tooltip"
                                   title="Editar questão">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            <?php endif; ?>

                            <!-- OCULTAR (somente se NÃO estiver excluída) -->
                            <?php if (!$q->excluida): ?>
                                <a href="<?=base_url('professor/ocultar_questao/'.$q->id)?>" 
                                   class="btn btn-sm btn-outline-danger shadow-sm"
                                   onclick="return confirm('Tem certeza que deseja ocultar esta questão?')"
                                   data-bs-toggle="tooltip"
                                   title="Ocultar questão">
                                    <i class="bi bi-eye-slash"></i>
                                </a>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<script>
document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(t => new bootstrap.Tooltip(t));
});
</script>
