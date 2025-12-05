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
    
    </style>
</head>
<body>
    <header>
        <div class="logo">MathQuizz</div>
        <nav>
            <ul id="menu">
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#recursos">Recursos</a></li>
                <li><a href="#criadores">Criadores</a></li>
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
    <section class="section" id="sobre">
        <h2>O que é o MathQuizz?</h2>
        <p>
            O MathQuizz é uma plataforma criada para ajudar estudantes a aprender matemática de forma interativa. Com quizzes dinâmicos, evolução por XP, acompanhamento de desempenho e desafios diários, o aprendizado se torna leve, visual e divertido.
        </p>
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

        <div class="creators-grid">

            <!-- CRIADOR 1 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/Jose.jpg') ?>" alt="Criador 1">
                <div class="creator-name">José Augusto</div>
                <div class="function-creator">Função: Fullstack</div>
                <div class="function-creator">Curso: Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/josé-augusto-937781364" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/Lopez9082" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- CRIADOR 2 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="Criador 2">
                <div class="creator-name">Denise Moraes</div>
                <div class="function-creator">Função: Professora</div>
                <div class="function-creator">Curso: Coordenadora Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/deniaulainfead23" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- CRIADOR 3 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/beatriz.jpeg') ?>" alt="Criador 3">
                <div class="creator-name">Beatrix Ximenes</div>
                <div class="function-creator">Função: Back-end</div>
                <div class="function-creator">Curso: Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/beatriz-ximenes-6b09b4251/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/Beatriz-Ximenes" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- CRIADOR 4 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/') ?>" alt="Criador 4">
                <div class="creator-name">Elivelton Silva</div>
                <div class="function-creator">Função: Back-end</div>
                <div class="function-creator">Curso: Ciência da computação</div>

                <div class="icons">
                    <a class="linkedin" href="https://linkedin.com" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/Eli-th" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="container" id="criadores">
        <h1>Conheça os Integrantes do Grupo de estudo em Matemática</h1>

        <div class="creators-grid">

            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/carlos_eduardo.jpg') ?>" alt="Criador 1">
                <div class="creator-name">CARLOS EDUARDO MELLO COSTA </div>
                <div class="function-creator">Licenciando em Matemática EAD</div>
                <div class="function-creator">Curso: Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/carlos-mello-8879b7216/ " target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes.jpg') ?>" alt="Criador 2">
                <div class="creator-name">Denise Moraes</div>
                <div class="function-creator">Função: Professora</div>
                <div class="function-creator">Curso: Coordenadora Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/denise-moraes-do-nascimento-vieira-4206763b/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/deniaulainfead23" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- CRIADOR 3 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/beatriz.jpeg') ?>" alt="Criador 3">
                <div class="creator-name">Beatrix Ximenes</div>
                <div class="function-creator">Função: Back-end</div>
                <div class="function-creator">Curso: Ciência da computação</div>
                <div class="icons">
                    <a class="linkedin" href="https://www.linkedin.com/in/beatriz-ximenes-6b09b4251/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/Beatriz-Ximenes" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- CRIADOR 4 -->
            <div class="creator-card">
                <img class="creator-img" src="<?= base_url('assets/fotos/') ?>" alt="Criador 4">
                <div class="creator-name">Elivelton Silva</div>
                <div class="function-creator">Função: Back-end</div>
                <div class="function-creator">Curso: Ciência da computação</div>

                <div class="icons">
                    <a class="linkedin" href="https://linkedin.com" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="github" href="https://github.com/Eli-th" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>


    <footer>
        <p>MathQuizz © <?php echo date('Y'); ?> - Todos os direitos reservados</p>
    </footer>

    <script>
        // Função para toggle do menu mobile
        function toggleMenu() {
            const menu = document.getElementById("menu");
            menu.classList.toggle("active");
        }

        // Adicionar event listener para fechar menu ao clicar fora (melhoria de UX)
        document.addEventListener('click', function(event) {
            const menu = document.getElementById("menu");
            const menuBtn = document.querySelector('.menu-btn');
            if (!menu.contains(event.target) && !menuBtn.contains(event.target)) {
                menu.classList.remove("active");
            }
        });

        // Smooth scroll para âncoras (melhoria de navegação)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
                // Fechar menu mobile após clique
                document.getElementById("menu").classList.remove("active");
            });
        });
    </script>
</body>
</html>
