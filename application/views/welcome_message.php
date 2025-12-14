<?php
// Este é o conteúdo da view para CodeIgniter 3. Salve este arquivo como application/views/home.php
// Certifique-se de que o controlador carregue esta view, por exemplo: $this->load->view('home');
// Para PHP 8.1 e CI3, assumimos compatibilidade (CI3 suporta até PHP 7.4, mas pode funcionar com 8.1 com ajustes; teste em ambiente de desenvolvimento).
// Melhorias: Estrutura MVC, segurança com base_url/site_url, responsividade aprimorada, acessibilidade, performance (CSS/JS embutidos para simplicidade), SEO básico, e design moderno com variáveis CSS.
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MathQuizz: Aprenda matemática de forma divertida com quizzes interativos, XP e rankings.">
    <meta name="keywords" content="matemática, quiz, aprendizado, jogos educacionais">
    <title>MathQuizz - Início</title>
    <!-- Font Poppins do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Preload da imagem para melhor performance -->
    <link rel="preload" href="https://img.freepik.com/vetores-premium/icone-de-simbolos-matematicos_1186366-125286.jpg" as="image">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ------------------ RESET ------------------ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* Variáveis CSS para manutenção fácil */
        :root {
            --primary-color: #0066ff;
            --primary-hover: #0050d3;
            --bg-color: #f5f7fb;
            --text-color: #222;
            --text-secondary: #555;
            --shadow: rgba(0, 0, 0, 0.08);
            --shadow-footer: rgba(0, 0, 0, 0.06);
        }

        body {
            background: var(--bg-color);
            color: var(--text-color);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ------------------ HEADER ------------------ */
        header {
            width: 100%;
            padding: 18px 40px;
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 10px var(--shadow);
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
            color: var(--primary-color);
        }

        nav ul {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            font-weight: 500;
            color: #444;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: var(--primary-color);
        }

        .btn-primary {
            padding: 10px 18px;
            background: var(--primary-color);
            color: white !important;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        /* MOBILE MENU */
        .menu-btn {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: #444;
        }

        @media (max-width: 820px) {
            nav ul {
                position: fixed;
                top: 0;
                right: -100%;
                width: 60%;
                height: 100vh;
                background: #fff;
                flex-direction: column;
                padding-top: 100px;
                gap: 40px;
                transition: right 0.4s ease;
                box-shadow: -2px 0 10px var(--shadow);
            }

            nav ul.active {
                right: 0;
            }

            .menu-btn {
                display: block;
            }
        }

        /* ------------------ HERO ------------------ */
        .hero {
            padding: 140px 40px 80px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            min-height: 80vh;
        }

        .hero-text {
            max-width: 550px;
        }

        .hero-text h1 {
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .hero-text p {
            font-size: 18px;
            color: var(--text-secondary);
            margin-bottom: 25px;
        }

        .hero-btns a {
            padding: 12px 22px;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 10px;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .hero-btns a:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .hero img {
            width: 450px;
            max-width: 100%;
            animation: float 3s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }

        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 120px 20px 60px 20px;
            }
            .hero img {
                width: 320px;
            }
        }

        /* ------------------ SECTIONS ------------------ */
        .section {
            padding: 80px 40px;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section h2 {
            font-size: clamp(28px, 4vw, 34px);
            margin-bottom: 20px;
            color: var(--text-color);
        }

        .section p {
            max-width: 800px;
            margin: 0 auto 40px;
            color: var(--text-secondary);
            font-size: 18px;
        }

        /* ------------------ FEATURES ------------------ */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .feature-card {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 14px var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px var(--shadow);
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        /* ------------------ FOOTER ------------------ */
        footer {
            padding: 40px;
            text-align: center;
            background: #fff;
            margin-top: 40px;
            box-shadow: 0 -3px 10px var(--shadow-footer);
        }

        footer p {
            color: #666;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 60px auto;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #222;
        }

        .creators-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .creator-card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.10);
            transition: .3s;
        }

        .creator-card:hover {
            transform: translateY(-6px);
        }

        .creator-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #0066ff;
        }

        .creator-name {
            margin-top: 15px;
            font-size: 20px;
            font-weight: 600;
        }

        .icons {
            margin-top: 12px;
        }

        .icons a {
            display: inline-block;
            margin: 0 10px;
            font-size: 28px;
            transition: .3s;
        }

        .icons a:hover {
            transform: scale(1.15);
            opacity: .8;
        }

        .linkedin {
            color: #0A66C2;
        }

        .github {
            color: #000;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #f5f7fb 0%, #e8f4fd 100%);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 60px auto;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #222;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-bottom: 60px;
        }

        .section h2 {
            font-size: 28px;
            margin-bottom: 30px;
            color: #0066ff;
            border-bottom: 2px solid #0066ff;
            display: inline-block;
            padding-bottom: 10px;
        }

        .creators-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .creator-card {
            background: #fff;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .creator-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .creator-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #0066ff;
            margin-bottom: 15px;
        }

        .creator-name {
            margin-top: 15px;
            font-size: 22px;
            font-weight: 700;
            color: #222;
        }

        .function-creator {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
            font-weight: 500;
        }

        .icons {
            margin-top: 20px;
        }

        .icons a {
            display: inline-block;
            margin: 0 15px;
            font-size: 32px;
            transition: all 0.3s ease;
            color: #0066ff;
        }

        .icons a:hover {
            transform: scale(1.2) rotate(10deg);
            color: #00d4ff;
        }

        .linkedin {
            color: #0A66C2;
        }

        .github {
            color: #333;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .creators-grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 28px;
            }

            .section h2 {
                font-size: 24px;
            }
        }

        /* Animações de entrada */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
.ods-festival {
    background: #ffffffff;
    color: #fff;
    padding: 80px 20px;
}

.ods-festival h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 40px;
    color: #000000ff;
}

.ods-item {
    max-width: 1200px;
    margin: 0 auto 80px;
    display: grid;
    grid-template-columns: 420px 1fr;
    gap: 50px;
    align-items: center;
}

.ods-item.reverse {
    grid-template-columns: 1fr 420px;
}

.ods-item img {
    width: 100%;
    max-width: 380px;
}

.ods-text h3 {
    color: #000000ff;
    font-size: 22px;
    margin-bottom: 15px;
    text-decoration: underline;
}

.ods-text p {
    font-size: 16px;
    line-height: 1.7;
    color: #000000ff;
    margin-bottom: 15px;
}

/* Responsivo */
@media (max-width: 900px) {
    .ods-item,
    .ods-item.reverse {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .ods-item img {
        margin: 0 auto;
    }
}

/* ----------- SOBRE ELEGANTE ----------- */
.sobre-elegante {
    background: linear-gradient(180deg, #f8fbff, #ffffff);
}

.sobre-header {
    max-width: 900px;
    margin: 0 auto 60px;
    text-align: center;
}

.sobre-header h2 {
    font-size: 32px;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.sobre-header p {
    font-size: 18px;
    color: var(--text-secondary);
    line-height: 1.7;
}

.sobre-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.sobre-card {
    background: #ffffff;
    padding: 35px 30px;
    border-radius: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: transform .3s ease, box-shadow .3s ease;
    position: relative;
}

.sobre-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.12);
}

.sobre-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-color);
    color: #fff;
    font-size: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin-bottom: 20px;
}

.sobre-card h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #222;
}

.sobre-card p {
    font-size: 16px;
    color: var(--text-secondary);
    line-height: 1.7;
    margin-bottom: 12px;
}

.sobre-card ul {
    padding-left: 18px;
}

.sobre-card ul li {
    font-size: 16px;
    color: var(--text-secondary);
    margin-bottom: 10px;
    line-height: 1.6;
}

/* Card em destaque */
.sobre-card.destaque {
    background: linear-gradient(135deg, #0066ff, #00b4ff);
    color: #ffffff;
}

.sobre-card.destaque h3,
.sobre-card.destaque p {
    color: #ffffff;
}

.sobre-card.destaque ul li {
    color: #ffffff;
}

.sobre-card.destaque .sobre-icon {
    background: #ffffff;
    color: #0066ff;
}

/* =========================
   AJUSTES RESPONSIVOS GLOBAIS
   ========================= */

@media (max-width: 1200px) {
    .section {
        padding: 70px 30px;
    }
}

@media (max-width: 992px) {
    header {
        padding: 16px 24px;
    }

    .hero {
        gap: 30px;
        padding-top: 120px;
    }

    .hero-text h1 {
        font-size: 36px;
    }

    .hero-text p {
        font-size: 16px;
    }

    .sobre-header h2 {
        font-size: 28px;
    }
}

@media (max-width: 768px) {

    /* HERO */
    .hero {
        flex-direction: column;
        text-align: center;
        padding: 110px 20px 60px;
    }

    .hero img {
        width: 260px;
    }

    /* SECTIONS */
    .section {
        padding: 60px 20px;
    }

    .section h2 {
        font-size: 24px;
    }

    .section p {
        font-size: 16px;
    }

    /* SOBRE */
    .sobre-cards {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .sobre-card {
        padding: 28px 24px;
    }

    /* FEATURES */
    .features {
        grid-template-columns: 1fr;
    }

    /* CRIADORES */
    .creator-img {
        width: 120px;
        height: 120px;
    }

    .creator-name {
        font-size: 20px;
    }

    .icons a {
        font-size: 26px;
    }

    /* ODS */
    .ods-item {
        grid-template-columns: 1fr !important;
        gap: 30px;
        margin-bottom: 60px;
    }

    .ods-item img {
        max-width: 260px;
        margin: 0 auto;
    }

    .ods-text h3 {
        font-size: 20px;
    }

    .ods-text p {
        font-size: 15px;
    }
}

@media (max-width: 480px) {

    header {
        padding: 14px 18px;
    }

    .logo {
        font-size: 22px;
    }

    .hero-text h1 {
        font-size: 28px;
    }

    .hero-btns a {
        font-size: 16px;
        padding: 10px 18px;
    }

    .sobre-icon {
        width: 50px;
        height: 50px;
        font-size: 22px;
    }

    .sobre-card h3 {
        font-size: 18px;
    }

    .sobre-card p,
    .sobre-card ul li {
        font-size: 15px;
    }
}


    
    </style>
</head>
<body>
    <header>
        <div class="logo">MathQuizz</div>
        <nav>
            <ul id="menu">
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#recursos">Recursos</a></li>
                <li><a href="#criadores">Criadores</a> </li>
                <li><a href="#ods">ODS</a> </li>
                <li><a class="btn-primary" href="<?php echo site_url('auth/login'); ?>">Fazer Login</a></li>
            </ul>
        </nav>
        <div class="menu-btn" onclick="toggleMenu()" aria-label="Abrir menu">☰</div>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <h1>Aprenda Matemática Jogando!</h1>
            <p>O MathQuizz transforma exercícios matemáticos em desafios divertidos, com sistema de XP, níveis, ranking e painel exclusivo para estudantes.</p>
            <div class="hero-btns">
                <a href="<?php echo site_url('quizzes/index'); ?>" aria-label="Iniciar quiz">Começar Quiz</a>
            </div>
        </div>
        <img src="https://img.freepik.com/vetores-premium/icone-de-simbolos-matematicos_1186366-125286.jpg" alt="Ícone de símbolos matemáticos representando aprendizado interativo">
    </section>



    <!-- SOBRE -->
    <!-- SOBRE -->
<section class="section sobre-elegante" id="sobre">

    <div class="sobre-header">
        <h2>O que é o MathQuizz?</h2>
        <p>
            Um projeto educacional interdisciplinar que une Matemática, Tecnologia e Pedagogia
            para transformar o ensino por meio de soluções digitais acessíveis.
        </p>
    </div>

    <div class="sobre-cards">

        <!-- CARD 1 -->
        <div class="sobre-card">
            <div class="sobre-icon">
                <i class="fa-solid fa-flask"></i>
            </div>
            <h3>O Projeto</h3>
            <p>
                O MathQuizz integra o Programa de Iniciação Científica (PIC) da Universidade Iguaçu (UNIG).
                A pesquisa teve início em 2024, encerrando-se em 2025, com divulgação técnica prevista para 2026.
            </p>
            <p>
                O projeto promove a articulação entre diferentes áreas do conhecimento, fortalecendo
                a aplicação da tecnologia no ensino da Matemática.
            </p>
        </div>

        <!-- CARD 2 -->
        <div class="sobre-card">
            <div class="sobre-icon">
                <i class="fa-solid fa-people-arrows"></i>
            </div>
            <h3>Interdisciplinaridade</h3>
            <ul>
                <li><strong>Matemática:</strong> organização dos conteúdos, atividades e coerência pedagógica;</li>
                <li><strong>Computação:</strong> desenvolvimento dos aplicativos, design e acessibilidade;</li>
                <li><strong>Pedagogia:</strong> práticas inclusivas e fundamentos didáticos.</li>
            </ul>
        </div>

        <!-- CARD 3 -->
        <div class="sobre-card">
            <div class="sobre-icon">
                <i class="fa-solid fa-school"></i>
            </div>
            <h3>Impacto nas Escolas</h3>
            <ul>
                <li>Ampliação do acesso à educação de qualidade;</li>
                <li>Facilitação da aprendizagem matemática;</li>
                <li>Maior engajamento e autonomia dos estudantes;</li>
                <li>Apoio à inovação pedagógica;</li>
                <li>Redução das desigualdades educacionais.</li>
            </ul>
        </div>

        <!-- CARD 4 -->
        <div class="sobre-card destaque">
            <div class="sobre-icon">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <h3>Formação Acadêmica</h3>
            <p>
                Para os estudantes participantes, o projeto proporciona uma vivência real de pesquisa científica,
                desenvolvimento técnico e pedagógico, além de fortalecer o portfólio acadêmico e profissional.
            </p>
            <p>
                Essa experiência amplia as oportunidades de atuação no ensino, na tecnologia educacional
                e na pesquisa acadêmica.
            </p>
        </div>

    </div>

</section>


    <!-- FEATURES -->
    <section class="section" id="recursos">
        <h2>Recursos do Sistema</h2>
        <div class="features">
            <div class="feature-card">
                <h3>📊 Perfil com XP</h3>
                <p>Acompanhe sua evolução com o sistema de experiência e ranking.</p>
            </div>
            <div class="feature-card">
                <h3>🧠 Quiz Inteligente</h3>
                <p>Perguntas dinâmicas que se adaptam ao seu nível.</p>
            </div>
            <div class="feature-card">
                <h3>📈 Painel do Aluno</h3>
                <p>Veja seu desempenho, desafios concluídos e áreas para melhorar.</p>
            </div>
            <div class="feature-card">
                <h3>⚡ Totalmente Responsivo</h3>
                <p>Perfeito no computador, tablet e celular.</p>
            </div>
        </div>
    </section>

    <div class="container" id="criadores">
        <h1>Conheça os Criadores</h1>

        <div class="section">
            <h2>Criadores</h2>
            <div class="creators-grid">
                <!-- CRIADOR 1 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/Jose.jpg') ?>" alt="José Augusto">
                    <div class="creator-name">José Augusto</div>
                    <div class="function-creator">Função: Fullstack</div>
                    <div class="function-creator">Curso: Ciência da Computação</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/josé-augusto-937781364" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a class="github" href="https://github.com/Lopez9082" target="_blank" title="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- CRIADOR 2 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="Denise Moraes">
                    <div class="creator-name">Denise Moraes</div>
                    <div class="function-creator">Função: Professora</div>
                    <div class="function-creator">Curso: Coordenadora Ciência da Computação</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a class="github" href="https://github.com/deniaulainfead23" target="_blank" title="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- CRIADOR 3 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/beatriz.jpeg') ?>" alt="Beatrix Ximenes">
                    <div class="creator-name">Beatrix Ximenes</div>
                    <div class="function-creator">Função: Back-end</div>
                    <div class="function-creator">Curso: Ciência da Computação</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/beatriz-ximenes-6b09b4251/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a class="github" href="https://github.com/Beatriz-Ximenes" target="_blank" title="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- CRIADOR 4 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/Elivelton.jpg') ?>" alt="Elivelton Silva">
                    <div class="creator-name">Elivelton Silva</div>
                    <div class="function-creator">Função: Back-end</div>
                    <div class="function-creator">Curso: Ciência da Computação</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/elivelton-silva-f" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a class="github" href="https://github.com/Eli-th" target="_blank" title="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Matemáticos</h2>
            <div class="creators-grid">
                <!-- MATEMÁTICO 1 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/JORGE.png') ?>" alt="JORGE LESSA BATISTA DA SILVA JUNIOR">
                    <div class="creator-name">JORGE LESSA BATISTA DA SILVA JUNIOR</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- MATEMÁTICO 2 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/ROSILENE.png') ?>" alt="ROSILENE QUEIROZ DA SILVA ZEN">
                    <div class="creator-name">ROSILENE QUEIROZ DA SILVA ZEN</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- MATEMÁTICO 3 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/THALIA.png') ?>" alt="THALIA MARTHA DA SILVA GOMES">
                    <div class="creator-name">THALIA MARTHA DA SILVA GOMES</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- MATEMÁTICO 4 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/carlos_eduardo.png') ?>" alt="CARLOS EDUARDO MELLO COSTA">
                    <div class="creator-name">CARLOS EDUARDO MELLO COSTA</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/carlos-mello-8879b7216/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- MATEMÁTICO 5 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/SARA.png') ?>" alt="SARA PORTE DE SOUZA DOS SANTOS">
                    <div class="creator-name">SARA PORTE DE SOUZA DOS SANTOS</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/sara-portes-de-souza-dos-santos-914a09397" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- MATEMÁTICO 6 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/ROBERTA.png') ?>" alt="ROBERTA BARBOZA DE SOUZA DA SILVA">
                    <div class="creator-name">ROBERTA BARBOZA DE SOUZA DA SILVA</div>
                    <div class="function-creator">Curso: Licenciando em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Pedagogia EAD</h2>
            <div class="creators-grid">
                <!-- PEDAGOGIA 1 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/GABRIELLY.png') ?>" alt="GABRIELLY COELHO DA CUNHA">
                    <div class="creator-name">GABRIELLY COELHO DA CUNHA</div>
                    <div class="function-creator">Curso: Pedagogia</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- PEDAGOGIA 2 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/VICTORIA.png') ?>" alt="VICTÓRIA ADRIELLE GONÇALVES DA SILVA">
                    <div class="creator-name">VICTÓRIA ADRIELLE GONÇALVES DA SILVA</div>
                    <div class="function-creator">Curso: Pedagogia</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/vict%C3%B3ria-adrielle-37a84522b/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Orientadores</h2>
            <div class="creators-grid">
                <!-- ORIENTADOR 1 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/MARCOS.png') ?>" alt="MARCOS CRUZ DE AZEVEDO">
                    <div class="creator-name">MARCOS CRUZ DE AZEVEDO</div>
                    <div class="function-creator">Função: Coordenador do curso de Licenciatura em Matemática EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQFM9SGjat8cIQAAAZr-SQKIQYTywCAjNFRSZPxLWH4IrtsMBvSn1D9guFucnXTWYssWIScN2_7gwYSlMZ68A-dIR5AEdwpt_4WPw-2f6eR8fIGFd3im3KWOgKdTIvPZ7Pi3LLw=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fmarcos-cruz-de-azevedo-a12858290%2F" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- ORIENTADOR 2 -->
                <div class="creator-card fade-in">
                    <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="DENISE MORAES">
                    <div class="creator-name">DENISE MORAES</div>
                    <div class="function-creator">Função: Coordenadora do curso de Ciências da Computação EAD</div>
                    <div class="icons">
                        <a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank" title="LinkedIn">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
   <section id="ods" class="ods-festival fade-in">
    <h1>ODSx</h1>

    <!-- ODS 4 -->
    <div class="ods-item">
        <img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-4-2.png" alt="ODS 4">
        <div class="ods-text">
            <h3>ODS 4</h3>
            <p>
                O Festival Nacional da Matemática é um dos projetos de disseminação do IMPA e busca,
                sobretudo, o incentivo à educação e formação de crianças e jovens no campo das exatas.
            </p>
            <p>
                Entre as metas do Festival estão o despertar da curiosidade, o desenvolvimento da lógica
                e raciocínio e também o descomplicar da Matemática, colaborando diretamente no
                desenvolvimento cognitivo e acadêmico.
            </p>
        </div>
    </div>

    <!-- ODS 5 -->
    <div class="ods-item reverse">
        <div class="ods-text">
            <h3>ODS 5</h3>
            <p>
                O Festival Nacional da Matemática exibirá o projeto Meninas Olímpicas do IMPA (MOI),
                desenvolvido para promover a presença de alunas da Educação Básica em atividades de STEM.
            </p>
            <p>
                O projeto teve início em 2019 e objetiva a formação e o desenvolvimento profissional
                docente para o enfrentamento da questão de gênero no ambiente escolar.
            </p>
        </div>
        <img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-5-2.png" alt="ODS 5">
    </div>

    <!-- ODS 8 -->
    <div class="ods-item">
        <img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-8-2.png" alt="ODS 8">
        <div class="ods-text">
            <h3>ODS 8</h3>
            <p>
                Profissionais ligados à matemática corresponderam a 4,6% do PIB brasileiro, representando
                7,4% dos trabalhadores do país.
            </p>
            <p>
                Estes profissionais possuem média salarial 119% superior à média nacional e altos índices
                de contratos formais.
            </p>
        </div>
    </div>

    <!-- ODS 9 -->
    <div class="ods-item reverse">
        <div class="ods-text">
            <h3>ODS 9</h3>
            <p>
                O tema “Matemática é inovação” reforça a importância da matemática no desenvolvimento
                científico, tecnológico e industrial.
            </p>
            <p>
                Seu impacto é visível em áreas como medicina, indústria, serviços, previsão de chuvas,
                trânsito e infraestrutura urbana.
            </p>
        </div>
        <img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-9-2.png" alt="ODS 9">
    </div>

    <!-- ODS 10 -->
    <div class="ods-item">
        <img src="https://festivaldamatematica.impa.br/wp-content/uploads/2024/05/SDG-10-2.png" alt="ODS 10">
        <div class="ods-text">
            <h3>ODS 10</h3>
            <p>
                O Festival promove inclusão por meio de atividades acessíveis, infraestrutura adequada e
                experiências compatíveis com diferentes públicos.
            </p>
            <p>
                A inclusão é um dos pilares do evento, garantindo diversidade e acesso ao conhecimento.
            </p>
        </div>
    </div>
</section>

        </div>
    </div>
</div>
