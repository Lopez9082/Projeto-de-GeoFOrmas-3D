<h2 class="text-center mb-4">Escolha o Nível</h2>

<p class="text-center text-muted mb-4" style="font-size: 1.1rem;">
  Tema: <strong><?= html_escape($tema->titulo) ?></strong>
</p>

<div class="levels-wrapper">

    <!-- Médio -->
    <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="Ensino médio">

        <button type="submit" class="level-btn">
            <div class="card level-card">
                <div class="card-body text-center">
                    <h5>Ensino Médio</h5>
                </div>
            </div>
        </button>
    </form>

    <!-- Fundamental I -->
    <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="Ensino fundamental I">

        <button type="submit" class="level-btn">
            <div class="card level-card">
                <div class="card-body text-center">
                    <h5>Ensino Fundamental I</h5>
                </div>
            </div>
        </button>
    </form>

    <!-- Fundamental II -->
    <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="Ensino fundamental II">

        <button type="submit" class="level-btn">
            <div class="card level-card">
                <div class="card-body text-center">
                    <h5>Ensino Fundamental II</h5>
                </div>
            </div>
        </button>
    </form>

</div>

<style>
/* Layout horizontal bonito */
.levels-wrapper {
    display: flex;
    flex-wrap: wrap; /* permite responsividade */
    justify-content: center;
    gap: 20px;
}

/* Botão estilizado */
.level-btn {
    border: none;
    background: transparent;
    padding: 0;
    width: 220px; /* TAMANHO CONTROLADO */
}

/* Card bonito igual ao de temas */
.level-card {
    border-radius: 14px;
    background: linear-gradient(135deg, #ffffff, #f0f4ff);
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: .3s ease;
}

.level-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.16);
    background: linear-gradient(135deg, #e9efff, #ffffff);
}

/* Título */
.level-card h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
    padding: 20px;
}
</style>
