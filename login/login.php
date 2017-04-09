<?php

//configuração do banco de dados
require '../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = $_POST['senha'];
$entrar = $_POST['entrar'];

if (isset($entrar)) {
    $verifica = mysqli_query($connect, "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    if (mysqli_num_rows($verifica) <= 0) {
        echo"<script language='javascript' type='text/javascript'>"
        . "alert('Login e/ou senha incorretos');"
        . "window.location.href='../index.html';"
        . "</script>";
        die();
    } else {
        setcookie("login", $login);
        header("Location:../inicio.html");
    }
}
