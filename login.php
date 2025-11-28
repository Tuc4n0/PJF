<?php
session_start(); // inicia a sessão aqui, não no db.php
require __DIR__ . "/includes/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $conn->real_escape_string($_POST["user"]);
    $pass = $_POST["pass"];

    $sql = "SELECT id, senha FROM usuarios WHERE usuario = '$user'";
    $res = $conn->query($sql);

    if($res->num_rows == 1){
        $row = $res->fetch_assoc();
        if(password_verify($pass, $row["senha"])){
            $_SESSION["logado"] = true;
            $_SESSION["user_id"] = $row["id"];
            header("Location: index.php");
            exit;
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>
<form method="POST">
    <h2>Login</h2>
    <input type="text" name="user" placeholder="Usuário" required><br><br>
    <input type="password" name="pass" placeholder="Senha" required><br><br>
    <button type="submit">Entrar</button>
</form>

<?php if(isset($erro)) echo $erro; ?>
