<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.seuprovedor.com';
$config['smtp_user'] = 'no-reply@seusite.com';
$config['smtp_pass'] = 'SENHA_SMTP';
$config['smtp_port'] = 587;
$config['smtp_crypto'] = 'tls'; // ou 'ssl' se necessário
$config['mailtype'] = 'text';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;
