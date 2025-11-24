<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Professor</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f7;
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 250px;
            background: #1e2a38;
            height: 100vh;
            color: #fff;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            box-shadow: 3px 0 10px rgba(0,0,0,0.2);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 22px;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: #cfd9e4;
            text-decoration: none;
            font-size: 16px;
            border-left: 4px solid transparent;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #314154;
            color: #fff;
            border-left: 4px solid #4fa3ff;
        }

        .sidebar a i {
            margin-right: 8px;
        }

        /* ===== CONTEÚDO ===== */
        .conteudo {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
        }

        .top-header {
            background: #2d6cdf;
            color: #fff;
            padding: 18px 25px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .top-header h1 {
            margin: 0;
            font-size: 26px;
        }

    </style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h2>👨‍🏫 Professor</h2>

    <a href="<?= site_url('professor/dashboard') ?>"><i>🏠</i> Início</a>
    <a href="<?= site_url('professor/questoes') ?>"><i>📝</i> Questões</a>
   <!-- <a href="<?= site_url('professor/historico') ?>"><i>📊</i> Histórico</a>-->
    <a href="<?= site_url('professor/logout') ?>"><i>❌</i> Sair</a>
</div>

<!-- ===== CONTEÚDO ===== -->
<div class="conteudo">

    <div class="top-header">
        <h1>Painel do Professor</h1>
    </div>
    
