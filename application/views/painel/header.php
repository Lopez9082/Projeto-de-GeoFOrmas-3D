<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Painel — Matemática Interativa</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body>
  <div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="logo">
        <img src="<?= base_url('assets/images/logo_unig.png') ?>" alt="Logo">
      </div>

      <div class="user-box">
        <div class="avatar-row">
          <?php
          // avatar: se tiver foto no DB você pode trocar o src; por enquanto usamos iniciais
          $initials = strtoupper(substr($nome, 0, 1));
          ?>
          <div class="avatar"><?= $initials ?></div>
          <div style="flex:1">
            <strong><?= html_escape($nome) ?></strong>
            <small>Pontos: <?= $progresso ? (int)$progresso->pontuacao : 0 ?></small>
          </div>
        </div>

        <div style="margin-top:12px">
          <div style="font-size:0.85rem;color:#cbd5e1">Progresso</div>
          <div class="xp-bar"><i id="xpFill" style="width:0%"></i></div>
        </div>
      </div>

      <nav class="menu">
        <?php $current_url = current_url(); ?>

        <a href="<?= site_url('painel') ?>"
          class="<?= strpos($current_url, site_url('painel')) !== false && strpos($current_url, site_url('painel/historico')) === false ? 'active' : '' ?>">
          Início
        </a>

        <a href="<?= site_url('quiz/iniciar/geometria/facil') ?>"
          class="<?= strpos($current_url, site_url('quiz')) !== false ? 'active' : '' ?>">
          Quizzes
        </a>

        <a href="<?= site_url('painel/historico') ?>"
          class="<?= strpos($current_url, site_url('painel/historico')) !== false ? 'active' : '' ?>">
          Histórico
        </a>

        <?php if ($this->session->userdata('papel') == 'professor' || $this->session->userdata('papel') == 'licenciado'): ?>
          <a href="<?= site_url('admin/lista_questoes') ?>" class="<?= strpos($current_url, site_url('admin')) !== false ? 'active' : '' ?>">
            Gerenciar Questões
          </a>
        <?php endif; ?>

        <a href="<?= site_url('auth/logout') ?>">Sair</a>
      </nav>
    </aside>

    <!-- MAIN -->
    <main class="content">
      <div class="center-wrap">
        <header class="page-header">
          <h1>🚀 Painel de Matemática Interativa</h1>
          <p>👋 Bem-vindo, <?= html_escape($nome) ?>! Comece um quiz ou confira seu progresso abaixo.</p>
        </header>

        <!-- STATUS CARDS (empilhados centralizados, conforme seu print) -->
        <div class="top-status-grid">
          <div class="card points">
            <h3>Seus Pontos Atuais</h3>
            <div class="value"><?= $progresso ? (int)$progresso->pontuacao : 0 ?></div>
          </div>

          <a href="<?= site_url('quiz/iniciar/geometria/facil') ?>" class="card quiz" style="text-decoration:none; color:inherit;">
            <h3>Próximo Quiz</h3>
            <div class="value">Geometria Fácil →</div>
            <p style="margin-top:8px; color:#2563eb; font-weight:600;">Clique para continuar o desafio!</p>
          </a>

          <div class="card lab">
            <h3>Recursos Desbloqueados</h3>
            <div class="value">Nível 1</div>
            <p style="margin-top:8px; color:#9a3412;">Seu progresso no laboratório.</p>
          </div>
        </div>
        <div class="card">
          <h3>🏅 Suas Conquistas</h3>

          <div class="badge-row">
            <?php foreach ($badges as $b): ?>
              <div class="badge">
                <?= ucfirst($b->slug) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- THEMES -->
        <div class="card themes-card">
          <h3>📚 Explore os Temas</h3>
          <ul class="themes-list">
            <li><a href="<?= site_url('quiz/iniciar/geometria/facil') ?>">📐 Geometria</a></li>
            <li><a href="<?= site_url('quiz/iniciar/algebra/facil') ?>">✖️ Álgebra</a></li>
            <li><a href="<?= site_url('quiz/iniciar/estatistica/facil') ?>">📈 Estatística</a></li>
          </ul>
        </div>
        <div class="card">
          <h3>🎯 Missão de Hoje</h3>
          <p><?= $missao->descricao ?></p>

          <div class="xp-bar" style="margin-top:10px">
            <i style="width: <?= ($missao->progresso / $missao->meta) * 100 ?>%"></i>
          </div>

          <small>
            Progresso: <?= $missao->progresso ?>/<?= $missao->meta ?> — Recompensa: <?= $missao->recompensa ?> XP
          </small>
        </div>
        <!-- LAB -->
        <div class="lab-section">
          <div class="lab-info">
            <h3>🧪 Laboratório Virtual</h3>
            <p style="margin:6px 0 12px; color:#0f172a99;">Seus pontos atualizam e desbloqueiam recursos visuais exclusivos. Veja o que você pode construir!</p>
            <a href="<?= site_url('painel/laboratorio') ?>" class="cta-button">Ver Laboratório</a>
          </div>
          <div style="font-size:44px; opacity:0.9;">🔬</div>
        </div>

        <footer class="footer">
          Produto do Projeto de Iniciação Científica UNIG EAD/Semipresencial, Edital 2024.2 — "CONSTRUÇÃO DE APLICATIVOS EDUCACIONAIS PARA O ENSINO DE MATEMÁTICA".
        </footer>
      </div>

      <!-- MASCOTE (posicionado sobre a coluna central, à direita) -->
      <div class="mascote-wrapper" aria-hidden="true">
        <!-- Usar o arquivo em assets/img/mascote.png -->
        <img src="<?= base_url('assets/img/mascote.png') ?>"
          onerror="this.onerror=null; this.src='/mnt/data/A_2D_digital_illustration_of_an_interactive_math_d.png';"
          alt="Mascote Matemático">
        <div class="mascote-bubble" id="mascoteBubble">Pronto para aprender?</div>
      </div>
    </main>

  </div>

  <!-- scripts: animação de XP e trocar frases do mascote -->
  <script>
    (function() {
      // --- calcula valores de XP a partir de PHP (se tiver)
      var pontos = <?= $progresso ? (int)$progresso->pontuacao : 0 ?>;
      // exemplo simples: xp total = pontos * 2; nivel = floor(xp/100); porcent = xp%100
      var xp = pontos * 2;
      var level = Math.floor(xp / 100);
      var xpBar = xp % 100;
      document.getElementById('xpFill').style.width = xpBar + '%';

      // trocar mensagens da mascote
      var frases = [
        "Pronto para aprender?",
        "Ganhe pontos com quizzes!",
        "Complete missões e desbloqueie badges!",
        "Boa sorte, <?= addslashes($nome) ?>!"
      ];
      var idx = 0;
      var bubble = document.getElementById('mascoteBubble');
      setInterval(function() {
        idx = (idx + 1) % frases.length;
        bubble.textContent = frases[idx];
      }, 4200);
    })();
  </script>
</body>

</html>