<?php

$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];

//configuração do banco de dados
require '../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$query_select = "SELECT login FROM usuario WHERE login = '$login'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

if ($logarray == $login) {
    echo"<script language='javascript' type='text/javascript'>"
    . "alert('Esse login já existe');"
    . "window.location.href='cadastroUsuario.html';"
    . "</script>";
    die();
} else {
    $query = "INSERT INTO usuario (login,senha,email) VALUES ('$login','$senha', '$email')";
    $insert = mysqli_query($connect, $query);
    if ($insert) {
        echo"<script language='javascript' type='text/javascript'>"
        . "alert('Usuário cadastrado com sucesso!');"
        . "window.location.href='../index.html';"
        . "</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>"
        . "alert('Não foi possível cadastrar esse usuário');"
        . "window.location.href='cadastroUsuario.html'"
        . "</script>";
    }
}
    
