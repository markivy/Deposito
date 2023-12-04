<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha o campo email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha o campo senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die('FALHA NA EXECUÇÃO DA QUERY: ' . $mysqli->error);
        $ammount = $sql_query->num_rows;

        if($ammount == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];

            header('Location: painel.php');
        } else {
            echo "Usuário ou senha incorretos";
        }}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <H1>ACESSE SUA CONTA</H1>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="Username" required>
        <input type="password" name="senha" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
    
</body>
</html>