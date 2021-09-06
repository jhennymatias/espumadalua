<?php
    include_once("../../services/connection.php");
    session_start();
    if(isset($_SESSION['cod_usuario'])){
        $conn           = connect();
        $query          = $conn->query("SELECT *  FROM produto ");
    }else{
        header('Location: ../login/index.php');
    }
    
    //error_reporting(0);
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
        <div class="container-lista-produtos">
            <div class="header">
                <nav class="menu">
                    <img src="../../assets/logo.png" class="logo"/>
                    <p> Bem-Vinda <?php echo($_SESSION['nome_usuario'])?></p>
           
                    <div class="itens">
                        <a href="../admin">INICIO</a>
                        <a href="../cliente">CLIENTES</a>
                        <a href="../new-product">CADASTRO DE PRODUTOS</a>
                        <a href="../lista-produto">EDITAR E EXCLUIR PRODUTOS</a>
                        <a href='../../php/sair.php'>SAIR</a>
                    </div>      
                </nav>
            </div>

            <div class="tabela">
            <h1> PRODUTOS </h1>
            <table class="tabela_estrutura">
            <tr>
                <td> Codigo </td>
                <td>Nome</td>
                <td>Descrição</td>
                <td>Beneficios</td>
                <td>Link Shopee</td>
                <td>Foto</td>
                <td>Preço</td>
                <td>Ações</td>
            </tr>
            <?php
            while($dados =$query->fetch_assoc()){
                $descricoa = mb_strimwidth($dados['descricao'], 0, 50, "...");
                $beneficio = mb_strimwidth($dados['beneficio'], 0, 25, "...");
                
                ?>
                <tr>
                    <td><?php echo($dados['cod_produto'])?></td>
                    <td><?php echo($dados['nome'])?></td>
                    <td ><?php echo($descricoa)?></td>
                    <td><?php echo($beneficio)?></td>
                    <td>
                        <a href='<?php echo($dados['link_shopee'])?>' target="new_blank">
                            <img src="../../assets/link.png" width="25rem" title="Excluir" />
                        </a>
                    </td>
                    <td><img width="50rem" src="<?php echo($dados['foto'])?>"></td>
                    <td><?php echo($dados['preco'])?></td>
                    <td>
                        <a href="../edita-produto?id=<?php echo($dados['cod_produto'])?>">
                            <img src="../../assets/edit.png" width="25rem" title="Editar"/>
                        </a> 
                        
                        <a href="../../php/excluir_produto?id=<?php echo($dados['cod_produto'])?>">
                            <img src="../../assets/delete.png" width="25rem" title="Excluir" />
                        </a>
                    </td>
                </tr>
            <?php 
            }
            ?>            
           
            
        </table>
                    </div>
          
        
            
        </div>

    </body>
</html>