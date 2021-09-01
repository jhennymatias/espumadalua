<?php   

include_once("../services/connection.php");

function queryCadastro($conn, $nome, $genero, $email, $senha) {
    
    $criptografada = crypt($senha);
    $query = $conn->query( "INSERT INTO `usuario` (`cod_usuario`, `nome`, `contato`, `email`, `senha`, `hash`, `tipo_usuario`, `genero`)
                                        VALUES (NULL, '$nome', '(48)99134-0393', '$email', '$criptografada', '123', '2', '$genero');");
    if($query == 0 ) {
        throw new Exception('Erro ao cadastrar');
    }else{
        return true;
    }
}

try{
    $conn = connect();        
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    queryCadastro($conn, $nome, $genero, $email, $senha); 
    $conn->close();    
    header('Location: ../pages/produtos/index.php');
}catch(Exception $e) {
    echo("<p>($e->getMessage())</p>");
    header('Location: ../pages/create/index.php?mensagem=Erro ao cadastrar');
}

?>
