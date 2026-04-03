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
  <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/index_css.css') ?>">
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
  <div class="hero-img-wrap">
    <img class="hero-img" src="<?= base_url('uploads/Logo_mathgame.png') ?>" alt="Símbolos matemáticos">
  </div>
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
