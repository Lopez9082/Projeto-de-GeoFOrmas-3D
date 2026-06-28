<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha | MathGame</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/mathgame-theme/recuperar_senha.css') ?>">

    
</head>

<body>

<div class="login-card">

    <div class="logo">
        <h1>MATHGAME</h1>
        <p>RECUPERAÇÃO DE SENHA</p>
    </div>

    <?php if ($this->session->flashdata('erro')): ?>
        <div class="msg-erro">
            ⚠ <?= html_escape($this->session->flashdata('erro')) ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('sucesso')): ?>
        <div class="msg-success">
            ✔ <?= html_escape($this->session->flashdata('sucesso')) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('recuperacao/solicitar') ?>">

        <label>E-mail cadastrado</label>

        <input
            type="email"
            name="email"
            placeholder="Digite seu e-mail"
            required
        >

        <button type="submit" class="btn btn-primary btn-full">
            ENVIAR LINK DE RECUPERAÇÃO
        </button>

    </form>

    <a href="<?= site_url('auth/login') ?>" class="link-small">
        ← Voltar para o Login
    </a>

</div>

</body>
</html>