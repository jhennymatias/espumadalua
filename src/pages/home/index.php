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
        <div class="container-home">
            <div class="header">
                <nav class="menu">
                    <img src="../../assets/logo.png" class="logo"/>
                    <div class="itens">
                        <a href="#historia">HISTORIA</a>
                        <a href="#time">TIME</a>
                        <a href="#contato">CONTATO</a>
                        <a href='../login/index.php'>LOGIN</a>
                    </div>
                </nav>
                <img src="../../assets/capa.png" class="capa"/>
            </div>
        
            <div id="historia">
                <div class="content-historia">
                    <h1>Nossa História</h1>
                    <p>A Espuma da Lua surgiu no ano de 2021 pela necessidade de uma renda extra de sua fundadora.  
                    </p>

                    <div class="imagens">
                        <img src="../../assets/historia.png" class="capa"/>
                        <img src="../../assets/historia.png" class="capa"/>
                        <img src="../../assets/historia.png" class="capa"/>
                        <img src="../../assets/historia.png" class="capa"/>
                        <img src="../../assets/historia.png" class="capa"/>
                    </div>
                </div>
            </div>

            <div id="time" class="team">
                <div class="content-time">
                    <h1>Conheça nosso time</h1>
                    <div class="imagens">
                            <div class="imagem-nome">
                                <img src="../../assets/manu.jpg" class="capa"/>
                                <p>Emanuela Giusti</p>
                            </div>  
                            <div class="imagem-nome">
                                <img src="../../assets/lua.jpg" class="capa"/>
                                <p> Lua </p>
                            </div>  
                
                            
                    </div>
                </div>
            </div>
            
            <div id="contato">
                <img src="../../assets/logo-completa.png" class="capa"/>
                <form>
                    <label> 
                        Nome:
                        <input type="text" >
                    </label>
                    <label>
                        Email:
                        <input type="email" required>
                    </label>
                    <label>
                        Telefone
                        <input type="text">
                    </label>
                    <label>
                        Mensagem:
                        <textarea required></textarea>
                    </label>
                    <input type="submit" value="Enviar" class="btn-enviar"/>
                </form>
            </div>

            
        <footer>
            Desenvolvido por Jhennifer Matias
        </footer>
        </div>

    </body>
</html>