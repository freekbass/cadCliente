<?php
#chama o arquivo de configuração com o banco
require '../../conf/bd.php';
$connect = mysqli_connect($host, $user, $password, $database);
$db = mysqli_select_db($connect, $database);
$query = mysqli_query($connect, "SELECT cod_produto, descricao FROM produto");
?>
<label for="">Selecione um produto</label>
<select name="codigoProduto" id="codigoProduto" required>
    <option value="">Selecione...</option>
    <?php while ($row = mysqli_fetch_object($query)) { ?>
        <option value="<?php echo $row->cod_produto ?>">
            <?php echo $row->descricao ?>
        </option>
    <?php } ?>
</select>