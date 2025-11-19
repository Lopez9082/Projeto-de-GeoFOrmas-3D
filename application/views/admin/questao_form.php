<div style="padding:20px">
  <h2><?= ($acao==='novo') ? 'Nova Questão' : 'Editar Questão' ?></h2>
  <form method="post" action="">
    <label>Tema</label><br>
    <select name="tema_id" required>
      <?php foreach($temas as $t): $sel = (isset($questao) && $questao->tema_id==$t->id)?'selected':''; ?>
        <option value="<?=$t->id?>" <?=$sel?>><?=html_escape($t->titulo)?></option>
      <?php endforeach; ?>
    </select><br><br>

    <label>Nível</label><br>
    <select name="nivel">
      <?php $nivels=['facil'=>'Fácil','medio'=>'Médio','dificil'=>'Difícil']; foreach($nivels as $k=>$v): $sel=(isset($questao) && $questao->nivel==$k)?'selected':'';?>
        <option value="<?=$k?>" <?=$sel?>><?=$v?></option>
      <?php endforeach; ?>
    </select><br><br>

    <label>Enunciado</label><br>
    <textarea name="enunciado" rows="6" style="width:100%"><?=isset($questao)?html_escape($questao->enunciado):''?></textarea><br><br>

    <label>Alternativa A</label><input name="alternativa_a" value="<?=isset($questao)?html_escape($questao->alternativa_a):''?>"><br>
    <label>Alternativa B</label><input name="alternativa_b" value="<?=isset($questao)?html_escape($questao->alternativa_b):''?>"><br>
    <label>Alternativa C</label><input name="alternativa_c" value="<?=isset($questao)?html_escape($questao->alternativa_c):''?>"><br>
    <label>Alternativa D</label><input name="alternativa_d" value="<?=isset($questao)?html_escape($questao->alternativa_d):''?>"><br>
    <label>Alternativa E</label><input name="alternativa_e" value="<?=isset($questao)?html_escape($questao->alternativa_e):''?>"><br><br>

    <label>Alternativa correta (A/B/C/D/E)</label><input name="correta" value="<?=isset($questao)?html_escape($questao->correta):''?>"><br><br>

    <label>Feedback pedagógico</label><br>
    <textarea name="feedback_pedagogico" rows="4" style="width:100%"><?=isset($questao)?html_escape($questao->feedback_pedagogico):''?></textarea><br><br>

    <button type="submit"><?= ($acao==='novo') ? 'Cadastrar' : 'Atualizar' ?></button>
    <a href="<?=site_url('admin/lista_questoes')?>">Cancelar</a>
  </form>
</div>
