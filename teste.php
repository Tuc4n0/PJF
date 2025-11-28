<?php
$mysqli = new mysqli("localhost", "root", "", "pjf");
if ($mysqli->connect_error) {
    die("Erro: " . $mysqli->connect_error);
} else {
    echo "Conexão OK!";
}
?>