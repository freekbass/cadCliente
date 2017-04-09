<?php

$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$custo_unitario = $_POST['custo_unitario'];

//configuração do banco de dados
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$query = "INSERT INTO produto (cod_produto,descricao,custo_unitario) "
        . "VALUES ('$codigo','$descricao', '$custo_unitario')";
$insert = mysqli_query($connect, $query);
if ($insert) {
    echo"<script language = 'javascript' type = 'text/javascript'>"
    . "alert('Produto cadastrado com sucesso!');"
    . "window.location.href = '../../inicio.html'"
    . "</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>"
    . "alert('Não foi possível cadastrar esse Produto');"
    . "window.location.href='cadastroProduto.html'"
    . "</script>";
}