<!-- Informações do usuário -->
<div class="user-box">
  <div class="avatar-row">
    <?php $initials = strtoupper(substr($nome, 0, 1)); ?>
    <div class="avatar"><?= $initials ?></div>
    <div style="flex:1">
      <strong><?= html_escape($nome) ?></strong><br>
      <small>Pontos: <?= $progresso ? (int)$progresso->xp_total : 0 ?></small>
    </div>
  </div>
</div>

<!-- STATUS CARDS -->
<div class="top-status-grid">
  <div class="card points">
    <h3>Seus Pontos Atuais</h3>
    <div class="value"><?= $progresso ? (int)$progresso->xp_total : 0 ?></div>
  </div>

 

  <div class="card lab">
    <h3>Recursos Desbloqueados</h3>
    <div class="value">Nível 1</div>
  </div>
</div>


