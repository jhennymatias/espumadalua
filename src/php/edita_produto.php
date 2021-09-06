<?php   

include_once("../services/connection.php");

function edita($conn, $nome, $id, $tipo_produto, $descricao, $beneficios, $link_shopee, $preco, $foto) {
    if ($foto){
        $query = $conn->query("UPDATE produto 
        SET 
        nome='$nome',
        descricao='$descricao',
        beneficio='$beneficios',
        foto='$foto',
        tipo_produto=$tipo_produto,
        link_shopee='$link_shopee',
        preco='$preco' 
        WHERE `cod_produto`=$id");
    }else{
        $query = $conn->query("UPDATE produto 
        SET 
        nome='$nome',
        descricao='$descricao',
        beneficio='$beneficios',
        tipo_produto=$tipo_produto,
        link_shopee='$link_shopee',
        preco='$preco' 
        WHERE `cod_produto`=$id");
    }
   
    if(!$query) {
        throw new Exception('Erro ao editar');
    }else{
        return true;
    }
}

function gravar_arquivo($file){
    $location = "../images/";

    if (isset($_FILES['file'])) {
        $name = $file['name'];
        $tmp_name = $file['tmp_name'];
    
        $error = $file['error'];
        if ($error !== UPLOAD_ERR_OK) {
            echo 'Erro ao fazer o upload:', $error;
        } elseif (move_uploaded_file($tmp_name, $location . $name)) {
            echo("Upload da foto ok!");
        }
    } else {
        echo 'Selecione um arquivo para fazer upload';
        header('Location: ../pages/new-product/index.php?mensagem=Falha no upload do arquivo');
    }
}

try{
    $conn = connect();   
    
    $file = $_FILES['file'];
    var_dump($file['name']);
    
    $id =  htmlspecialchars($_GET["id"], ENT_QUOTES, 'UTF-8');
    $nome = htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8');
    $tipo_produto = htmlspecialchars($_POST["tipo_produto"], ENT_QUOTES, 'UTF-8');
    $descricao = htmlspecialchars($_POST["descricao"], ENT_QUOTES, 'UTF-8');
    $descricao = nl2br($descricao);
    
    $beneficios = htmlspecialchars($_POST["beneficios"], ENT_QUOTES, 'UTF-8');
    $beneficios = nl2br($beneficios);
    $link_shopee =  htmlspecialchars($_POST["link_shopee"], ENT_QUOTES, 'UTF-8');
    $preco =  htmlspecialchars($_POST["preco"], ENT_QUOTES, 'UTF-8');
    
    if($file['name']){
        $foto = "../../images/" . $file['name'];
        gravar_arquivo($file);
        edita($conn, $nome, $id, $tipo_produto, $descricao, $beneficios, $link_shopee, $preco, $foto ); 
    }else{
        edita($conn, $nome, $id, $tipo_produto, $descricao, $beneficios, $link_shopee, $preco, null); 
    }
    
    $conn->close();    
    header('Location: ../pages/lista-produto/index.php');
}catch(Exception $e) {
    echo($e->getMessage());
    header('Location: ../pages/edita-produto/index.php?id='.$id.'&message='.$e->getMessage());
}

?>
