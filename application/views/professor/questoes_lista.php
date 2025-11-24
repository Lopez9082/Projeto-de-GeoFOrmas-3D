<h2 class="mb-4 text-primary fw-bold">
    <i class="bi bi-journal-text"></i> Questões
</h2>

<!-- Botão Nova Questão -->
<div class="d-flex justify-content-end mb-3">
    <a href="<?=base_url('professor/nova_questao')?>" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle"></i> Nova Questão
    </a>
</div>

<!-- Tabela -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Enunciado</th>
                    <th>Nível</th>
                    <th>Correta</th>
                    <th>Imagem</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($questoes as $q): ?>
                <tr>
                    <td class="fw-semibold"><?=$q->id?></td>

                    <td><?=substr($q->enunciado, 0, 70)?>...</td>

                    <td>
                        <span class="badge bg-info text-dark"><?=$q->nivel?></span>
                    </td>

                    <td>
                        <span class="badge bg-success"><?=$q->correta?></span>
                    </td>

                    <td>
                        <?php if(!empty($q->imagem)): ?>
                            <img src="<?=base_url('uploads/questoes/'.$q->imagem)?>" 
                                 class="rounded shadow-sm" 
                                 width="70">
                        <?php else: ?>
                            <span class="text-muted">—</span>
                        <?php endif; ?>
                    </td>

                    <td class="text-center">
                        <a href="<?=base_url('professor/editar_questao/'.$q->id)?>" 
                           class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>
<!--
                        <a href="<?=base_url('professor/excluir_questao/'.$q->id)?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Tem certeza que deseja excluir esta questão?')">
                            <i class="bi bi-trash"></i>
                        </a>-->
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<!-- Ícones do Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
