<?php

$nomeFantasia = $_POST['nomeFantasia'];
$cnpj = $_POST['cnpj'];
$telefone = $_POST['telefone'];

//configuração do banco de dados
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$query_select = "SELECT cnpj FROM cliente WHERE cnpj = '$cnpj'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$cnpjArray = $array['cnpj'];

if ($cnpjArray == $cnpj) {
    echo"<script language='javascript' type='text/javascript'>"
    . "alert('Esse CNPJ já existe');"
    . "window.location.href='cadastroCliente.html';"
    . "</script>";
    die();
} else {
    $query = "INSERT INTO cliente (nome_fantasia,cnpj,telefone) VALUES ('$nomeFantasia','$cnpj', '$telefone')";
    $insert = mysqli_query($connect, $query);
    if ($insert) {
        echo"<script language = 'javascript' type = 'text/javascript'>"
        . "alert('Cliente cadastrado com sucesso!');"
        . "window.location.href = '../../inicio.html'"
        . "</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>"
        . "alert('Não foi possível cadastrar esse cliente');"
        . "window.location.href='cadastroCliente.html'"
        . "</script>";
    }
}