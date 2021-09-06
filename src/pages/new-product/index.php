<?php
    include_once("../../services/connection.php");

    $conn           = connect();
    $query          = $conn->query( "SELECT * FROM tipo_produto");
    error_reporting(0);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Espuma da Lua</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="../../../global.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-cadastro-produto"> 
            <div class="header">
                <nav class="menu">
                    <img src="../../assets/logo.png" class="logo"/>
                    <div class="itens">
                        <a href="../admin">INICIO</a>
                        <a href="../cliente">CLIENTES</a>
                        <a href="../new-product">CADASTRO DE PRODUTOS</a>
                        <a href="../lista-produto">EDITAR E EXCLUIR PRODUTOS</a>
                        <a href='../../php/sair.php'>SAIR</a>
                    </div>
                </nav>
            </div>
            <div class="forms">
                <form  action="../../php/cadastro_produto.php" method="POST" enctype="multipart/form-data">
                <h1>CADASTRO DE PRODUTO</h1>
                <div class="content-forms">
                    
                    <div class="coluna_1">
                        
                        <label>
                            Nome:
                            <input type="text" name="nome" required maxlength="50">
                        </label>
                        <label> Produto:
                            <select value="1" name="tipo_produto">
                                <option value="">Selecione</option>
                                <?php
                                    while($dados =$query->fetch_assoc()){?>
                                        <option value="<?php echo($dados['cod_tipo_produto'])?>"> <?php echo($dados['descricao'])?></option>
                                    <?php 
                                    }
                                ?>
                            </select>
                        </label>
                        <label>
                            Link da Shopee:
                            <input maxlength="100" type="text" name="link_shopee" required>
                        </label>
                    
                        <label>
                                Preco:
                                <input maxlength="9" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" type="text" name="preco" required>
                        </label>
                    </div>
                    <div class="coluna_2">
                        <label>
                            Beneficios:
                            <textarea maxlength="500" type="text" name="beneficios" required></textarea>
                        </label>
                        <label>
                            Descrição:
                            <textarea name="descricao" maxlength="500" type="text" required></textarea>
                        </label>
                        <label>
                            Foto:
                            <input type="file" name="file" id="file" required>
                        </label>
                        
                        
                        
                    </div> 
                </div>   
                <input type="submit" value="Criar" class="btn-criar"/>
                </form>
            </div>
           
        </div>

    </body>
</html>