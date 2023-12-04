<?php
$usuario = "root";
$senha = "";
$database = "test";
$host = "localhost";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die('falha ao se conectar ao banco de dados' . $mysqli->error);
}

