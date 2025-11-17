<h2>Questão (<?=ucfirst($nivel)?>) — Tema: <?=html_escape($tema)?></h2>
<p><?= nl2br(html_escape($questao->enunciado)) ?></p>

<form id="formResposta">
  <?php $opcoes = ['A'=>'alternativa_a','B'=>'alternativa_b','C'=>'alternativa_c','D'=>'alternativa_d','E'=>'alternativa_e']; ?>
  <?php foreach($opcoes as $letra=>$campo): if(!empty($questao->$campo)): ?>
    <div>
      <label>
        <input type="radio" name="escolhida" value="<?=$letra?>"> <?=$letra?>) <?=html_escape($questao->$campo)?>
      </label>
    </div>
  <?php endif; endforeach; ?>
  <input type="hidden" name="questao_id" value="<?=$questao->id?>">
  <button type="submit">Enviar</button>
</form>

<div id="feedback" style="display:none">
  <h3 id="resultado"></h3>
  <p id="texto_feedback"></p>
  <a id="proxima" href="<?=site_url("quiz/iniciar/{$tema}/{$nivel}?offset=" . ($offset+1))?>">Próxima</a>
</div>

<script>
document.getElementById('formResposta').addEventListener('submit', function(e){
  e.preventDefault();
  var fd = new FormData(this);
  fetch('<?=site_url('quiz/enviar_resposta')?>', { method:'POST', body: fd })
    .then(r=>r.json())
    .then(data=>{
      document.getElementById('feedback').style.display='block';
      document.getElementById('resultado').textContent = data.correta ? 'Acertou!' : 'Errou';
      document.getElementById('texto_feedback').textContent = data.feedback;
    });
});
</script>
