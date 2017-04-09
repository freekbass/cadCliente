<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Cliente</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/cadCliente/css/css.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="../../js/validarCnpj.js"></script>
    </head>
    <body>
        <div class="login-page">
            <div class="form" style="max-width: fit-content !important;">
                <form class="login-form" method="POST" action="listagemPedido.php">
                    <input  type="number" placeholder="Codigo do Pedido" name="codigoPedido" id="codigoPedido">
                    <input  type="text" placeholder="Cliente" name="cliente" id="cliente">
                    <input  type="text" placeholder="Produto" name="produto" id="produto">
                    <input  type="date" placeholder="Data" name="data" id="data">
                    <button style="width: 200px;">Pesquisar</button>
                    <p></p>
                </form>
                <?php
                $codigoPedido = isset($_POST['codigoPedido']) ? $_POST['codigoPedido'] : NULL;
                $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : NULL;
                $produto = isset($_POST['produto']) ? $_POST['produto'] : NULL;
                $data = isset($_POST['data']) ? $_POST['data'] : NULL;

                #chama o arquivo de configuração com o banco
                require '../../conf/bd.php';
                $db = new PDO("mysql:host=$host;dbname=$database;", $user, $password);

                $select = "select pedido.cod_pedido,  cliente.nome_fantasia, produto.descricao, pedido.quantidade, pedido.preco_unitario, pedido.preco_total, pedido.data
                           from pedido 
                           left join cliente on cliente.cod_cliente=pedido.cod_cliente
                           left join produto on produto.cod_produto=pedido.cod_produto";

                $filters = [];
                if ($codigoPedido != null) {
                    $filters[] = "pedido.cod_pedido = $codigoPedido";
                }
                if ($cliente != null) {
                    $filters[] = "cliente.nome_fantasia  LIKE '%$cliente%'";
                }
                if ($produto != null) {
                    $filters[] = "produto.descricao  LIKE '%$produto%'";
                }
                if ($data != null) {
                    $filters[] = "pedido.data  = '$data'";
                }
                $where = " where 1 = 1";
                foreach ($filters as $filter) {
                    $where .= " and " . $filter;
                }
                $stmt = $db->prepare($select . $where);
//                echo debug_backtrace();
                $stmt->execute();
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
                    <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
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
                                <a href="removerPedido.php?codigoPedido=<?php echo $row->cod_pedido ?>"
                                   onclick="return confirm('Are you sure you want to delete?');">
                                    <img src="../../css/icone/delete.png" 
                                         style="width:16px;height:16px;"/> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <a href="../../inicio.html">Voltar</a>
            </div>
        </div>
    </body>
</html>