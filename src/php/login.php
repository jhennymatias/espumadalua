<?php   

include_once("../services/connection.php");

function queryClient($conn, $login, $senha) {

    $query = $conn->query( "SELECT * FROM usuario WHERE email='$login'");
    $data = $query->fetch_assoc();
    if(!count($data)) {
        throw new Exception('Erro ao realizar login');
    }else{
        if(crypt($senha, ($data['senha'])) == $data['senha']){
            return $data;
        }else{
            throw new Exception('Senha Inválida');
        }
        
    }
}

echo($criptografada);
    

try{
    $conn = connect();        
    $login = $_POST["email"];
    $senha = $_POST["senha"];
    $usuario = array_reverse(queryClient($conn, $login, $senha)); 
    $conn->close();    
    header('Location: ../pages/produtos/index.php?id=1');
}catch(Exception $e) {
    echo("<p>($e->getMessage())</p>");
    header('Location: ../pages/login/index.php?mensagem=Informações incorretas');
}




?>
