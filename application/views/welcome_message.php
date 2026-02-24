<?php
// application/views/welcome_message.php
// Landing page pública — MathGame / UNIG
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MathGame: Aprenda matemática de forma divertida com quizzes interativos, XP e rankings.">
  <title>MathGame — Aprenda Matemática Jogando</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
/* ══════════════════════════════════════════════
   VARIÁVEIS & RESET
══════════════════════════════════════════════ */
:root{
  --bg-void:#03020a;--bg-deep:#07051a;--bg-card:#120f2e;--bg-card2:#160d30;
  --neon-cyan:#00f5ff;--neon-pink:#ff00c8;--neon-green:#39ff14;
  --neon-yellow:#ffe500;--neon-purple:#bf00ff;
  --glow-cyan:0 0 8px #00f5ff,0 0 20px #00f5ffaa,0 0 40px #00f5ff44;
  --glow-pink:0 0 8px #ff00c8,0 0 20px #ff00c8aa,0 0 40px #ff00c844;
  --glow-green:0 0 8px #39ff14,0 0 20px #39ff14aa,0 0 40px #39ff1444;
  --glow-purple:0 0 8px #bf00ff,0 0 20px #bf00ffaa,0 0 40px #bf00ff44;
  --text-bright:#e8f4ff;--text-dim:#6a7fa8;--text-ghost:#2a3555;
  --font-display:'Orbitron',monospace;--font-mono:'Share Tech Mono',monospace;--font-body:'Rajdhani',sans-serif;
  --radius:10px;--radius-lg:16px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{
  background-color:var(--bg-void);
  background-image:
    radial-gradient(ellipse 80% 50% at 20% -10%,rgba(0,245,255,.07) 0%,transparent 60%),
    radial-gradient(ellipse 60% 40% at 80% 110%,rgba(191,0,255,.08) 0%,transparent 60%),
    repeating-linear-gradient(0deg,transparent,transparent 60px,rgba(0,245,255,.018) 60px,rgba(0,245,255,.018) 61px),
    repeating-linear-gradient(90deg,transparent,transparent 60px,rgba(0,245,255,.018) 60px,rgba(0,245,255,.018) 61px);
  color:var(--text-bright);font-family:var(--font-body);font-size:16px;overflow-x:hidden;
}
/* scanlines */
body::before{content:'';position:fixed;inset:0;background:repeating-linear-gradient(to bottom,transparent 0,transparent 3px,rgba(0,0,0,.07) 3px,rgba(0,0,0,.07) 4px);pointer-events:none;z-index:9999}
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:var(--bg-deep)}
::-webkit-scrollbar-thumb{background:var(--neon-cyan);border-radius:3px}
a{color:var(--neon-cyan);text-decoration:none;transition:all .2s}
a:hover{color:#fff;text-shadow:var(--glow-cyan)}
h1,h2,h3,h4{font-family:var(--font-display);letter-spacing:.05em;line-height:1.2}
p{line-height:1.7;color:var(--text-bright)}

/* ══════════════════════════════════════════════
   NAVBAR
══════════════════════════════════════════════ */
.navbar{
  position:fixed;top:0;left:0;right:0;z-index:500;
  background:rgba(3,2,10,.92);backdrop-filter:blur(14px);
  border-bottom:1px solid rgba(0,245,255,.18);
  padding:0 40px;height:64px;
  display:flex;align-items:center;justify-content:space-between;gap:20px;
}
.navbar::after{content:'';position:absolute;bottom:-1px;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--neon-cyan),var(--neon-pink),transparent)}
.nav-logo{font-family:var(--font-display);font-size:1.1rem;font-weight:900;color:var(--neon-cyan);text-shadow:var(--glow-cyan);letter-spacing:.12em}
.nav-links{display:flex;align-items:center;gap:28px;list-style:none}
.nav-links a{font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);letter-spacing:.08em;text-transform:uppercase;transition:all .2s}
.nav-links a:hover{color:var(--neon-cyan);text-shadow:var(--glow-cyan)}
.nav-btn{
  padding:8px 20px;border-radius:var(--radius);
  font-family:var(--font-display);font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  background:linear-gradient(135deg,var(--neon-cyan),var(--neon-purple));
  color:var(--bg-void)!important;box-shadow:var(--glow-cyan);
  transition:all .25s;
}
.nav-btn:hover{box-shadow:0 0 20px #00f5ff,0 0 40px #00f5ff88;transform:translateY(-1px)}
.nav-toggle{display:none;background:transparent;border:none;color:var(--neon-cyan);font-size:1.4rem;cursor:pointer}

/* ══════════════════════════════════════════════
   HERO
══════════════════════════════════════════════ */
.hero{
  min-height:100vh;padding:100px 40px 80px;
  display:flex;align-items:center;justify-content:space-between;gap:50px;
  max-width:1200px;margin:0 auto;
}
.hero-text{max-width:560px}
.hero-tag{
  display:inline-flex;align-items:center;gap:8px;
  padding:5px 14px;border-radius:20px;margin-bottom:20px;
  background:rgba(0,245,255,.08);border:1px solid rgba(0,245,255,.3);
  font-family:var(--font-mono);font-size:.72rem;color:var(--neon-cyan);letter-spacing:.12em;text-transform:uppercase;
}
.hero-text h1{
  font-size:clamp(2rem,5vw,3.2rem);font-weight:900;
  color:#fff;margin-bottom:16px;line-height:1.1;
}
.hero-text h1 span{color:var(--neon-cyan);text-shadow:var(--glow-cyan)}
.hero-text p{font-size:1.1rem;color:var(--text-dim);margin-bottom:32px;max-width:480px}
.hero-btns{display:flex;gap:14px;flex-wrap:wrap}
.btn{
  display:inline-flex;align-items:center;justify-content:center;gap:8px;
  padding:13px 26px;border-radius:var(--radius);border:none;cursor:pointer;
  font-family:var(--font-display);font-size:.72rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  transition:all .25s;
}
.btn-primary{background:linear-gradient(135deg,var(--neon-cyan),var(--neon-purple));color:var(--bg-void);box-shadow:var(--glow-cyan)}
.btn-primary:hover{box-shadow:0 0 20px #00f5ff,0 0 50px #00f5ff66;transform:translateY(-2px);color:var(--bg-void)}
.btn-outline{background:transparent;color:var(--neon-cyan);border:1px solid rgba(0,245,255,.4)}
.btn-outline:hover{background:rgba(0,245,255,.08);box-shadow:var(--glow-cyan);color:var(--neon-cyan)}
.hero-img{
  width:420px;max-width:100%;
  filter:drop-shadow(0 0 30px rgba(0,245,255,.35));
  animation:float 4s ease-in-out infinite;
}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-18px)}}

/* stats rápidas */
.hero-stats{display:flex;gap:28px;margin-top:32px;flex-wrap:wrap}
.hstat{text-align:center}
.hstat-val{font-family:var(--font-display);font-size:1.6rem;font-weight:900;color:var(--neon-green);text-shadow:var(--glow-green)}
.hstat-lbl{font-family:var(--font-mono);font-size:.65rem;color:var(--text-dim);letter-spacing:.1em;text-transform:uppercase}

/* ══════════════════════════════════════════════
   SECTIONS BASE
══════════════════════════════════════════════ */
.section{padding:90px 40px;max-width:1200px;margin:0 auto}
.section-tag{
  display:inline-block;padding:4px 14px;border-radius:20px;margin-bottom:14px;
  font-family:var(--font-mono);font-size:.68rem;letter-spacing:.15em;text-transform:uppercase;
  background:rgba(0,245,255,.08);border:1px solid rgba(0,245,255,.25);color:var(--neon-cyan);
}
.section-title{font-size:clamp(1.4rem,3vw,2.2rem);color:#fff;margin-bottom:12px}
.section-title span{color:var(--neon-cyan);text-shadow:var(--glow-cyan)}
.section-sub{color:var(--text-dim);font-size:1.05rem;max-width:680px;margin-bottom:48px}
hr.neon{border:none;height:1px;background:linear-gradient(90deg,transparent,var(--neon-cyan),var(--neon-pink),transparent);opacity:.3;margin:0 0 48px}

/* ══════════════════════════════════════════════
   SOBRE — CARDS
══════════════════════════════════════════════ */
.sobre-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:22px}
.sobre-card{
  background:var(--bg-card);border:1px solid rgba(0,245,255,.18);border-radius:var(--radius-lg);
  padding:28px 24px;position:relative;overflow:hidden;transition:all .3s;
}
.sobre-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--neon-cyan),var(--neon-pink));opacity:.7}
.sobre-card:hover{border-color:rgba(0,245,255,.5);box-shadow:0 0 24px rgba(0,245,255,.1);transform:translateY(-4px)}
.sobre-card.destaque{background:linear-gradient(135deg,rgba(0,245,255,.08),rgba(191,0,255,.08));border-color:rgba(191,0,255,.35)}
.sobre-card.destaque::before{background:linear-gradient(90deg,var(--neon-purple),var(--neon-pink))}
.sobre-icon{
  width:52px;height:52px;border-radius:50%;margin-bottom:18px;
  display:flex;align-items:center;justify-content:center;font-size:1.3rem;
  background:rgba(0,245,255,.1);border:1px solid rgba(0,245,255,.3);box-shadow:var(--glow-cyan);
}
.destaque .sobre-icon{background:rgba(191,0,255,.15);border-color:rgba(191,0,255,.4);box-shadow:var(--glow-purple)}
.sobre-card h3{font-family:var(--font-display);font-size:.88rem;color:var(--neon-cyan);margin-bottom:12px}
.destaque h3{color:var(--neon-purple);text-shadow:var(--glow-purple)}
.sobre-card p,.sobre-card li{font-size:.95rem;color:var(--text-dim);line-height:1.7;margin-bottom:8px}
.sobre-card ul{padding-left:18px}

/* ══════════════════════════════════════════════
   RECURSOS — FEATURES
══════════════════════════════════════════════ */
.features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px}
.feature-card{
  background:var(--bg-card2);border:1px solid rgba(0,245,255,.15);border-radius:var(--radius-lg);
  padding:26px 22px;transition:all .3s;position:relative;overflow:hidden;
}
.feature-card::after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,245,255,.04),rgba(191,0,255,.04));opacity:0;transition:opacity .3s}
.feature-card:hover{border-color:var(--neon-cyan);box-shadow:var(--glow-cyan);transform:translateY(-5px)}
.feature-card:hover::after{opacity:1}
.feature-icon{font-size:2rem;margin-bottom:14px;display:block}
.feature-card h3{font-family:var(--font-display);font-size:.82rem;color:var(--neon-cyan);margin-bottom:10px}
.feature-card p{font-size:.92rem;color:var(--text-dim)}

/* ══════════════════════════════════════════════
   CRIADORES
══════════════════════════════════════════════ */
.section-group-title{
  font-family:var(--font-mono);font-size:.75rem;color:var(--text-dim);letter-spacing:.18em;text-transform:uppercase;
  margin:40px 0 20px;padding-bottom:10px;border-bottom:1px solid rgba(0,245,255,.12);
}
.creators-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:20px;margin-bottom:16px}
.creator-card{
  background:var(--bg-card);border:1px solid rgba(0,245,255,.15);border-radius:var(--radius-lg);
  padding:24px 18px;text-align:center;transition:all .3s;
}
.creator-card:hover{border-color:var(--neon-cyan);box-shadow:var(--glow-cyan);transform:translateY(-5px)}
.creator-img{
  width:90px;height:90px;border-radius:50%;object-fit:cover;
  border:2px solid rgba(0,245,255,.4);box-shadow:var(--glow-cyan);margin-bottom:14px;
}
.creator-name{font-family:var(--font-display);font-size:.72rem;font-weight:700;color:#fff;margin-bottom:6px}
.creator-role{font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);margin-bottom:4px}
.creator-icons{display:flex;justify-content:center;gap:14px;margin-top:12px}
.creator-icons a{font-size:1.2rem;transition:all .2s}
.creator-icons a.linkedin{color:#0a66c2}
.creator-icons a.github{color:var(--text-dim)}
.creator-icons a:hover{transform:scale(1.2);filter:drop-shadow(0 0 6px currentColor)}

/* ══════════════════════════════════════════════
   ODS
══════════════════════════════════════════════ */
.ods-item{
  display:grid;grid-template-columns:320px 1fr;gap:50px;
  align-items:center;margin-bottom:70px;
}
.ods-item.reverse{grid-template-columns:1fr 320px}
.ods-item.reverse .ods-img{order:2}
.ods-item.reverse .ods-text{order:1}
.ods-img img{width:100%;max-width:300px;filter:drop-shadow(0 0 20px rgba(0,245,255,.2))}
.ods-text h3{font-family:var(--font-display);font-size:1rem;color:var(--neon-cyan);text-shadow:var(--glow-cyan);margin-bottom:14px}
.ods-text p{color:var(--text-dim);font-size:.95rem;margin-bottom:12px}

/* ══════════════════════════════════════════════
   FOOTER
══════════════════════════════════════════════ */
.site-footer{
  text-align:center;padding:36px 24px;
  border-top:1px solid rgba(0,245,255,.1);
  font-family:var(--font-mono);font-size:.72rem;color:var(--text-dim);letter-spacing:.1em;
  background:linear-gradient(0deg,rgba(0,245,255,.03),transparent);
}
.site-footer .footer-brand{font-family:var(--font-display);font-size:.9rem;color:var(--neon-cyan);text-shadow:var(--glow-cyan);margin-bottom:6px}

/* ══════════════════════════════════════════════
   MOBILE
══════════════════════════════════════════════ */
@media(max-width:900px){
  .hero{flex-direction:column;text-align:center;padding:110px 24px 60px}
  .hero-text p,.hero-text h1{max-width:100%}
  .hero-btns{justify-content:center}
  .hero-stats{justify-content:center}
  .hero-img{width:280px}
  .section{padding:70px 24px}
  .ods-item,.ods-item.reverse{grid-template-columns:1fr;text-align:center}
  .ods-item.reverse .ods-img,.ods-item.reverse .ods-text{order:unset}
  .ods-img img{margin:0 auto 20px;display:block}
}
@media(max-width:680px){
  .navbar{padding:0 20px}
  .nav-links{display:none;position:fixed;top:64px;left:0;right:0;background:rgba(3,2,10,.97);border-bottom:1px solid rgba(0,245,255,.2);flex-direction:column;padding:24px;gap:20px}
  .nav-links.open{display:flex}
  .nav-toggle{display:block}
}

/* animações entrada */
.fade-up{opacity:0;transform:translateY(24px);transition:opacity .6s ease,transform .6s ease}
.fade-up.visible{opacity:1;transform:translateY(0)}
  </style>
</head>
<body>

<!-- ══════════════════ NAVBAR ══════════════════ -->
<nav class="navbar">
  <div class="nav-logo">MATHGAME</div>
  <ul class="nav-links" id="navLinks">
    <li><a href="#sobre">Sobre</a></li>
    <li><a href="#recursos">Recursos</a></li>
    <li><a href="#criadores">Criadores</a></li>
    <li><a href="#ods">ODS</a></li>
    <li><a href="<?= site_url('auth/login') ?>" class="nav-btn">Fazer Login</a></li>
  </ul>
  <button class="nav-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')" aria-label="Menu">☰</button>
</nav>

<!-- ══════════════════ HERO ══════════════════ -->
<section class="hero">
  <div class="hero-text fade-up">
    <div class="hero-tag">⚡ Projeto UNIG — Iniciação Científica 2024</div>
    <h1>Aprenda <span>Matemática</span> Jogando!</h1>
    <p>O MathGame transforma exercícios matemáticos em desafios interativos com sistema de XP, níveis e painel exclusivo para estudantes.</p>
    <div class="hero-btns">
      <a href="<?= site_url('auth/login') ?>" class="btn btn-primary">▶ COMEÇAR AGORA</a>
      <a href="#sobre" class="btn btn-outline">Saiba mais</a>
    </div>
    <div class="hero-stats">
      <div class="hstat"><div class="hstat-val">5</div><div class="hstat-lbl">Questões por rodada</div></div>
      <div class="hstat"><div class="hstat-val">XP</div><div class="hstat-lbl">Sistema de pontos</div></div>
      <div class="hstat"><div class="hstat-val">3</div><div class="hstat-lbl">Níveis de dificuldade</div></div>
    </div>
  </div>
  <img class="hero-img" src="https://img.freepik.com/vetores-premium/icone-de-simbolos-matematicos_1186366-125286.jpg" alt="Símbolos matemáticos">
</section>

<!-- ══════════════════ SOBRE ══════════════════ -->
<section class="section" id="sobre">
  <hr class="neon">
  <div class="section-tag">// O PROJETO</div>
  <h2 class="section-title">O que é o <span>MathGame?</span></h2>
  <p class="section-sub">Um projeto educacional interdisciplinar que une Matemática, Tecnologia e Pedagogia para transformar o ensino por meio de soluções digitais acessíveis.</p>

  <div class="sobre-grid">
    <div class="sobre-card fade-up">
      <div class="sobre-icon">🔬</div>
      <h3>O Projeto</h3>
      <p>O MathGame integra o Programa de Iniciação Científica (PIC) da Universidade Iguaçu (UNIG). A pesquisa teve início em 2024, com divulgação técnica prevista para 2026.</p>
      <p>O projeto promove a articulação entre diferentes áreas do conhecimento, fortalecendo a aplicação da tecnologia no ensino da Matemática.</p>
    </div>

    <div class="sobre-card fade-up">
      <div class="sobre-icon">🔗</div>
      <h3>Interdisciplinaridade</h3>
      <ul>
        <li><strong style="color:var(--neon-cyan)">Matemática:</strong> organização dos conteúdos, atividades e coerência pedagógica</li>
        <li><strong style="color:var(--neon-cyan)">Computação:</strong> desenvolvimento dos aplicativos, design e acessibilidade</li>
        <li><strong style="color:var(--neon-cyan)">Pedagogia:</strong> práticas inclusivas e fundamentos didáticos</li>
      </ul>
    </div>

    <div class="sobre-card fade-up">
      <div class="sobre-icon">🏫</div>
      <h3>Impacto nas Escolas</h3>
      <ul>
        <li>Ampliação do acesso à educação de qualidade</li>
        <li>Facilitação da aprendizagem matemática</li>
        <li>Maior engajamento e autonomia dos estudantes</li>
        <li>Apoio à inovação pedagógica</li>
        <li>Redução das desigualdades educacionais</li>
      </ul>
    </div>

    <div class="sobre-card destaque fade-up">
      <div class="sobre-icon">🎓</div>
      <h3>Formação Acadêmica</h3>
      <p>Para os estudantes participantes, o projeto proporciona uma vivência real de pesquisa científica, desenvolvimento técnico e pedagógico.</p>
      <p>Essa experiência amplia as oportunidades de atuação no ensino, na tecnologia educacional e na pesquisa acadêmica.</p>
    </div>
  </div>
</section>

<!-- ══════════════════ RECURSOS ══════════════════ -->
<section class="section" id="recursos" style="background:linear-gradient(180deg,transparent,rgba(0,245,255,.03),transparent)">
  <hr class="neon">
  <div class="section-tag">// FUNCIONALIDADES</div>
  <h2 class="section-title">Recursos do <span>Sistema</span></h2>
  <p class="section-sub">Tudo o que você precisa para aprender matemática de forma interativa e progressiva.</p>

  <div class="features-grid">
    <div class="feature-card fade-up">
      <span class="feature-icon">📊</span>
      <h3>Perfil com XP</h3>
      <p>Acompanhe sua evolução com o sistema de experiência e desbloqueie recursos conforme avança.</p>
    </div>
    <div class="feature-card fade-up">
      <span class="feature-icon">🧠</span>
      <h3>Quiz Inteligente</h3>
      <p>Perguntas organizadas por tema e nível de dificuldade: Fundamental I, II e Ensino Médio.</p>
    </div>
    <div class="feature-card fade-up">
      <span class="feature-icon">📈</span>
      <h3>Painel do Aluno</h3>
      <p>Visualize seus pontos, badges conquistados e acompanhe a barra de progresso de XP.</p>
    </div>
    <div class="feature-card fade-up">
      <span class="feature-icon">🧪</span>
      <h3>Laboratório</h3>
      <p>Acesse ferramentas educacionais desbloqueadas conforme você acumula pontos no sistema.</p>
    </div>
    <div class="feature-card fade-up">
      <span class="feature-icon">👨‍🏫</span>
      <h3>Painel do Professor</h3>
      <p>Professores cadastram, editam e organizam questões com feedback pedagógico e imagens.</p>
    </div>
    <div class="feature-card fade-up">
      <span class="feature-icon">📱</span>
      <h3>Totalmente Responsivo</h3>
      <p>Perfeito no computador, tablet e celular. Jogue em qualquer dispositivo.</p>
    </div>
  </div>
</section>

<!-- ══════════════════ CRIADORES ══════════════════ -->
<section class="section" id="criadores">
  <hr class="neon">
  <div class="section-tag">// EQUIPE</div>
  <h2 class="section-title">Conheça os <span>Criadores</span></h2>

  <!-- Computação -->
  <div class="section-group-title">▸ Ciência da Computação</div>
  <div class="creators-grid">
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/Jose.jpg') ?>" alt="José Augusto" onerror="this.style.display='none'">
      <div class="creator-name">José Augusto</div>
      <div class="creator-role">Fullstack Developer</div>
      <div class="creator-role">Ciência da Computação</div>
      <div class="creator-icons">
        <a class="linkedin" href="https://www.linkedin.com/in/josé-augusto-937781364" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a class="github"   href="https://github.com/Lopez9082" target="_blank"><i class="fa-brands fa-github"></i></a>
      </div>
    </div>
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/beatriz.jpeg') ?>" alt="Beatrix Ximenes" onerror="this.style.display='none'">
      <div class="creator-name">Beatrix Ximenes</div>
      <div class="creator-role">Back-end Developer</div>
      <div class="creator-role">Ciência da Computação</div>
      <div class="creator-icons">
        <a class="linkedin" href="https://www.linkedin.com/in/beatriz-ximenes-6b09b4251/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a class="github"   href="https://github.com/Beatriz-Ximenes" target="_blank"><i class="fa-brands fa-github"></i></a>
      </div>
    </div>
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/Elivelton.jpg') ?>" alt="Elivelton Silva" onerror="this.style.display='none'">
      <div class="creator-name">Elivelton Silva</div>
      <div class="creator-role">Back-end Developer</div>
      <div class="creator-role">Ciência da Computação</div>
      <div class="creator-icons">
        <a class="linkedin" href="https://www.linkedin.com/in/elivelton-silva-f" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a class="github"   href="https://github.com/Eli-th" target="_blank"><i class="fa-brands fa-github"></i></a>
      </div>
    </div>
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="Denise Moraes" onerror="this.style.display='none'">
      <div class="creator-name">Denise Moraes</div>
      <div class="creator-role">Coordenadora — Ciência da Computação</div>
      <div class="creator-icons">
        <a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a class="github"   href="https://github.com/deniaulainfead23" target="_blank"><i class="fa-brands fa-github"></i></a>
      </div>
    </div>
  </div>

  <!-- Matemática -->
  <div class="section-group-title">▸ Licenciatura em Matemática EAD</div>
  <div class="creators-grid">
    <?php
    $matematicos = [
      ['nome'=>'Jorge Lessa Batista da Silva Junior','foto'=>'JORGE.png','linkedin'=>'https://www.linkedin.com/in/'],
      ['nome'=>'Rosilene Queiroz da Silva Zen','foto'=>'ROSILENE.png','linkedin'=>'https://www.linkedin.com/in/'],
      ['nome'=>'Thalia Martha da Silva Gomes','foto'=>'THALIA.png','linkedin'=>'https://www.linkedin.com/'],
      ['nome'=>'Carlos Eduardo Mello Costa','foto'=>'carlos_eduardo.png','linkedin'=>'https://www.linkedin.com/in/carlos-mello-8879b7216/'],
      ['nome'=>'Sara Porte de Souza dos Santos','foto'=>'SARA.png','linkedin'=>'https://www.linkedin.com/in/sara-portes-de-souza-dos-santos-914a09397'],
      ['nome'=>'Roberta Barboza de Souza da Silva','foto'=>'ROBERTA.png','linkedin'=>'https://www.linkedin.com/in/'],
    ];
    foreach ($matematicos as $m): ?>
      <div class="creator-card fade-up">
        <img class="creator-img" src="<?= base_url('assets/fotos/'.$m['foto']) ?>" alt="<?= $m['nome'] ?>" onerror="this.style.display='none'">
        <div class="creator-name"><?= $m['nome'] ?></div>
        <div class="creator-role">Licenciando em Matemática EAD</div>
        <div class="creator-icons">
          <a class="linkedin" href="<?= $m['linkedin'] ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Pedagogia -->
  <div class="section-group-title">▸ Pedagogia EAD</div>
  <div class="creators-grid">
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/GABRIELLY.png') ?>" alt="Gabrielly Coelho" onerror="this.style.display='none'">
      <div class="creator-name">Gabrielly Coelho da Cunha</div>
      <div class="creator-role">Pedagogia</div>
      <div class="creator-icons"><a class="linkedin" href="https://www.linkedin.com/in/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></div>
    </div>
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/VICTORIA.png') ?>" alt="Victória Adrielle" onerror="this.style.display='none'">
      <div class="creator-name">Victória Adrielle Gonçalves da Silva</div>
      <div class="creator-role">Pedagogia</div>
      <div class="creator-icons"><a class="linkedin" href="https://www.linkedin.com/in/vict%C3%B3ria-adrielle-37a84522b/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></div>
    </div>
  </div>

  <!-- Orientadores -->
  <div class="section-group-title">▸ Orientadores</div>
  <div class="creators-grid">
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/MARCOS.png') ?>" alt="Marcos Cruz" onerror="this.style.display='none'">
      <div class="creator-name">Marcos Cruz de Azevedo</div>
      <div class="creator-role">Coordenador — Licenciatura em Matemática EAD</div>
      <div class="creator-icons"><a class="linkedin" href="https://www.linkedin.com/in/marcos-cruz-de-azevedo-a12858290/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></div>
    </div>
    <div class="creator-card fade-up">
      <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="Denise Moraes" onerror="this.style.display='none'">
      <div class="creator-name">Denise Moraes</div>
      <div class="creator-role">Coordenadora — Ciências da Computação EAD</div>
      <div class="creator-icons"><a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></div>
    </div>
  </div>
</section>

<!-- ══════════════════ ODS ══════════════════ -->
<section class="section" id="ods" style="background:linear-gradient(180deg,transparent,rgba(191,0,255,.03),transparent)">
  <hr class="neon">
  <div class="section-tag">// OBJETIVOS DE DESENVOLVIMENTO SUSTENTÁVEL</div>
  <h2 class="section-title">ODS que <span>Apoiamos</span></h2>
  <p class="section-sub">O MathGame está alinhado aos Objetivos de Desenvolvimento Sustentável da ONU.</p>

  <div class="ods-item fade-up">
    <div class="ods-img"><img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-4-2.png" alt="ODS 4"></div>
    <div class="ods-text">
      <h3>ODS 4 — Educação de Qualidade</h3>
      <p>O MathGame busca o incentivo à educação e formação de crianças e jovens no campo das exatas, despertando a curiosidade, o desenvolvimento da lógica e raciocínio.</p>
      <p>O projeto colabora diretamente no desenvolvimento cognitivo e acadêmico dos estudantes, tornando a matemática acessível e divertida.</p>
    </div>
  </div>

  <div class="ods-item reverse fade-up">
    <div class="ods-text">
      <h3>ODS 5 — Igualdade de Gênero</h3>
      <p>O projeto promove a presença de estudantes de todos os gêneros em atividades de STEM, com atividades inclusivas e práticas pedagógicas que combatem desigualdades no ambiente escolar.</p>
    </div>
    <div class="ods-img"><img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-5-2.png" alt="ODS 5"></div>
  </div>

  <div class="ods-item fade-up">
    <div class="ods-img"><img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-8-2.png" alt="ODS 8"></div>
    <div class="ods-text">
      <h3>ODS 8 — Trabalho Decente e Crescimento Econômico</h3>
      <p>Profissionais ligados à matemática corresponderam a 4,6% do PIB brasileiro, com média salarial 119% superior à média nacional e altos índices de contratos formais.</p>
      <p>Fortalecer o ensino de matemática é investir no futuro econômico do país.</p>
    </div>
  </div>

  <div class="ods-item reverse fade-up">
    <div class="ods-text">
      <h3>ODS 9 — Indústria, Inovação e Infraestrutura</h3>
      <p>A matemática é base da inovação tecnológica e científica. Seu impacto é visível em áreas como medicina, indústria, previsão climática e infraestrutura urbana.</p>
    </div>
    <div class="ods-img"><img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-9-2.png" alt="ODS 9"></div>
  </div>

  <div class="ods-item fade-up">
    <div class="ods-img"><img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-10-2.png" alt="ODS 10"></div>
    <div class="ods-text">
      <h3>ODS 10 — Redução das Desigualdades</h3>
      <p>O MathGame promove inclusão por meio de atividades acessíveis e experiências compatíveis com diferentes públicos, garantindo diversidade e acesso ao conhecimento matemático.</p>
    </div>
  </div>
</section>

<!-- ══════════════════ FOOTER ══════════════════ -->
<footer class="site-footer">
  <div class="footer-brand">MATHGAME</div>
  <p>UNIG • NEAD • GEMATECH</p>
  <p style="margin-top:6px">Projeto de Iniciação Científica — Edital 2024.2 • Universidade Iguaçu</p>
</footer>

<script>
// Intersection Observer para animações fade-up
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
}, { threshold: 0.12 });
document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
</script>

</body>
</html>
