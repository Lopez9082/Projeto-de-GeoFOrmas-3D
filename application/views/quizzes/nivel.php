<div class="card">
  <h2>Escolha o Nível para: <?= html_escape($tema->titulo) ?></h2>

  <ul>
    <li>
      <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="facil">
        <button type="submit">Fácil</button>
      </form>
    </li>
    <li>
      <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="medio">
        <button type="submit">Médio</button>
      </form>
    </li>
    <li>
      <form action="<?= site_url('quizzes/iniciar') ?>" method="post">
        <input type="hidden" name="tema" value="<?= $tema->id ?>">
        <input type="hidden" name="nivel" value="dificil">
        <button type="submit">Difícil</button>
      </form>
    </li>
  </ul>
</div>
