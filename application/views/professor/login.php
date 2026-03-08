<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Login do Professor — MathGame</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('assets/css/mathgame.css') ?>">

<style>

body{

background:#07090f;

display:flex;
align-items:center;
justify-content:center;

min-height:100vh;

font-family:var(--font-main);

}

/* card */

.login-card{

width:420px;

padding:40px;

background:rgba(10,12,18,.95);

border-radius:var(--radius);

border:1px solid rgba(255,0,200,.3);

box-shadow:

0 0 25px rgba(255,0,200,.15);

}

/* titulo */

.login-title{

text-align:center;

font-family:var(--font-display);

font-size:1rem;

letter-spacing:.15em;

color:var(--neon-pink);

text-shadow:var(--glow-pink);

margin-bottom:4px;

}

.login-sub{

text-align:center;

font-family:var(--font-mono);

font-size:.65rem;

color:var(--text-dim);

letter-spacing:.2em;

margin-bottom:30px;

}

/* label */

label{

font-family:var(--font-mono);

font-size:.7rem;

color:var(--text-dim);

display:block;

margin-bottom:6px;

}

/* input */

input{

width:100%;

padding:12px;

margin-bottom:18px;

background:#0c0f17;

border:1px solid rgba(255,255,255,.08);

border-radius:var(--radius);

color:var(--text);

font-family:var(--font-mono);

}

input:focus{

outline:none;

border-color:var(--neon-cyan);

box-shadow:0 0 10px rgba(0,245,255,.35);

}

/* botão */

.btn-login{

width:100%;

padding:14px;

border:none;

border-radius:var(--radius);

font-family:var(--font-display);

letter-spacing:.15em;

font-size:.8rem;

cursor:pointer;

background:linear-gradient(135deg,var(--neon-pink),var(--neon-purple));

color:#fff;

box-shadow:var(--glow-pink);

transition:.2s;

}

.btn-login:hover{

transform:translateY(-1px);

box-shadow:

0 0 12px rgba(255,0,200,.6),
0 0 20px rgba(191,0,255,.4);

}

/* link */

.login-back{

display:block;

text-align:center;

margin-top:18px;

font-family:var(--font-mono);

font-size:.7rem;

color:var(--text-dim);

text-decoration:none;

}

.login-back:hover{

color:var(--neon-cyan);

}

</style>

</head>

<body>

<div class="login-card">

<div class="login-title">ACESSO PROFESSOR</div>
<div class="login-sub">// ÁREA RESTRITA</div>

<?php if ($this->session->flashdata('erro')): ?>
<div class="msg-erro">
⚠ <?= html_escape($this->session->flashdata('erro')) ?>
</div>
<?php endif; ?>

<form method="post" action="<?= site_url('professor/login') ?>">

<label>E-mail</label>

<input type="email" name="email" placeholder="professor@unig.edu.br" required>

<label>Senha</label>

<input type="password" name="senha" placeholder="••••••••" required>

<button type="submit" class="btn-login">
ENTRAR ►
</button>

</form>

<a class="login-back" href="<?= site_url('auth/login') ?>">
← Login de aluno
</a>

</div>

</body>
</html>