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
    color: #fff;
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
    </style>
</head>

<body>

    <div class="container">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes') ?>" alt="Denise Moraes">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/') ?>" alt="Beatrix Ximenes">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/Elivelton') ?>" alt="Elivelton Silva">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/JORGE') ?>" alt="JORGE LESSA BATISTA DA SILVA JUNIOR">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/ROSILENE') ?>" alt="ROSILENE QUEIROZ DA SILVA ZEN">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/THALIA') ?>" alt="THALIA MARTHA DA SILVA GOMES">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/carlos_eduardo') ?>" alt="CARLOS EDUARDO MELLO COSTA">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/SARA') ?>" alt="SARA PORTE DE SOUZA DOS SANTOS">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/ROBERTA') ?>" alt="ROBERTA BARBOZA DE SOUZA DA SILVA">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/GABRIELLY') ?>" alt="GABRIELLY COELHO DA CUNHA">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/VICTORIA') ?>" alt="VICTÓRIA ADRIELLE GONÇALVES DA SILVA">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/MARCOS') ?>" alt="MARCOS CRUZ DE AZEVEDO">
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
                    <img class="creator-img" src="<?= base_url('assets/fotos/Denise_Moraes') ?>" alt="DENISE MORAES">
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
        <div
   <section class="ods-festival fade-in">
    <h1>ODS que o Festival abraça</h1>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.creator-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => {
                observer.observe(card);
            });

            // Adicionar tooltips ou efeitos extras se necessário
            const icons = document.querySelectorAll('.icons a');
            icons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.2) rotate(10deg)';
                });
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0deg)';
                });
            });
        });
    </script>

</body>

</html>