<?php

header("Pragma: no-cache");

require_once( "../includes/conexao.php" );

if($_GET["id"]) {
    
    $intIdProduto = $_GET["id"];
    $strTituloPagina = "Editar Produto";

    if ($sql = $mysqli->prepare("SELECT * FROM `produtos` WHERE `id` = ?")) {

        $sql->bind_param('i', $intIdProduto); 
        $sql->execute();
        $sql->bind_result($id, $nome, $descricao, $qtd, $preco, $criado, $alterado);

        while ($sql->fetch()) {

            $Nome = $nome;
            $Descricao = $descricao;
            $Preco = $preco;
            $Qtd = $qtd;

        }    

    }

    $sql->close();
    $mysqli->close();

} else {

    $strTituloPagina = "Cadastrar Produto";
    $activeCd = "active";    
}

$activePr = "active";

include "../interface/header.inc.php";
include "../interface/menu_adm.php";

?>

<body role="document"> 

<div id="mask"></div>
<div id="mensagem" class="mensagem"></div>
<div class="container container-form theme-showcase" role="main">
    <div class="row">
        <div class="col-lg-12">
          <h3><?php echo $strTituloPagina; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">              
          	<form class="alterar-senha" role="form" name="frmProdutos" id="frmProdutos" action="" method="POST">
                <input type="hidden" name="intIdProduto" id="intIdProduto" value="<?php echo $intIdProduto; ?>">  
                              
                <div class="form-group">
                    <label class="control-label" for="txtNome">Nome</label>
                    <input class="form-control" id="txtNome" type="text" required name="txtNome" value="<?php echo !empty($Nome)?$Nome:''; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="txtDescricao">Descrição</label>
                    <textarea class="form-control" id="txtDescricao" type="email" required name="txtDescricao"><?php echo !empty($Descricao)?$Descricao:''; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="txtQtd">Quantidade</label>
                    <input class="form-control" id="txtQtd" type="text" required name="txtQtd" value="<?php echo !empty($Qtd)?$Qtd:''; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="txtPreco">Preço</label>
                    <input class="form-control" id="txtPreco" type="text" required name="txtPreco" value="<?php echo !empty($preco)?number_format($preco, 2, ',', ''):''; ?>">
                </div> 
                
                <div class="form-group btn-alterar">
                    <button type="submit" class="btn btn-success">Salvar</button>                 
                </div>                
            </form>       
        </div>
    </div>
</div>
<?php include "../interface/footer.inc.php";?>
<script src="../js/produtos.js"></script>
