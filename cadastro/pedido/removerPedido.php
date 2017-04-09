<?php

$codigoPedido = $_GET['codigoPedido'];

//configuração do banco de dados
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);

$query = "DELETE FROM pedido WHERE cod_pedido=$codigoPedido";
$delete = mysqli_query($connect, $query);
if ($delete) {
    echo"<script language = 'javascript' type = 'text/javascript'>"
    . "alert('Pedido removido com Sucesso!');"
    . "window.location.href = 'listagemPedido.php';"
    . "</script>";
} else {
    echo debug_backtrace();
    echo"<script language='javascript' type='text/javascript'>"
    . "alert('Não foi possivel remover esse Pedido');"
    . "window.location.href='listagemPedido.php';"
    . "</script>";
}
