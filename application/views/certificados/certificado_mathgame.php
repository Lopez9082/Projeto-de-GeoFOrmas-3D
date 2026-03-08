<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">

<style>
  body{
    font-family: 'Arial', sans-serif;
    background: #05060c;
    color:#fff;
  }

  .certificado{
    border: 6px solid #00f5ff;
    padding: 40px;
    text-align: center;
    position: relative;
  }

  .logo{
    width: 160px;
    height: 160px;
    border-radius: 50%;
    border: 6px solid #00f5ff;
    margin: 0 auto 25px auto;
    box-shadow: 0 0 30px #00f5ff;
  }

  h1{
    font-size: 34px;
    letter-spacing: 4px;
    margin-bottom: 10px;
  }

  h2{
    font-size: 26px;
    color:#00f5ff;
    margin: 20px 0;
  }

  p{
    font-size: 16px;
    color:#ccc;
  }

  .nome{
    font-size: 28px;
    color:#a855f7;
    margin: 25px 0;
    font-weight: bold;
  }

  .xp{
    margin-top: 20px;
    font-size: 14px;
    letter-spacing: 2px;
  }

  .footer{
    margin-top: 40px;
    font-size: 12px;
    color:#888;
  }
</style>
</head>

<body>
  <div class="certificado">

    <img src="<?= $logo ?>" class="logo">

    <h1>CERTIFICADO</h1>
    <p>O MathGame certifica que</p>

    <div class="nome"><?= html_escape($nome) ?></div>

    <p>
      Concluiu com êxito os desafios matemáticos do laboratório,<br>
      alcançando a pontuação necessária para desbloqueio deste certificado.
    </p>

    <h2>🏆 Certificado de Mérito Matemático</h2>

    <div class="xp">
      XP TOTAL: <?= (int)$xp ?> XP
    </div>

    <div class="footer">
      Projeto UNIG · Iniciação Científica 2024<br>
      Plataforma MathGame
    </div>

  </div>
</body>
</html>