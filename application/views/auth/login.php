<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — MathGame</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    
.hero-img{
  width: 70%;
  height: auto;

  object-fit: contain;

  filter:
    drop-shadow(0 0 18px rgba(0,245,255,.6))
    drop-shadow(0 0 40px rgba(191,0,255,.4));
}


.hero-img-wrap{
  width: 320px;
  height: 320px;
  border-radius: 50%;

  display:flex;
  align-items:center;
  justify-content:center;

  border:3px solid var(--cyan);

  box-shadow:
    0 0 12px var(--cyan),
    0 0 40px rgba(0,245,255,.6);

  animation: float 4s ease-in-out infinite;
}

:root{
  --bg:#03020a;--bg-card:#0e0c24;--bg-card2:#130f2a;
  --cyan:#00f5ff;--pink:#ff00c8;--green:#39ff14;--purple:#bf00ff;--yellow:#ffe500;
  --glow-c:0 0 8px #00f5ff,0 0 24px #00f5ffaa,0 0 48px #00f5ff33;
  --glow-p:0 0 8px #ff00c8,0 0 24px #ff00c8aa,0 0 48px #ff00c833;
  --glow-g:0 0 8px #39ff14,0 0 20px #39ff14aa;
  --dim:#5a6e96;--ghost:#1e2a44;
  --fd:'Orbitron',monospace;--fm:'Share Tech Mono',monospace;--fb:'Rajdhani',sans-serif;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%}
body{
  font-family:var(--fb);background:var(--bg);color:#e8f4ff;
  display:flex;overflow:hidden;
  background-image:
    radial-gradient(ellipse 70% 50% at 15% 20%,rgba(0,245,255,.06) 0%,transparent 60%),
    radial-gradient(ellipse 60% 50% at 85% 80%,rgba(191,0,255,.07) 0%,transparent 60%),
    repeating-linear-gradient(0deg,transparent,transparent 59px,rgba(0,245,255,.018) 59px,rgba(0,245,255,.018) 60px),
    repeating-linear-gradient(90deg,transparent,transparent 59px,rgba(0,245,255,.018) 59px,rgba(0,245,255,.018) 60px);
}
body::before{content:'';position:fixed;inset:0;pointer-events:none;z-index:9999;
  background:repeating-linear-gradient(to bottom,transparent 0,transparent 3px,rgba(0,0,0,.07) 3px,rgba(0,0,0,.07) 4px)}

/* ══ SPLIT ══════════════════════════════ */
.split{display:flex;width:100%;height:100vh}

/* ══ LEFT PANEL ═════════════════════════ */
.panel-left{
  flex:1;position:relative;overflow:hidden;
  background:linear-gradient(135deg,#07051a 0%,#0d0a28 50%,#07051a 100%);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  padding:48px;border-right:1px solid rgba(0,245,255,.12);
}
.panel-left::before{
  content:'';position:absolute;inset:0;
  background:
    repeating-linear-gradient(0deg,transparent,transparent 59px,rgba(0,245,255,.04) 59px,rgba(0,245,255,.04) 60px),
    repeating-linear-gradient(90deg,transparent,transparent 59px,rgba(0,245,255,.04) 59px,rgba(0,245,255,.04) 60px);
  animation:grid-drift 20s linear infinite;
}
@keyframes grid-drift{0%{transform:translate(0,0)}100%{transform:translate(60px,60px)}}
.panel-left::after{
  content:'';position:absolute;inset:0;pointer-events:none;
  background:
    radial-gradient(ellipse 60% 50% at 30% 30%,rgba(0,245,255,.08) 0%,transparent 65%),
    radial-gradient(ellipse 50% 50% at 70% 70%,rgba(191,0,255,.09) 0%,transparent 65%);
}
.left-content{position:relative;z-index:1;text-align:center;max-width:460px}
.brand{
  font-family:var(--fd);font-size:clamp(2rem,4vw,3rem);font-weight:900;
  color:var(--cyan);text-shadow:var(--glow-c);letter-spacing:.14em;margin-bottom:8px;
  animation:flicker 5s linear infinite;
}
@keyframes flicker{0%,19%,21%,23%,25%,54%,56%,100%{opacity:1}20%,22%,24%,55%{opacity:.55}}
.brand-sub{font-family:var(--fm);font-size:.72rem;color:var(--dim);letter-spacing:.22em;text-transform:uppercase;margin-bottom:44px}

@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-14px)}}
.feature-list{display:flex;flex-direction:column;gap:10px;width:100%}
.feat{
  display:flex;align-items:center;gap:12px;
  background:rgba(0,245,255,.04);border:1px solid rgba(0,245,255,.12);
  border-radius:10px;padding:11px 16px;transition:all .25s;
}
.feat:hover{background:rgba(0,245,255,.08);border-color:rgba(0,245,255,.28);transform:translateX(4px)}
.feat-icon{font-size:1rem;flex-shrink:0}
.feat-text{font-family:var(--fb);font-size:.88rem;color:var(--dim)}
.feat-text strong{color:#e8f4ff}

/* ══ RIGHT PANEL ════════════════════════ */
.panel-right{
  width:min(500px,100%);background:var(--bg-card);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  padding:48px 44px;position:relative;overflow:hidden;
}
.panel-right::before{
  content:'';position:absolute;top:0;left:0;bottom:0;width:1px;
  background:linear-gradient(180deg,transparent,var(--cyan),var(--pink),var(--purple),transparent);
}
.panel-right::after{
  content:'';position:absolute;top:-100px;right:-100px;width:260px;height:260px;
  border-radius:50%;pointer-events:none;
  background:radial-gradient(circle,rgba(191,0,255,.07) 0%,transparent 70%);
}
.form-wrap{width:100%;position:relative;z-index:1}

/* ══ STEP 1 — ROLE SELECTOR ═════════════ */
#step-role{animation:fadeIn .4s ease}
#step-form{display:none;animation:slideIn .4s ease}
@keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
@keyframes slideIn{from{opacity:0;transform:translateX(20px)}to{opacity:1;transform:translateX(0)}}

.step-deco{height:2px;width:56%;margin:0 auto 32px;border-radius:2px;background:linear-gradient(90deg,transparent,var(--cyan),transparent);box-shadow:var(--glow-c)}
.step-title{font-family:var(--fd);font-size:1.15rem;font-weight:900;color:#fff;letter-spacing:.08em;text-align:center;margin-bottom:6px}
.step-sub{font-family:var(--fm);font-size:.67rem;color:var(--dim);letter-spacing:.18em;text-transform:uppercase;text-align:center;margin-bottom:32px}

/* role cards */
.role-cards{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:8px}
.role-card{
  position:relative;cursor:pointer;border-radius:14px;padding:28px 18px 24px;text-align:center;
  border:2px solid rgba(0,245,255,.15);background:rgba(0,245,255,.03);
  transition:all .3s;overflow:hidden;
}
.role-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  border-radius:14px 14px 0 0;transition:opacity .3s;opacity:0;
}
.role-card.aluno::before{background:linear-gradient(90deg,var(--cyan),var(--green))}
.role-card.professor::before{background:linear-gradient(90deg,var(--pink),var(--purple))}

.role-card:hover,.role-card.selected{transform:translateY(-4px)}
.role-card.aluno:hover,.role-card.aluno.selected{
  border-color:var(--cyan);background:rgba(0,245,255,.08);
  box-shadow:0 0 20px rgba(0,245,255,.15),0 8px 24px rgba(0,0,0,.3);
}
.role-card.aluno:hover::before,.role-card.aluno.selected::before{opacity:1}
.role-card.professor:hover,.role-card.professor.selected{
  border-color:var(--pink);background:rgba(255,0,200,.07);
  box-shadow:0 0 20px rgba(255,0,200,.15),0 8px 24px rgba(0,0,0,.3);
}
.role-card.professor:hover::before,.role-card.professor.selected::before{opacity:1}

.role-emoji{font-size:2.4rem;display:block;margin-bottom:14px}
.role-name{
  font-family:var(--fd);font-size:.78rem;font-weight:700;letter-spacing:.1em;
  display:block;margin-bottom:8px;
}
.role-card.aluno .role-name{color:var(--cyan)}
.role-card.professor .role-name{color:var(--pink)}
.role-desc{font-family:var(--fm);font-size:.65rem;color:var(--dim);letter-spacing:.04em;line-height:1.5}

/* selected check */
.role-check{
  position:absolute;top:10px;right:10px;
  width:20px;height:20px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  font-size:.65rem;font-weight:700;opacity:0;transition:opacity .25s;
}
.role-card.aluno .role-check{background:var(--cyan);color:var(--bg)}
.role-card.professor .role-check{background:var(--pink);color:#fff}
.role-card.selected .role-check{opacity:1}

.btn-continue{
  width:100%;padding:14px;border:none;border-radius:10px;cursor:pointer;
  font-family:var(--fd);font-size:.72rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
  background:linear-gradient(135deg,var(--cyan),var(--purple));color:var(--bg);
  box-shadow:var(--glow-c);transition:all .3s;margin-top:20px;
  opacity:.45;pointer-events:none;
}
.btn-continue.active{opacity:1;pointer-events:all}
.btn-continue.active:hover{box-shadow:0 0 20px var(--cyan),0 0 50px rgba(0,245,255,.4);transform:translateY(-2px)}
.btn-continue.prof-active{background:linear-gradient(135deg,var(--pink),var(--purple));box-shadow:var(--glow-p)}
.btn-continue.prof-active:hover{box-shadow:0 0 20px var(--pink),0 0 50px rgba(255,0,200,.4)}

/* ══ STEP 2 — FORM ══════════════════════ */
.form-header{display:flex;align-items:center;gap:10px;margin-bottom:28px}
.back-btn{
  width:34px;height:34px;background:rgba(0,245,255,.06);
  border:1px solid rgba(0,245,255,.2);border-radius:8px;
  display:flex;align-items:center;justify-content:center;cursor:pointer;
  font-size:.85rem;transition:all .2s;flex-shrink:0;color:#e8f4ff;
}
.back-btn:hover{background:rgba(0,245,255,.12);border-color:rgba(0,245,255,.4)}
.back-btn.prof{border-color:rgba(255,0,200,.2);background:rgba(255,0,200,.05)}
.back-btn.prof:hover{background:rgba(255,0,200,.1);border-color:rgba(255,0,200,.4)}

.form-badge{
  flex:1;display:flex;align-items:center;gap:8px;
  padding:8px 14px;border-radius:8px;
  font-family:var(--fd);font-size:.65rem;font-weight:700;letter-spacing:.1em;
}
.form-badge.aluno{background:rgba(0,245,255,.08);border:1px solid rgba(0,245,255,.3);color:var(--cyan)}
.form-badge.professor{background:rgba(255,0,200,.08);border:1px solid rgba(255,0,200,.3);color:var(--pink)}

.form-title2{font-family:var(--fd);font-size:1.15rem;font-weight:900;letter-spacing:.08em;text-align:center;margin-bottom:5px}
.form-title2.aluno{color:var(--cyan);text-shadow:var(--glow-c)}
.form-title2.professor{color:var(--pink);text-shadow:var(--glow-p)}
.form-subtitle2{font-family:var(--fm);font-size:.67rem;color:var(--dim);letter-spacing:.18em;text-transform:uppercase;text-align:center;margin-bottom:26px}

/* flash */
.msg-erro{
  background:rgba(255,0,200,.08);border:1px solid rgba(255,0,200,.4);
  border-radius:8px;padding:11px 14px;color:var(--pink);
  font-family:var(--fm);font-size:.8rem;margin-bottom:16px;
  display:flex;align-items:center;gap:8px;animation:shake .35s ease;
}
@keyframes shake{0%,100%{transform:translateX(0)}25%{transform:translateX(-5px)}75%{transform:translateX(5px)}}
.msg-success{background:rgba(57,255,20,.08);border:1px solid rgba(57,255,20,.35);border-radius:8px;padding:11px 14px;color:var(--green);font-family:var(--fm);font-size:.8rem;margin-bottom:16px}

/* fields */
.field{margin-bottom:16px}
.field label{display:block;font-family:var(--fm);font-size:.68rem;color:var(--dim);letter-spacing:.1em;text-transform:uppercase;margin-bottom:7px}
.field-wrap{position:relative}
.field-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:.88rem;color:var(--dim);pointer-events:none;transition:color .25s}
.field input{
  width:100%;background:rgba(0,245,255,.04);border:1px solid rgba(0,245,255,.2);
  border-radius:10px;padding:12px 42px 12px 40px;
  color:#e8f4ff;font-family:var(--fb);font-size:.98rem;outline:none;transition:all .25s;
}
.field input::placeholder{color:var(--ghost);font-family:var(--fm);font-size:.8rem}
.field input:focus{border-color:var(--cyan);box-shadow:0 0 0 3px rgba(0,245,255,.1),var(--glow-c);background:rgba(0,245,255,.07)}
.field-wrap:focus-within .field-icon{color:var(--cyan)}
/* professor field style */
.prof-field input:focus{border-color:var(--pink);box-shadow:0 0 0 3px rgba(255,0,200,.1),var(--glow-p);background:rgba(255,0,200,.05)}
.prof-field .field-wrap:focus-within .field-icon{color:var(--pink)}

.eye-btn{position:absolute;right:13px;top:50%;transform:translateY(-50%);background:transparent;border:none;cursor:pointer;color:var(--dim);font-size:.88rem;transition:color .2s;padding:4px}
.eye-btn:hover{color:var(--cyan)}
.prof-field .eye-btn:hover{color:var(--pink)}

.forgot{display:block;text-align:right;font-family:var(--fm);font-size:.68rem;color:var(--dim);letter-spacing:.05em;margin-top:-6px;margin-bottom:20px;transition:color .2s;text-decoration:none}
.forgot:hover{color:var(--cyan)}

/* submit */
.btn-submit{
  width:100%;padding:14px;border:none;border-radius:10px;cursor:pointer;
  font-family:var(--fd);font-size:.72rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
  transition:all .3s;position:relative;overflow:hidden;
}
.btn-submit.aluno{background:linear-gradient(135deg,var(--cyan),var(--purple));color:var(--bg);box-shadow:var(--glow-c)}
.btn-submit.aluno:hover{box-shadow:0 0 20px var(--cyan),0 0 50px rgba(0,245,255,.4);transform:translateY(-2px)}
.btn-submit.professor{background:linear-gradient(135deg,var(--pink),var(--purple));color:#fff;box-shadow:var(--glow-p)}
.btn-submit.professor:hover{box-shadow:0 0 20px var(--pink),0 0 50px rgba(255,0,200,.4);transform:translateY(-2px)}
.btn-submit:active{transform:translateY(0)}
.btn-submit.loading{pointer-events:none;opacity:.7}

/* register */
.divider{display:flex;align-items:center;gap:12px;margin:18px 0}
.divider::before,.divider::after{content:'';flex:1;height:1px}
.divider::before{background:linear-gradient(90deg,transparent,rgba(0,245,255,.18))}
.divider::after{background:linear-gradient(270deg,transparent,rgba(0,245,255,.18))}
.divider span{font-family:var(--fm);font-size:.62rem;color:var(--ghost);letter-spacing:.12em}

.register-link{
  display:flex;align-items:center;justify-content:center;gap:8px;
  padding:11px;border-radius:10px;border:1px solid rgba(0,245,255,.15);
  background:rgba(0,245,255,.03);font-family:var(--fm);font-size:.72rem;color:var(--dim);
  transition:all .25s;text-decoration:none;
}
.register-link:hover{border-color:rgba(0,245,255,.35);background:rgba(0,245,255,.07);color:var(--cyan)}
.register-link span{color:var(--cyan);font-weight:700}

.back-home{display:flex;align-items:center;justify-content:center;gap:6px;font-family:var(--fm);font-size:.65rem;color:var(--ghost);letter-spacing:.08em;text-transform:uppercase;margin-top:18px;transition:color .2s;text-decoration:none}
.back-home:hover{color:var(--dim)}

/* ══ MOBILE ══════════════════════════════ */
@media(max-width:820px){
  html,body{overflow:auto}
  .split{flex-direction:column;height:auto;min-height:100vh}
  .panel-left{padding:32px 24px 28px;flex:none}
  .feature-list{display:none}
  .brand-sub{margin-bottom:28px}
  .panel-right{width:100%;padding:36px 22px 44px}
  .panel-right::before{display:none}
}
@media(max-width:400px){
  .panel-right{padding:28px 16px 38px}
  .role-cards{grid-template-columns:1fr}
}
  </style>
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

        <?php if ($this->session->flashdata('erro')): ?>
          <div class="msg-erro">⚠ <?= html_escape($this->session->flashdata('erro')) ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
          <div class="msg-success">✔ <?= html_escape($this->session->flashdata('success')) ?></div>
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
          <a href="<?= site_url('registrar') ?>" class="register-link">
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
    title.textContent  = isProf ? 'ACESSO RESTRITO' : 'BEM-VINDO';
    title.className    = 'form-title2 ' + roleSelected;
    document.getElementById('formSub').textContent = isProf
      ? '// painel do professor'
      : '// acesse sua conta para jogar';

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
    document.getElementById('loginForm').action = isProf
      ? '<?= site_url('professor/login') ?>'
      : '<?= site_url('auth/autenticar') ?>';

    // seção de cadastro só para aluno
    document.getElementById('registerSection').style.display = isProf ? 'none' : 'block';
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
    selectRole('<?= $papel_flash ?>');
    goToForm();
  <?php endif; ?>
</script>

</body>
</html>
