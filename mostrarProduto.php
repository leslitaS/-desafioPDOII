<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>MOSTRAR PRODUTO</title>
  
</head>

<body>
    
<div class="container">
        <div class="row">

            <div class="col-xs-12">
                        <a href="index.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                            Voltar para lista de produtos
                        </a>
            </div>
            

            <?php
                      
                require("conexao.php");
                $id = $_GET['id'] ;
                var_dump ("iddddd" , $id ) ;
                $sql = 'SELECT * from produto, categoria where categoria_produto = categoria_id and produto_id =' .$id; 
                $query = $conexao->prepare( $sql);
                $result = $query->execute();
                $rows = $query->fetchAll(\PDO::FETCH_OBJ);
                foreach ($rows as $row) {                    
                ?>
                    <div class="col-md-6 col-xs-12">
                        <br>
                         <img class="img-responsive" src="<?php $row->imagen_produto; ?>" alt="450px" width="550px">
                     </div>
                      <hr>
                    <div class="col-md-6 col-xs-12">
                        <h3>nome Produto: </h3>
                        <h3><?php $row->nome_produto; ?></h3>
                        <h3>Categoria: </h3>
                        <p> <?php print($row->nome_categoria); ?> </p>  
                        <h3>Descrição:</h3>
                        <p><?php print($row->descricao);?></p>
                        
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h3>Quantidade em estoque:</h3>
                                <p><?php print($row->quantidade);?></p>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <h3>Preço:</h3>
                                <p>R$<?php print($row->preco);?></p>
                            </div>
                    </div>


                 <?php
                }  
            ?>
           
                   
            </div>
        </div>

    </div>
 </div>
</body>
</html>