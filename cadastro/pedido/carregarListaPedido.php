<?php
$codigoPedido = isset($_POST['codigoPedido']) ? $_POST['codigoPedido'] : "";

#chama o arquivo de configuração com o banco
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);
$select = "select pedido.cod_pedido,  cliente.nome_fantasia, produto.descricao, pedido.quantidade, pedido.preco_unitario, pedido.preco_total, pedido.data
from pedido 
left join cliente on cliente.cod_cliente=pedido.cod_cliente
left join produto on produto.cod_produto=pedido.cod_produto";
$query = mysqli_query($connect, $select);
?>

<table class="tg">
    <tr>
        <th class="tg-9hbo">Código Pedido</th>
        <th class="tg-9hbo">Cliente</th>
        <th class="tg-9hbo">Produto</th>
        <th class="tg-9hbo">Quantidade</th>
        <th class="tg-9hbo">Preço Unitário</th>
        <th class="tg-9hbo">Total</th>
        <th class="tg-9hbo">Data</th>
        <th class="tg-9hbo">Remover</th>
    </tr>
    <?php while ($row = mysqli_fetch_object($query)) { ?>
        <tr>
            <td class="tg-yw4l"><?php echo $row->cod_pedido ?></td>
            <td class="tg-yw4l"><?php echo $row->nome_fantasia ?></td>
            <td class="tg-yw4l"><?php echo $row->descricao ?></td>
            <td class="tg-yw4l"><?php echo $row->quantidade ?></td>
            <td class="tg-yw4l"><?php echo $row->preco_unitario ?></td>
            <td class="tg-yw4l"><?php echo $row->preco_total ?></td>
            <td class="tg-yw4l"><?php
                $date = date_create($row->data);
                echo date_format($date, 'd/m/Y');
                ?></td>
            <td class="tg-yw4l">
                <a href="#">
                    <img src="../../css/icone/delete.png" 
                         style="width:16px;height:16px;"/> 
                </a>
            </td>
        </tr>
    <?php } ?>
</table>



