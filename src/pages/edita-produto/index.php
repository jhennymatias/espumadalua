<?php
    include_once("../../services/connection.php");
    error_reporting(0);

    $conn           = connect();
    $id             = $_GET['id'];
    $produto        = $conn->query( "SELECT * FROM produto where cod_produto=$id");
    $produto_info   = $produto->fetch_assoc();
    $query          = $conn->query( "SELECT * FROM tipo_produto");
    
    if($_GET['message']){
        ?>
        <script>alert("Erro ao atualziar devido a tentativa de XSS!")</script><?php
    }
    

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
                <form  action="../../php/edita_produto.php?id=<?php echo($produto_info['cod_produto'])?>" method="POST" enctype="multipart/form-data">
                <h1>EDITAR PRODUTO</h1>
                <div class="content-forms">
                    
                    <div class="coluna_1">
                        
                        <label>
                            Nome:
                            <input type="text" maxlength="50" name="nome" value='<?php echo($produto_info['nome'])?>'required>
                        </label>
                        <label> Produto:
                            <select value="1" name="tipo_produto">
                                <option value="">Selecione</option>
                                <?php
                                    while($dados =$query->fetch_assoc()){?>
                                        <option 
                                            <?php 
                                                if($dados['cod_tipo_produto'] == $produto_info['tipo_produto']){ 
                                                    echo('selected');
                                                } ?> 
                                        value="<?php echo($dados['cod_tipo_produto'])?>"> <?php echo($dados['descricao']);?> </option>
                                    <?php 
                                    }
                                ?>
                            </select>
                        </label>
                        <label>
                            Link da Shopee:
                            <input type="text" maxlength="100" name="link_shopee" value='<?php echo($produto_info['link_shopee'])?>' required>
                        </label>
                    
                        <label>
                                Preço:
                                <input type="text" maxlength="9" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="preco" value='<?php echo($produto_info['preco'])?>'required>
                        </label>
                        
                        <div class="links">
                            
                        </div>
                    </div>
                    <div class="coluna_2">
                        <label>
                            Beneficios:
                            <textarea type="text" pattern="[a-zA-Z0-9]+" maxlength="500" name="beneficios" required><?php echo(strip_tags($produto_info['beneficio'], '</br>'))?></textarea>
                        </label>
                        <label>
                            Descrição:
                            <textarea name="descricao" maxlength="500" pattern="[a-zA-Z0-9]+" type="text" required ><?php echo(strip_tags($produto_info['descricao'], '</br>'))?></textarea>
                        </label>
                        <label>
                            Foto:
                            <img src="<?php echo($produto_info['foto'])?>" width="40rem"/>
                            <input type="file"  name="file" accept="image/*" id="file" value="c:/passwords.txt"/>
                        </label>
                        
                        
                        
                    </div> 
                </div>   
                <input type="submit" value="Editar" class="btn-criar"/>
                </form>
            </div>
           
        </div>

    </body>
</html>