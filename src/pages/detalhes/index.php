<?php
    include_once("../../services/connection.php");
    error_reporting(0);
    session_start();
    if(isset($_SESSION['cod_usuario'])){
        $id             = $_GET['id'];
        $conn           = connect();
        $query          = $conn->query("SELECT * FROM produto where cod_produto='$id'");
        $produto        = $query->fetch_assoc();
        $url            = $produto['link_shopee'];
        $tipo_produto   = $produto['tipo_produto'];
        $url_whatsapp   = "https://api.whatsapp.com/send?phone=5548991340393&text=Ooi%2C%20encontrei%20o%20produto%20X%20no%20seu%20site%20e%20tenho%20interesse!"; 
        $similares          = $conn->query("SELECT *  FROM produto where tipo_produto='$tipo_produto'");
        
    }else{
        header('Location: ../login/index.php');
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
        <div class="container-produto">
            <div class="header">
                <nav class="menu">
                    <img src="../../assets/logo.png" class="logo"/>
                    <div class="itens">
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=1">SABONETES</a>
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=2">MANTEIGA CORPORAL</a>
                        <a href="http://localhost/espuma/src/pages/produtos/index.php?id=3">HIDRATANTE LABIAL</a>
                        <a href='../../php/sair.php'>SAIR</a>
                    </div>
                </nav>
            </div>

            <div class="produto-header">
                <img src="<?php echo($produto['foto']) ?>" class="item"/>
                <div class="descricao">
                    <h1 class="titulo"> <?php echo($produto['nome']) ?> </h1>

                    <p class='desc'> DESCRIÇÃO: </p>
                    <p class="detalhes"><?php echo($produto['descricao']) ?></p>
                    <div class="row-final">
                        <p class="preco">R$ <?php echo($produto['preco']) ?></p>
                        <div class="rede-sociais">
                            <p><a href="<?php echo($url) ?>"><img src="../../assets/shopee.png" class="redes"/></a></p>
                            <p><a href="<?php echo($url_whatsapp) ?>"><img src="../../assets/whatsapp.png" class="redes"/></a></p>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="beneficios">
                <p class="ben">BENEFICIOS</p>
                <p><?php echo($produto['beneficio']) ?>
                </p>
            </div>

            <div class="similares">
                <p class="simi">SIMILARES</p>
                <div class="imagens">
                <?php
                    $contador = 0;
                    while($similar =$similares->fetch_assoc() or $contador>4){
                        $contador = $contador + 1;
                        ?>
                        <a href="../detalhes/index.php?id=<?php echo($similar['cod_produto']) ?>">
                            <div class="produto">
                                <img src="<?php echo($similar['foto']) ?>" class="item"/>
                                <div class="descricao">
                                    <p><?php echo($similar['nome']) ?></p>
                                    <p>R$ <?php echo($similar['preco']) ?> </p>
                                </div>
                            </div>
                        </a>
                    <?php 
                    } ?>     
                </div>
            </div>

            
        <footer>
            Desenvolvido por Jhennifer Matias
        </footer>
        </div>

    </body>
</html>