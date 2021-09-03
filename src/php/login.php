<?php   
include_once("../services/connection.php");
session_start();

function queryClient($conn, $login, $senha) {

    $query = $conn->query( "SELECT * FROM usuario WHERE email='$login'");
    $data = $query->fetch_assoc();
    if(!count($data)) {
        throw new Exception('Erro ao realizar login');
    }else{
        if(crypt($senha, ($data['senha'])) == $data['senha']){
            $_SESSION['cod_usuario'] = $data['cod_usuario'];
            $_SESSION['nome_usuario'] = $data['nome']; 
            $_SESSION['tipo_usuario']  = $data['tipo_usuario'];
            echo($_SESSION['tipo_usuario']);
            if($_SESSION['tipo_usuario'] == 1){
                header('Location: ../pages/admin/index.php');
            }
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
