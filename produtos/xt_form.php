<?php

header("Pragma: no-cache");

require_once( "../includes/conexao.php" );

$intIdProduto = $_POST["intIdProduto"];
$strNome      = $_POST["txtNome"];
$strDescricao = $_POST["txtDescricao"];
$strQtd       = $_POST["txtQtd"];
$strPreco     = $_POST["txtPreco"];
$strData      = date('Y-m-d h:m:s');

if($intIdProduto) {

    if(!$sql = $mysqli->prepare("UPDATE produtos SET nome=?, descricao=?, qtd=?, preco=?, alterado=? WHERE id=?")){
        echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if(!$sql->bind_param('sssdsi', $strNome, $strDescricao, $strQtd, $strPreco, $strData, $intIdProduto)) {
        echo "Falha no bind_param: (" . $stmt->errno . ") " . $stmt->error;
    } 

    if(!$sql->execute()){
        echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        echo '1'; 
    }

} else {

    if(!$sql = $mysqli->prepare("INSERT INTO produtos (nome, descricao, qtd, preco, criado) VALUES (?,?,?,?,?)")){
        echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if(!$sql->bind_param('sssds', $strNome, $strDescricao, $strQtd, $strPreco, $strData)) {
        echo "Falha no bind_param: (" . $stmt->errno . ") " . $stmt->error;
    } 

    if(!$sql->execute()){
        echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        echo '2'; 
    }

}

$sql->close();
$mysqli->close();

?>