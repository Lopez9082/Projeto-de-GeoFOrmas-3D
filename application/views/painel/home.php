<h1>Bem-vindo, <?= html_escape($nome) ?></h1>
<p>Produto do Projeto de Iniciação Científica UNIG EAD/Semipresencial, Edital 2024.2 — "CONSTRUÇÃO DE APLICATIVOS EDUCACIONAIS PARA O ENSINO DE MATEMÁTICA".</p>

<section>
  <h3>Temas</h3>
  <ul>
    <li><a href="<?=site_url('quiz/iniciar/geometria/facil')?>">Geometria</a></li>
    <li><a href="<?=site_url('quiz/iniciar/algebra/facil')?>">Álgebra</a></li>
    <li><a href="<?=site_url('quiz/iniciar/estatistica/facil')?>">Estatística</a></li>
  </ul>
</section>

<section>
  <h3>Laboratório virtual</h3>
  <p>Recursos do laboratório (visual) serão atualizados conforme seus pontos.</p>
  <!-- Aqui você pode carregar um SVG/Canvas que mude conforme progresso (recursos_json) -->
</section>
