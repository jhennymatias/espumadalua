<?php
    include_once("../../services/connection.php");
    session_start();
    if(isset($_SESSION['cod_usuario'])){
        $conn           = connect();
        $query          = $conn->query("SELECT *  FROM usuario ");
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
                        <a href="#">CLIENTES</a>
                        <a href="../new-product">CADASTRO DE PRODUTOS</a>
                        <a href='../../php/sair.php'>SAIR</a>
                    </div>
                </nav>
            </div>

            <div class="tabela">
            <table border="1">
            <tr>
                <td> Codigo </td>
                <td>Nome</td>
                <td>Contato</td>
                <td>Email</td>
            </tr>
            <?php
            while($dados =$query->fetch_assoc()){?>
                <tr>
                    <td><?php echo($dados['cod_usuario'])?></td>
                    <td><?php echo($dados['nome'])?></td>
                    <td><?php echo($dados['contato'])?></td>
                    <td><?php echo($dados['email'])?></td>
                    <td>Estudante</td>
                </tr>
            <?php 
            }
            ?>            
           
            
        </table>
                    </div>
          
        
            
        </div>

    </body>
</html>