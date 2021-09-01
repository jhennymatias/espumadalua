<?php
    include_once("../../services/connection.php");

    $conn           = connect();
    $query          = $conn->query( "SELECT * FROM genero");
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
        <div class="container-cadastro"> 
            <div class="forms">
                <form action="../../php/cadastro.php" method="POST">
                <h1> CADASTRO </h1>
                    <?php 
                        if ($_GET['mensagem']){
                        ?>      <p class="alert-error"><?php echo($_GET['mensagem']); ?>  </p>
                    <?php } ?>
                    <label>
                        Nome:
                        <input name="nome" type="text" required>
                    </label>
                            
                    <label> Gênero:
                        <select name="genero" value="1">
                            <option value="">Selecione</option>
                            <?php 

                                while($dados =$query->fetch_assoc()){?>
                                    <option value="<?php echo($dados['cod_genero'])?>"> <?php echo($dados['descricao'])?></option>
                                <?php 
                                }
                            ?>
                        </select>
                    </label>
                    <label>
                        Email:
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        Senha:
                        <input type="password" name="senha" required>
                    </label>
                    <input type="submit" value="Criar" class="btn-criar"/>
                    <div class="links">
                        <a href="../login/index.php">Já possui uma conta?</a>
                    </div>
                </form>
            </div>
            <img src="../../assets/login.jpg" class="img-cadastro"/>
        </div>

    </body>
</html>