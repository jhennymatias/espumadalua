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
                <form>
                <h1> CADASTRO </h1>
                    <label>
                        Nome:
                        <input type="text" required>
                    </label>
                    <label> Gênero:
                        <select value="1">
                            <option value="">Selecione</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </label>
                    <label>
                        Email:
                        <input type="email" required>
                    </label>
                    <label>
                        Senha:
                        <input type="password" required>
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