<?php
$sucesso = $this->session->flashdata('sucesso');
$papel_flash = $this->session->flashdata('papel');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/auth/login.css') ?>">
</head>

<body>
  <?php
  if ($this->session->userdata('logado')) {
    if ($this->session->userdata('papel') === 'professor' || $this->session->userdata('papel') === 'licenciado')
      redirect('professor/dashboard');
    else
      redirect('painel');
  }
  ?>

  <div class="split">
  <!-- ══ ESQUERDA — BRANDING ══ -->
  <div class="panel-left">
    <div class="left-content">
      <div class="brand">MATHGAME</div>
      <div class="brand-sub">UNIG · NEAD · GEMATECH</div>
      <div class="hero-img-wrap">
        <img class="hero-img" src="<?= base_url('uploads/Logo_mathgame.png') ?>" alt="Símbolos matemáticos">
      </div>
      <div class="feature-list">
        <div class="feat"><span class="feat-icon">🎲</span><span class="feat-text"><strong>Quizzes por nível</strong> — Fundamental I, II e Médio</span></div>
        <div class="feat"><span class="feat-icon">⚡</span><span class="feat-text"><strong>Sistema de XP</strong> — evolua e desbloqueie recursos</span></div>
        <div class="feat"><span class="feat-icon">🏆</span><span class="feat-text"><strong>Badges e conquistas</strong> — colete ao acertar questões</span></div>
        <div class="feat"><span class="feat-icon">🧪</span><span class="feat-text"><strong>Laboratório</strong> — ferramentas matemáticas interativas</span></div>
      </div>
    </div>
  </div>

  <!-- ══ DIREITA — FORMULÁRIO ══ -->
  <div class="panel-right">
    <div class="form-wrap">

      <!-- ── STEP 1: ESCOLHA DO PERFIL ── -->
      <div id="step-role">
        <div class="step-deco"></div>
        <div class="step-title">QUEM É VOCÊ?</div>
        <div class="step-sub">// selecione seu perfil para continuar</div>

        <div class="role-cards">

          <div class="role-card aluno" id="card-aluno" onclick="selectRole('aluno')">
            <div class="role-check">✔</div>
            <span class="role-emoji">🎮</span>
            <span class="role-name">ALUNO</span>
            <span class="role-desc">Jogue quizzes, acumule XP e evolua no ranking</span>
          </div>

          <div class="role-card professor" id="card-prof" onclick="selectRole('professor')">
            <div class="role-check">✔</div>
            <span class="role-emoji">👨‍🏫</span>
            <span class="role-name">PROFESSOR</span>
            <span class="role-desc">Gerencie questões e acompanhe os alunos</span>
          </div>

        </div>

        <button class="btn-continue" id="btnContinue" onclick="goToForm()">
          CONTINUAR ►
        </button>

        <a href="<?= site_url('/') ?>" class="back-home" style="margin-top:24px">← Página inicial</a>
      </div>

      <!-- ── STEP 2: FORMULÁRIO ── -->
      <div id="step-form">

        <div class="form-header">
          <button class="back-btn" id="backBtn" onclick="goBack()">←</button>
          <div class="form-badge aluno" id="formBadge">🎮 ALUNO</div>
        </div>

        <div class="form-title2 aluno" id="formTitle">ENTRAR</div>
        <div class="form-subtitle2" id="formSub">// acesse sua conta para jogar</div>

        <?php
          $erro = $this->session->flashdata('erro');
          $papel_flash = $this->session->flashdata('papel');
          ?>

          <?php if ($erro && $papel_flash === 'aluno'): ?>
            <div class="msg-erro">⚠ <?= html_escape($erro) ?></div>
          <?php endif; ?>
        
          <?php if ($sucesso): ?>
            <div class="msg-success">
              ✔ <?= html_escape($sucesso) ?>
            </div>
          <?php endif; ?>

        <form method="post" id="loginForm" action="<?= site_url('auth/autenticar') ?>">
          <!-- campo hidden para indicar o papel ao controller -->
          <input type="hidden" name="papel" id="inputPapel" value="aluno">

          <div class="field" id="fieldEmail">
            <label for="email">E-mail</label>
            <div class="field-wrap">
              <span class="field-icon">✉</span>
              <input type="email" id="email" name="email" placeholder="player@email.com" required autocomplete="email">
            </div>
          </div>

          <div class="field" id="fieldSenha">
            <label for="senha">Senha</label>
            <div class="field-wrap">
              <span class="field-icon">🔒</span>
              <input type="password" id="senha" name="senha" placeholder="••••••••" required autocomplete="current-password">
              <button type="button" class="eye-btn" id="eyeBtn" aria-label="Mostrar senha">👁</button>
            </div>
          </div>

          <a class="forgot" href="<?= site_url('recuperacao') ?>" id="forgotLink">Esqueceu a senha?</a>

          <button type="submit" class="btn-submit aluno" id="submitBtn">
            ENTRAR NO JOGO ►
          </button>
        </form>

        <!-- Só exibe "criar conta" para alunos -->
        <div id="registerSection">
          <div class="divider"><span>OU</span></div>
          <a href="<?= site_url('auth/registrar') ?>" class="register-link">
            Não tem conta? <span>Criar conta grátis →</span>
          </a>
        </div>

        <div id="registerSection2">
          <div class="divider"><span>OU</span></div>
          <a href="<?= site_url('professor/registrar') ?>" class="register-link">
            Não tem conta? <span>Criar conta grátis →</span>
          </a>
        </div>

      </div>
      <!-- /step-form -->

    </div>
  </div>

  </div>

  <script>
    let roleSelected = null;

    function selectRole(role) {
      roleSelected = role;

      document.getElementById('card-aluno').classList.toggle('selected', role === 'aluno');
      document.getElementById('card-prof').classList.toggle('selected', role === 'professor');

      const btn = document.getElementById('btnContinue');
      btn.classList.add('active');
      if (role === 'professor') {
        btn.classList.add('prof-active');
      } else {
        btn.classList.remove('prof-active');
      }
    }

    function goToForm() {
      if (!roleSelected) return;

      document.getElementById('step-role').style.display = 'none';
      const form = document.getElementById('step-form');
      form.style.display = 'block';
      form.style.animation = 'slideIn .4s ease';

      const isProf = roleSelected === 'professor';
      const isAluno = roleSelected === 'aluno';

      // campo hidden
      document.getElementById('inputPapel').value = roleSelected;

      // badge
      const badge = document.getElementById('formBadge');
      badge.textContent = isProf ? '👨‍🏫 PROFESSOR' : '🎮 ALUNO';
      badge.className = 'form-badge ' + roleSelected;

      // back btn
      document.getElementById('backBtn').className = 'back-btn' + (isProf ? ' prof' : '');

      // títulos
      const title = document.getElementById('formTitle');
      title.textContent = isProf ? 'ACESSO RESTRITO' : 'BEM-VINDO';
      title.className = 'form-title2 ' + roleSelected;
      document.getElementById('formSub').textContent = isProf ?
        '// painel do professor' :
        '// acesse sua conta para jogar';

      // placeholder email
      document.getElementById('email').placeholder = isProf ? 'professor@unig.edu.br' : 'player@email.com';

      // estilo dos campos
      document.getElementById('fieldEmail').className = 'field' + (isProf ? ' prof-field' : '');
      document.getElementById('fieldSenha').className = 'field' + (isProf ? ' prof-field' : '');

      // botão submit
      const sbtn = document.getElementById('submitBtn');
      sbtn.className = 'btn-submit ' + roleSelected;
      sbtn.textContent = isProf ? 'ENTRAR COMO PROFESSOR ►' : 'ENTRAR NO JOGO ►';

      // action do form: professor usa rota diferente
      document.getElementById('loginForm').action = isProf ?
        '<?= site_url('professor/login') ?>' :
        '<?= site_url('auth/autenticar') ?>';

      // seção de cadastro só para aluno
      document.getElementById('registerSection').style.display = isProf ? 'none' : 'block';
      //seção de cadastro só para professor
      document.getElementById('registerSection2').style.display = isAluno ? 'none' : 'block';
    }

    function goBack() {
      document.getElementById('step-form').style.display = 'none';
      const role = document.getElementById('step-role');
      role.style.display = 'block';
      role.style.animation = 'fadeIn .35s ease';
    }

    // toggle senha
    const eye = document.getElementById('eyeBtn');
    const pwd = document.getElementById('senha');
    eye.addEventListener('click', () => {
      const show = pwd.type === 'password';
      pwd.type = show ? 'text' : 'password';
      eye.textContent = show ? '🙈' : '👁';
    });

    // loading
    document.getElementById('loginForm').addEventListener('submit', function() {
      const btn = document.getElementById('submitBtn');
      btn.classList.add('loading');
      btn.textContent = 'VERIFICANDO...';
    });


    // Se vier flashdata de erro, vai direto pro form com o perfil certo
    <?php
    $papel_flash = $this->session->flashdata('papel');
    if ($this->session->flashdata('erro') && $papel_flash):
    ?>
        const papelFlash = "<?= $papel_flash ?>";
        const erro = "<?= $erro ?>";

        if (erro && papelFlash === 'aluno') {
          selectRole('aluno');
          goToForm();
        }
    <?php endif; ?>

    <?php if ($sucesso && $papel_flash === 'professor'): ?>
<script>
  selectRole('professor');
  goToForm();
</script>
<?php endif; ?>
  </script>

  <?php if ($sucesso && $papel_flash === 'professor'): ?>
<script>
  selectRole('professor');
  goToForm();
</script>
<?php endif; ?>

  <footer class="footer">
  <div class="footer-content">
    <span class="footer-brand">MATHGAME</span>
    <span class="footer-divider">|</span>
    <span>© 2026 Todos os direitos reservados</span>
  </div>
</footer>

</body>

</html>