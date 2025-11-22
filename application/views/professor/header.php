<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Professor</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; }
        header {
            background: #2d6cdf;
            padding: 15px;
            color: #fff;
        }
        nav a {
            color: #fff;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover { text-decoration: underline; }
        .conteudo {
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <h2>Painel do Professor</h2>

    <nav>
        <a href="<?= site_url('professor/dashboard') ?>">🏠 Início</a>
        <a href="<?= site_url('professor/questoes') ?>">📝 Questões</a>
        <a href="<?= site_url('professor/logout') ?>">❌ Sair</a>
    </nav>
</header>

<div class="conteudo">
