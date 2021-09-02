<?php
    include_once("../../services/connection.php");
    
    $id             = $_GET['id'];
    $conn           = connect();
    $query          = $conn->query("SELECT * FROM produto where cod_produto='$id'");
    $produto        = $query->fetch_assoc();
    $url            = $produto['link_shopee'];
    $url_whatsapp   = "https://api.whatsapp.com/send?phone=5548991340393&text=Ooi%2C%20encontrei%20o%20produto%20X%20no%20seu%20site%20e%20tenho%20interesse!" 
    //$name           = $conn->query("SELECT * FROM tipo_produto where cod_tipo_produto='$id'");
    //$nome_tipo      = $name->fetch_assoc();
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
        <div class="container-produto">
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

            <div class="produto-header">
                <img src="../../assets/teste.jpg" class="item"/>
                <div class="descricao">
                    <h1 class="titulo"> <?php echo($produto['nome']) ?> </h1>

                    <p class='desc'> DESCRIÇÃO: </p>
                    <p class="detalhes"><?php echo($produto['descricao']) ?></p>
                    <div class="row-final">
                        <p class="preco">R$ <?php echo($produto['preco']) ?></p>
                        <div class="rede-sociais">
                            <p> <a href="<?php echo($url) ?>">Shopee</a></p>
                            <p>><a href="<?php echo($url_whatsapp) ?>">whatsapp</p>
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
                    <a href="../detalhes/index.php">
                        <div class="produto">
                            <img src="../../assets/cacau.jpg" class="item"/>
                            <div class="descricao">
                                <p>Sabonete de Cacau</p>
                                <p>R$ 6,00 </p>
                            </div>
                        </div>
                    </a>
                    <a href="../detalhes/index.php">
                        <div class="produto">
                            <img src="../../assets/cacau.jpg" class="item"/>
                            <div class="descricao">
                                <p>Sabonete de Cacau</p>
                                <p>R$ 6,00 </p>
                            </div>
                        </div>
                    </a>
                    <a href="../detalhes/index.php">
                        <div class="produto">
                            <img src="../../assets/cacau.jpg" class="item"/>
                            <div class="descricao">
                                <p>Sabonete de Cacau</p>
                                <p>R$ 6,00 </p>
                            </div>
                        </div>
                    </a>
                    <a href="../detalhes/index.php">
                        <div class="produto">
                            <img src="../../assets/cacau.jpg" class="item"/>
                            <div class="descricao">
                                <p>Sabonete de Cacau</p>
                                <p>R$ 6,00 </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            
        <footer>
            Desenvolvido por Jhennifer Matias
        </footer>
        </div>

    </body>
</html>