<?php
#chama o arquivo de configuração com o banco
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);
$query = mysqli_query($connect, "SELECT cod_cliente, nome_fantasia FROM cliente");
?>
<label for="">Selecione um Cliente</label>
<select name="codigoCliente" id="codigoCliente" required="">
    <option value="">Selecione...</option>
    <?php while ($row = mysqli_fetch_object($query)) { ?>
        <option value="<?php echo $row->cod_cliente ?>">
            <?php echo $row->nome_fantasia ?>
        </option>
    <?php } ?>
</select>