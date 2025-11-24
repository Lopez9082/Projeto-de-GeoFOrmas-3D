<h2 class="text-center mb-4">Escolha o Tema</h2>

<div class="row justify-content-center">
<?php foreach ($temas as $t): ?>
  <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">

    <a href="<?= base_url('quizzes/tema/'.$t->id) ?>" 
       class="text-decoration-none">

      <div class="card shadow-sm h-100 theme-card" 
           style="border-radius: 14px; transition: .3s ease;">
        
        <div class="card-body d-flex flex-column justify-content-center text-center"
             style="padding: 25px;">

          <h5 class="card-title mb-0"
              style="font-size: 1.1rem; font-weight: 600; color: #333;">
              <?= $t->titulo ?>
          </h5>

        </div>

      </div>

    </a>

  </div>
<?php endforeach; ?>
</div>

<style>
/* Gradiente leve + animação elegante */
.theme-card {
    background: linear-gradient(135deg, #ffffff, #f0f4ff);
}

.theme-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.15) !important;
    background: linear-gradient(135deg, #e9efff, #ffffff);
}
</style>
