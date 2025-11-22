<h2>Escolha o Tema</h2>
<div class="row">
<?php foreach ($temas as $t): ?>
  <div class="col-md-4">
    <a class="btn btn-primary btn-block" 
       href="<?= base_url('quizzes/tema/'.$t->id) ?>">
       <?= $t->titulo ?>
    </a>
  </div>
<?php endforeach; ?>
</div>
