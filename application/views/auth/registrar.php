<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Registrar</title>

<style>
    body {
        background: #f5f7fb;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 420px;
        margin: 60px auto;
        background: #fff;
        padding: 35px;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        animation: fadeIn .4s ease;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    input {
        width: 94%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: .2s;
    }

    input:focus {
        border-color: #007bff;
        box-shadow: 0 0 6px rgba(0,123,255,0.3);
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: #007bff;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: .2s;
    }

    button:hover {
        background: #0056b3;
    }

    .erro {
        background: #ffe5e5;
        color: #b30000;
        padding: 10px;
        text-align: center;
        border-radius: 6px;
        margin-bottom: 15px;
        border: 1px solid #ffb3b3;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

</head>
<body>

<div class="container">
    <h2>Criar conta</h2>

    <?php if($this->session->flashdata('erro')): ?>
        <div class="erro"><?= html_escape($this->session->flashdata('erro')) ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/registrar') ?>">
        <input name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
