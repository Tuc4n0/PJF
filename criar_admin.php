<?php
require __DIR__ . "/includes/db.php";

$usuario = "admin";
$senha = "1234";

// Gera o hash da senha
$hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$hash')";

if ($conn->query($sql)) {
    echo "Usuário admin criado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}
