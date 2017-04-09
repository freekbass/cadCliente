<?php

$codigoCliente = $_POST['codigoCliente'];
$codigoProduto = $_POST['codigoProduto'];
$quantidade = $_POST['quantidade'];
$precoUnitario = $_POST['precoUnitario'];
$data = $_POST['data'];

//configuração do banco de dados
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$precoTotal = $precoUnitario * $quantidade;

$query = "INSERT INTO pedido (cod_cliente,cod_produto,quantidade,preco_unitario,preco_total,data) "
        . "VALUES ('$codigoCliente','$codigoProduto','$quantidade','$precoUnitario','$precoTotal','$data')";
$insert = mysqli_query($connect, $query);
if ($insert) {
    echo"<script language = 'javascript' type = 'text/javascript'>"
    . "alert('Pedido cadastrado com sucesso!');"
    . "window.location.href = '../../inicio.html'"
    . "</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>"
    . "alert('Não foi possível cadastrar esse Pedido');"
    . "window.location.href='cadastroPedido.php'"
    . "</script>";
}
