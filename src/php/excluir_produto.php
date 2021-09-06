<?php   

include_once("../services/connection.php");

function delete($conn, $id) {
    
    $query = $conn->query( "delete from produto where cod_produto =$id");
    if($query == 0 ) {
        throw new Exception('Erro ao cadastrar');
    }else{
        return true;
    }
}

try{
    $conn = connect();        
    $id = $_GET["id"];
    delete($conn, $id); 
    $conn->close();    
    header('Location: ../pages/lista-produto');
}catch(Exception $e) {
    echo("<p>($e->getMessage())</p>");
    header('Location: ../pages/lista-produtos/index.php?mensagem=Erro ao cadastrar');
}

?>
