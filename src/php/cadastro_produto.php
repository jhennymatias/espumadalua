<?php   

include_once("../services/connection.php");

function queryCadastro($conn, $nome, $tipo_produto, $descricao, $beneficios, $link_shopee, $preco, $foto) {
    
    $query = $conn->query( "INSERT INTO `produto` (`cod_produto`, `nome`, `descricao`, `beneficio`, `foto`, `tipo_produto`, `link_shopee`, `preco`)
                                        VALUES (NULL, '$nome', '$descricao', '$beneficios', '$foto', $tipo_produto, '$link_shopee', '$preco');");
    if($query == 0 ) {
        throw new Exception('Erro ao cadastrar');
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
    $foto = "../../images/" . $file['name'];
    gravar_arquivo($file);

    $nome = htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8');
    $tipo_produto = htmlspecialchars($_POST["tipo_produto"], ENT_QUOTES, 'UTF-8');
    $descricao = htmlspecialchars($_POST["descricao"], ENT_QUOTES, 'UTF-8');
    $descricao = nl2br($descricao);
    
    $beneficios = htmlspecialchars($_POST["beneficios"], ENT_QUOTES, 'UTF-8');
    $beneficios = nl2br($beneficios);
    $link_shopee =  htmlspecialchars($_POST["link_shopee"], ENT_QUOTES, 'UTF-8');
    $preco =  htmlspecialchars($_POST["preco"], ENT_QUOTES, 'UTF-8');
   
    queryCadastro($conn, $nome, $tipo_produto, $descricao, $beneficios, $link_shopee, $preco, $foto ); 
    $conn->close();    
    header('Location: ../pages/admin/index.php');
}catch(Exception $e) {
    echo("<p>($e->getMessage())</p>");
    header('Location: ../pages/new-product/index.php?mensagem=Erro ao cadastrar');
}

?>
