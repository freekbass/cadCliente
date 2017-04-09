<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Cliente</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/cadCliente/css/css.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="../../js/validarAnoBissexto.js"></script>
        <script src="../../js/validarCnpj.js"></script>
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="POST" action="salvarPedido.php"
                      onsubmit="validarAnoBissexto(data)">
                          <?php require './selectProduto.php' ?>
                    <p/>
                    <?php require './selectCliente.php' ?>
                    <input type="number"  placeholder="Quantidade" name="quantidade" id="quantidade" step="0.01" required/>
                    <input type="number"  placeholder="Preço Unitario" name="precoUnitario" id="precoUnitario" step="0.01" required/>
                    <input type="date"  placeholder="Data" name="data" id="data" required/>
                    <button value="entrar" id="entrar" name="entrar">Salvar</button>
                </form>
                <a href="../../inicio.html">Voltar</a>
            </div>
        </div>
    </body>
</html>