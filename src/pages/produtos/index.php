<?php
    include_once("../../services/connection.php");
    session_start();
    if(isset($_SESSION['cod_usuario'])){
        $id             = $_GET['id'];
        $conn           = connect();
        $query          = $conn->query("SELECT * FROM produto where tipo_produto='$id'");
        $name           = $conn->query("SELECT * FROM tipo_produto where cod_tipo_produto='$id'");
        $nome_tipo      = $name->fetch_assoc();    
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
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=1">SABONETES</a>
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=2">MANTEIGA CORPORAL</a>
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=3">HIDRATANTE LABIAL</a>
                        <a href='../../php/sair.php'>SAIR</a>
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
                        <img src="<?php echo($dados['foto']); ?>" class="item"/>
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