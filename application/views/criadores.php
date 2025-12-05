<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criadores - MathQuizz</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
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

    <div class="container">
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
                <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes') ?>" alt="Criador 2">
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
                <img class="creator-img" src="<?= base_url('assets/fotos/') ?>" alt="Criador 3">
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

</body>

</html>