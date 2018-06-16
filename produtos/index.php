<?php

header("Pragma: no-cache");

require_once( "../includes/conexao.php" );
include "../interface/header.inc.php";

$activeHm = "active";

?>

<body role="document"> 

<?php include "../interface/menu_adm.php"; ?>

<div class="container theme-showcase" role="main">
    <div class="container">
        <div class="col-lg-12">
            <h4>Produtos com estoque baixo</h4>
            <div class="row">        
                <div class="col-lg-4 text-left"></div>
                <div class="col-lg-4 text-left">
                    <div class="panel-body"></div>
                </div>
                <div class="col-lg-4 text-right"></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">              
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>

                        <?php 

                            $paramentro = 3;

                            if ($sql = $mysqli->prepare("SELECT * FROM produtos WHERE qtd <= ? ORDER BY qtd ASC")) {

                                $sql->bind_param('i', $paramentro); 
                                $sql->execute();
                                $sql->bind_result($id, $nome, $descricao, $qtd, $preco, $criado, $alterado);

                        ?> 
                    <tbody>
                        <?php                          

                            while ($sql->fetch()) {

                                echo '<tr id="">';
                                echo '<td>'.$id.'</td>';
                                echo '<td>'.$nome.'</td>';
                                echo '<td>'.$qtd.'</td>';                             
                              
                            } 

                            $sql->close();                                             
                              
                        }  ?>
 
                    </tbody>        
                </table>
            </div>
            <div class="row"></div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <h4>Produtos alterados recentemente</h4>
            <div class="row">        
                <div class="col-lg-4 text-left"></div>
                <div class="col-lg-4 text-left">
                    <div class="panel-body"></div>
                </div>
                <div class="col-lg-4 text-right"></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">              
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>

                        <?php 

                            $paramentro2 = '0000-00-00 00:00:00';

                            if ($sql2 = $mysqli->prepare("SELECT * FROM produtos WHERE alterado <> ? ORDER BY alterado DESC LIMIT 0,5")) {

                                $sql2->bind_param('s', $paramentro2); 
                                $sql2->execute();
                                $sql2->bind_result($id2, $nome2, $descricao2, $qtd2, $preco2, $criado2, $alterado2);

                        ?> 
                    <tbody>
                        <?php                          

                            while ($sql2->fetch()) {

                                echo '<tr id="">';
                                echo '<td>'.$id2.'</td>';
                                echo '<td>'.$nome2.'</td>';
                                echo '<td>'.$qtd2.'</td>';                              
                              
                            } 

                            $sql2->close();
                            $mysqli->close();                                               
                              
                        }  ?>
 
                    </tbody>        
                </table>
            </div>
            <div class="row"></div>
        </div>
    </div>
</div>
<?php include "../interface/footer.inc.php";?>
<script src="../js/produtos.js"></script>