<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MathQuizz - Início</title>

    <style>
        /* ------------------ RESET ------------------ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #222;
            overflow-x: hidden;
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
            color: #0066ff;
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
            transition: 0.3s;
        }

        nav ul li a:hover {
            color: #0066ff;
        }

        .btn-primary {
            padding: 10px 18px;
            background: #0066ff;
            color: white !important;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0050d3;
        }

        /* MOBILE MENU */
        .menu-btn {
            display: none;
            font-size: 30px;
            cursor: pointer;
        }

        @media (max-width: 820px) {
            nav ul {
                position: fixed;
                top: 0;
                right: -100%;
                width: 60%;
                height: 100%;
                background: #fff;
                flex-direction: column;
                padding-top: 100px;
                gap: 40px;
                transition: 0.4s;
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
        }

        .hero-text {
            max-width: 550px;
        }

        .hero-text h1 {
            font-size: 48px;
            font-weight: 700;
            color: #222;
        }

        .hero-text p {
            margin-top: 10px;
            font-size: 18px;
            color: #555;
        }

        .hero-btns {
            margin-top: 25px;
        }

        .hero-btns a {
            padding: 12px 22px;
            background: #0066ff;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 10px;
            font-weight: 600;
        }

        .hero img {
            width: 450px;
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
            }
            .hero img {
                width: 320px;
            }
        }

        /* ------------------ SOBRE ------------------ */
        .section {
            padding: 80px 40px;
            text-align: center;
        }

        .section h2 {
            font-size: 34px;
            margin-bottom: 20px;
            color: #222;
        }

        .section p {
            max-width: 800px;
            margin: auto;
            color: #555;
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
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #0066ff;
        }

        /* ------------------ FOOTER ------------------ */
        footer {
            padding: 40px;
            text-align: center;
            background: #fff;
            margin-top: 40px;
            box-shadow: 0 -3px 10px rgba(0,0,0,0.06);
        }

        footer p {
            color: #666;
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
            <li><a class="btn-primary" href="<?= site_url('auth/login') ?>">Fazer Login</a></li>
        </ul>
    </nav>

    <div class="menu-btn" onclick="toggleMenu()">☰</div>
</header>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Aprenda Matemática Jogando!</h1>
        <p>O MathQuizz transforma exercícios matemáticos em desafios divertidos, com sistema de XP,
            níveis, ranking e painel exclusivo para estudantes.</p>

        <div class="hero-btns">
            <a href="<?= site_url('quizzes/index') ?>">Começar Quiz</a>
        </div>
    </div>

    <img src="https://img.freepik.com/vetores-premium/icone-de-simbolos-matematicos_1186366-125286.jpg" alt="Math Image">
</section>

<!-- SOBRE -->
<section class="section" id="sobre">
    <h2>O que é o MathQuizz?</h2>
    <p>
        O MathQuizz é uma plataforma criada para ajudar estudantes a aprender matemática
        de forma interativa. Com quizzes dinâmicos, evolução por XP,
        acompanhamento de desempenho e desafios diários,
        o aprendizado se torna leve, visual e divertido.
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

<footer>
    <p>MathQuizz © 2025 - Todos os direitos reservados</p>
</footer>

<script>
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("active");
    }
</script>

</body>
</html>
