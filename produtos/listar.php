<?php

header("Pragma: no-cache");

$arrAcesso = array("Produtos");

require_once( "../includes/conexao.php" );
include "../interface/header.inc.php";

$activeLs = "active";
$activePr = "active";

?>

<body role="document" onload="listaProdutos('todos',0)"> 

<?php include "../interface/menu_adm.php"; ?>

<div id="mask"></div>
<div class="container theme-showcase" role="main">
  <div class="row">
    <div class="col-lg-12">
      <h3><?php echo $arrAcesso[0]; ?></h3>
      <div class="row">        
        <div class="col-lg-4 text-left">
        </div>
        <div class="col-lg-4 text-left">
          <div class="panel-body">  
          </div>
        </div>
        <div class="col-lg-4 text-right">
          <div class="panel-body panel-body-buttons">
            <br>    
              <input type='button' name='btnCadastrar' VALUE="Novo produto" class="btn btn-success" onClick="cadastrar()">
          </div>
        </div>
      </div>
         <div class="table-responsive">
            <table class="table table-striped">              
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ação</th>
                 </tr>
              </thead>
              <tbody id="listaProdutos"></tbody>        
            </table>
         </div>
         <div class="row">      
         </div>
      </div>
   </div>
</div>
<?php include "../interface/footer.inc.php";?>
<script src="../js/produtos.js"></script>