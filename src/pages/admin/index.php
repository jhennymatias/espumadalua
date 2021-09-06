<?php
    include_once("../../services/connection.php");
    session_start();
    if(isset($_SESSION['cod_usuario']) and ($_SESSION['tipo_usuario'] == 1)  ){
        $conn           = connect();
        $query          = $conn->query("SELECT count(*) as users FROM usuario ");
        $dados =$query->fetch_assoc();
      
        $lgbts          = $conn->query("SELECT count(*) as lgbt FROM usuario where genero!= 1 and genero!= 2");
        $lgbt =$lgbts->fetch_assoc();

        $produtos          = $conn->query("SELECT count(*) as produto FROM produto");
        $produto =$produtos->fetch_assoc();

        $sabonetes          = $conn->query("SELECT count(*) as sabonete FROM produto where tipo_produto=1");
        $sabonete =$sabonetes->fetch_assoc();
        
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
        <div class="container-produtos">
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

            <div class="infos">
                <div class="total-user">
                    <p> Total de usuarios cadastrados: </p> 
                    <h1>
                        <?php  echo($dados['users']); ?>
                    </h1>
                </div>
                <div class="lgbt">
                    <p>Usuarios LGBTs: </p> 
                    <h1>
                        <?php echo($lgbt['lgbt']);  ?>
                    </h1>
                </div>
                <div class="produto">
                    <p>Total de produtos cadastrados: </p> 
                    <h1>
                        <?php echo($produto['produto']);  ?>
                    </h1>
                </div>
                <div class="sabonete">
                    <p>Total de sabonetes cadastrados: </p> 
                    <h1>
                        <?php echo($sabonete['sabonete']);  ?>
                    </h1>
                </div>
            </div>
          
            
            
        </div>
        <footer>
            Desenvolvido por Jhennifer Matias
        </footer>
    </body>
</html>