
<!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold d-flex align-items-center gap-2 m-0">
            <i class="bi bi-layer-forward"></i> Gerenciar Questões
        </h2>

        <a href="<?=base_url('professor/nova_questao')?>"
           class="btn btn-success shadow-sm px-4 py-2 fw-semibold">
            <i class="bi bi-plus-circle"></i> Nova Questão
        </a>
    </div>

<div class="container mt-4">

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 elegant-table">

                <thead class="table-head-custom">
                    <tr>
                        <th>#</th>
                        <th style="width:24%">Enunciado</th>
                        <th style="width:110px;">Tema</th>
                        <th style="width:100px;">Nível</th>
                        <th>Correta</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Motivo</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($questoes as $q): ?>

                    <tr class="quest-row <?= $q->excluida ? 'row-oculta' : '' ?>">

                        <td class="fw-bold"><?=$q->id?></td>

                        <!-- ENUNCIADO MAIS CURTO -->
                        <td class="fw-semibold text-dark">
                            <?=strlen($q->enunciado) > 60 
                                ? substr($q->enunciado, 0, 60).'...' 
                                : $q->enunciado ?>
                        </td>

                        <!-- TEMA -->
                        <td>
                            <span class="badge badge-tema">
                                <?=html_escape($q->tema_titulo)?>
                            </span>
                        </td>

                        <!-- NÍVEL COMPACTO -->
                        <td>
                            <span class="badge level-badge compact-level"><?=$q->nivel?></span>
                        </td>

                        <!-- CORRETA -->
                        <td>
                            <span class="badge badge-correta"><?=$q->correta?></span>
                        </td>

                        <!-- IMAGEM -->
                        <td>
                            <?php if (!empty($q->imagem)): ?>
                                <img src="<?=base_url('uploads/questoes/'.$q->imagem)?>" class="quest-img">
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>

                        <!-- STATUS -->
                        <td>
                            <?php if ($q->excluida): ?>
                                <span class="badge badge-oculta"><i class="bi bi-eye-slash"></i> Oculta</span>
                            <?php else: ?>
                                <span class="badge badge-ativa"><i class="bi bi-check-circle"></i> Ativa</span>
                            <?php endif; ?>
                        </td>

                        <!-- MOTIVO -->
                        <td style="max-width:130px;">
                            <small class="text-muted fst-italic">
                                <?= $q->excluida ? html_escape($q->motivo_exclusao) : '—' ?>
                            </small>
                        </td>

                        <!-- AÇÕES -->
                        <td class="text-center d-flex gap-2 justify-content-center">

                            <?php if ($q->excluida): ?>
                                <button class="btn btn-sm btn-secondary disabled shadow-sm action-btn"
                                        data-bs-toggle="tooltip"
                                        title="Esta questão está oculta e não pode ser editada.">
                                    <i class="bi bi-lock-fill"></i>
                                </button>
                            <?php else: ?>
                                <a href="<?=base_url('professor/editar_questao/'.$q->id)?>" 
                                class="btn btn-sm btn-primary shadow-sm action-btn"
                                data-bs-toggle="tooltip"
                                title="Editar questão">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!$q->excluida): ?>
                                <a href="<?=base_url('professor/ocultar_questao/'.$q->id)?>" 
                                class="btn btn-sm btn-outline-danger shadow-sm action-btn"
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


<style>

    /* Nível mais compacto */
.compact-level {
    padding: 4px 8px !important;
    font-size: 11px !important;
}

/* Badge de tema mais compacto */
.badge-tema {
    padding: 5px 10px !important;
    font-size: 12px !important;
}

/* Ajuste geral das células */
.elegant-table td {
    padding: 12px 10px !important;
}


/* Cabeçalho */
.table-head-custom {
    background: #eef5ff;
    color: #2c4a7a;
    font-weight: 600;
    font-size: 15px;
    white-space: nowrap;
}

/* Linhas */
.elegant-table tbody tr {
    height: 68px;
}

.elegant-table tbody tr:hover {
    background: #f7faff !important;
}

/* Oculta */
.row-oculta {
    background: #fff4e6 !important;
}

/* Tema */
.badge-tema {
    background: #e6e1ff;
    color: #4a3db3;
    padding: 8px 14px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 13px;
}

/* Nível */
.level-badge {
    background: #cfe8ff;
    color: #0c3c78;
    padding: 8px 14px;
    border-radius: 12px;
    font-weight: 600;
}

/* Correta */
.badge-correta {
    background: #d4f8e3;
    color: #0a7b33;
    padding: 8px 14px;
    border-radius: 12px;
    font-weight: 600;
}

/* Status */
.badge-ativa {
    background: #d7ffd7;
    color: #217a21;
    padding: 8px 14px;
    border-radius: 12px;
    font-weight: 600;
}

.badge-oculta {
    background: #ffe0e0;
    color: #8a1f1f;
    padding: 8px 14px;
    border-radius: 12px;
    font-weight: 600;
}

/* Imagem */
.quest-img {
    width: 70px;
    height: auto;
    border-radius: 6px;
    transition: 0.25s;
}

.quest-img:hover {
    transform: scale(1.12);
    box-shadow: 0 4px 12px rgba(0,0,0,0.18);
}

/* Botões */
.action-btn {
    transition: 0.25s;
}

.action-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.18) !important;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(t => new bootstrap.Tooltip(t));
});
</script>
