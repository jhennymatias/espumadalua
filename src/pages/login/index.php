<?php
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
        <div class="container-login">
            <img src="../../assets/login.jpg" class="img-login"/>
            
            <div class="forms">
                <form action="../../php/login.php" method="POST">
                <h1> LOGIN </h1>
                    <label>
                        Email:
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        Senha:
                        <input type="password" name="senha" required>
                    </label>
                    
                    <?php 
                        if ($_GET['mensagem']){
                        ?>      <p class="alert-error"><?php echo($_GET['mensagem']); ?>  </p>
                    <?php } ?>

                    <input type="submit" value="Enviar" class="btn-enviar"/>
                    <div class="links">
                        <a href="../esqueci-senha/index.php">Esqueci a minha senha</a>
                        <a href="../create/index.php">Quer criar uma conta?</a>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>

