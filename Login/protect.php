<?php
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['id'])) {
    die('Você não está logado');
    header('Location: index.php');
    exit;
}
?>