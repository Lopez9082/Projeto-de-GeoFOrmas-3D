<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - App Matemática</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: Inter, Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
            padding: 20px;
        }

        /* Container */
        .login-card {
            width: 100%;
            max-width: 370px;
            background: #ffffffdd;
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Título */
        .login-card h2 {
            margin-bottom: 18px;
            font-size: 26px;
            text-align: center;
            color: #1e3a8a;
            font-weight: 600;
        }

        /* Inputs */
        .input {
            width: 100%;
            padding: 14px;
            margin-bottom: 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            transition: 0.2s;
            font-size: 15px;
            background: #fff;
        }

        .input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.15);
            outline: none;
        }

        /* Botão */
        .btn {
            width: 100%;
            padding: 14px;
            background: #2563eb;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.25s;
        }

        .btn:hover {
            background: #1e40af;
        }

        .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        /* Links */
        .link-small {
            text-align: center;
            margin-top: 12px;
            display: block;
            color: #1e3a8a;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .link-small:hover {
            text-decoration: underline;
        }

        /* Mensagem de erro/sucesso */
        .msg-erro, .msg-success {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 14px;
            font-size: 14px;
            text-align: center;
        }

        .msg-erro {
            background: #fee2e2;
            color: #b91c1c;
        }

        .msg-success {
            background: #d1fae5;
            color: #065f46;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .login-card { padding: 20px; max-width: 100%; }
        }
    </style>
</head>
<body>
    <?php
    // Verificação: Se usuário já estiver logado, redirecionar para dashboard
    if ($this->session->userdata('logado')) {
        if ($this->session->userdata('role') === 'professor') {
            redirect('questoes');
        } else {
            redirect('dashboard'); // Ou ajuste para sua rota inicial
        }
    }
    ?>

    <div class="login-card">
        <h2>Entrar</h2>

        <!-- Mensagens de Flashdata -->
        <?php if ($this->session->flashdata('erro')): ?>
            <div class="msg-erro"><?php echo html_escape($this->session->flashdata('erro')); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="msg-success"><?php echo html_escape($this->session->flashdata('success')); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('auth/autenticar'); ?>">
            <input class="input" type="email" name="email" placeholder="E-mail" required aria-label="E-mail">
            <input class="input" type="password" name="senha" placeholder="Senha" required aria-label="Senha">
            <button class="btn" type="submit">Entrar</button>
        </form>

        <a class="link-small" href="<?php echo site_url('registrar'); ?>">Criar conta</a>
        <a class="link-small" href="<?php echo site_url('recuperar-senha'); ?>">Esqueci minha senha</a>
    </div>
</body>
</html>