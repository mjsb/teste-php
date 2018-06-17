<?php

header("Pragma: no-cache");

require_once( "../includes/conexao.php" );

$strAcao = $_POST["acao"];
$intId   = $_POST["id"];
$strData = date('Y-m-d h:m:s');
$result  = "";
$id      = 0;

if($_REQUEST["acao"]) {


    if($strAcao == "reduzir") {

        if(!$sql = $mysqli->prepare("UPDATE produtos SET qtd=qtd-1, alterado=? WHERE id=?")){
            echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if(!$sql->bind_param('si',$strData , $intId)) {
            echo "Falha no bind_param: (" . $stmt->errno . ") " . $stmt->error;
        } 

        if(!$sql->execute()){
            echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
        } 

    } 

    if($strAcao == "aumentar") {

        if(!$sql = $mysqli->prepare("UPDATE produtos SET qtd=qtd+1, alterado=? WHERE id=?")){
            echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if(!$sql->bind_param('si',$strData , $intId)) {
            echo "Falha no bind_param: (" . $stmt->errno . ") " . $stmt->error;
        } 

        if(!$sql->execute()){
            echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
        } 

    }

    if($strAcao == "excluir") {

        if(!$sql = $mysqli->prepare("DELETE FROM produtos WHERE id=?")){
            echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if(!$sql->bind_param('i', $intId)) {
            echo "Falha no bind_param: (" . $stmt->errno . ") " . $stmt->error;
        } 

        if(!$sql->execute()){
            echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
        } 

    }

    if ($sql = $mysqli->prepare("SELECT * FROM produtos WHERE id > ? ORDER BY nome, preco ASC")) {

        $sql->bind_param('i', $id); 
        $sql->execute();
        $sql->bind_result($id, $nome, $descricao, $qtd, $preco, $criado, $alterado);

        while ($sql->fetch()) {

            if ($qtd <= 3) { $strClass = 'estoqueBaixo'; } else { $strClass = ""; }

            $result .= '<tr id="tr_'.$id.'" class="'.$strClass.'">';
            $result .= '<td>'.$id.'</td>';
            $result .= '<td>
                        <a href="#" onClick="openDetalhes('.$id.')">'.$nome.'</a>
                        <div id="modal'.$id.'" class="detalhes">
                            <div class="fechaModal">
                                <div id="fechaModal">Fechar X</div>
                            </div>
                            <p>'.$descricao.'</p>
                        </div>
                    </td>';

            $result .= '<td>'.$qtd.'</td>';
            $result .= '<td>'.number_format($preco, 2, ',', '').'</td>'; 
            $result .= '<td align="left" nowrap>
                  <a href="#" onClick="editar('.$id.')"> Editar </a> | 
                  <a href="#" onClick="excluir('.$id.')"> Excluir </a> | 
                  <a href="#" onClick="listaProdutos(`reduzir`,'.$id.')"> Reduzir Estoque</a> | 
                  <a href="#" onClick="listaProdutos(`aumentar`,'.$id.')"> Aumentar Estoque</a>
                </td>';                          
          
        } 

        echo $result;

    }

}

$sql->close();
$mysqli->close();

?>

<script type="text/javascript">
   
    $(document).ready(function () {

        $(".detalhes").click( function () {

            $(".detalhes").slideUp(400);
            $("#mask").slideUp(630);

        });

    });

</script>
