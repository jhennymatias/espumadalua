<?php
    include_once("../../services/connection.php");

    $conn           = connect();
    $id             = $_GET['id'];
    $produto        = $conn->query( "SELECT * FROM produto where cod_produto=$id");
    $produto_info   = $produto->fetch_assoc();
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
        <div class="container-edita-produto"> 
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
                <h1>EDITAR PRODUTO</h1>
                <div class="content-forms">
                    
                    <div class="coluna_1">
                        
                        <label>
                            Nome:
                            <input type="text" name="nome" value='<?php echo($produto_info['nome'])?>'required>
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
                            <input type="text" name="link_shopee" value='<?php echo($produto_info['link_shopee'])?>' required>
                        </label>
                    
                        <label>
                                Preco:
                                <input type="text" name="preco" value='<?php echo($produto_info['preco'])?>'required>
                        </label>
                        
                        <div class="links">
                            
                        </div>
                    </div>
                    <div class="coluna_2">
                        <label>
                            Beneficios:
                            <textarea type="text" name="beneficios" required><?php echo($produto_info['beneficio'])?></textarea>
                        </label>
                        <label>
                            Descrição:
                            <textarea name="descricao" type="text" required ><?php echo($produto_info['descricao'])?></textarea>
                        </label>
                        <label>
                            Foto:
                            <img src="<?php echo($produto_info['foto'])?>" width="40rem"/>
                            <input type="file" name="file" id="file" value="<?php echo($produto_info['foto'])?>"required>
                        </label>
                        
                        
                        
                    </div> 
                </div>   
                <input type="submit" value="Editar" class="btn-criar"/>
                </form>
            </div>
           
        </div>

    </body>
</html>