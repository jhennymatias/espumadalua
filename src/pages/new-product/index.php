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
        <div class="container-cadastro-produto"> 
            <div class="forms">
                <form>
                <div class="coluna_1">
                    <h1>CADASTRO DE PRODUTO</h1>
                    <label>
                        Nome:
                        <input type="text" required>
                    </label>
                    <label> Produto:
                        <select value="1">
                            <option value="">Selecione</option>
                            <option value="Oleo">Oleo</option>
                            <option value="Hidratante">Hidratante</option>
                            <option value="Sabonete">Sabonete</option>
                        </select>
                    </label>
                    <label>
                        Beneficios:
                        <textarea type="text" required></textarea>
                    </label>
                </div>
                <div class="coluna_2">
                    <label>
                        Descricao:
                        <textarea type="text" required></textarea>
                    </label>
                    <label>
                        Foto:
                        <input type="file" required>
                    </label>
                    <input type="submit" value="Criar" class="btn-criar"/>
                    <div class="links">
                        <a href="../produtos/index.php">Voltar</a>
                    </div>
                </div>    
                </form>
            </div>
           
        </div>

    </body>
</html>