<?php
    include_once("../../services/connection.php");
    
    $id             = $_GET['id'];
    $conn           = connect();
    $query          = $conn->query("SELECT * FROM produto where tipo_produto='$id'");
    $name           = $conn->query("SELECT * FROM tipo_produto where cod_tipo_produto='$id'");
    $nome_tipo      = $name->fetch_assoc();
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
                    <div class="itens">
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=1">SABONETES</a>
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=2">MANTEIGA CORPORAL</a>
                        <a href="#">OLÉOS</a>
                        <a href='../login/index.php'>SAIR</a>
                    </div>
                </nav>
            </div>
            <h1 class="titulo"><?php echo($nome_tipo['descricao']); ?></h1>
            <div class="todos-produtos">
                <?php
                while($dados =$query->fetch_assoc()){?>
                    
                    <?php
                        $url = "../detalhes/index.php?id=".$dados['cod_produto']; 
                    ?>

                    <a href= <?php echo($url) ?>>
                    <div class="produto">
                        <img src="../../assets/cacau.jpg" class="item"/>
                        <div class="descricao">
                            <p> <?php echo($dados['nome']); ?></p>
                            <p> R$ <?php echo($dados['preco']); ?></p>
                        </div>
                    </div>
                </a>
                     
                
                <?php 
                } ?>            
                
            </div>
        
            
        </div>

    </body>
</html>