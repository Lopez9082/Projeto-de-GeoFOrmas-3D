<?php
echo "<h1>Erro PHP</h1>";
echo "<p>Ocorreu um erro na aplicação.</p>";

if (isset($message)) {
    echo "<pre>$message</pre>";
}