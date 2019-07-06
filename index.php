
<?php
   include_once ("conexao.php");
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Produto</title>

</head>
<body class="body">
    <?php
    include_once ("conexao.php");
    ?>
    <div class="col-12 box3 d-flex">

        <div  class="col-6 box31">

            <h2> Todos os Produtos</h2> <br>
           
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço R$</th>
                        </tr>
                        <?php
                        
                        require("conexao.php");
                         
                        $sql = 'SELECT * from produto, categoria where categoria_produto = categoria_id '; 
                        $query = $conexao->prepare( $sql);
                        $result = $query->execute();
                        $rows = $query->fetchAll(\PDO::FETCH_OBJ);
                        foreach ($rows as $row) {
                            ?>

                            <tr>  
                            <td><a href='mostrarProduto.php?id= <?php print($row->produto_id); ?> '>  <?php print($row->nome_produto); ?> </a></td>
                            <td><?php print($row->nome_categoria); ?> </td>
                            <td>R$ <?php print($row->preco); ?> </td>
                            </tr>
                            <?php
                         } 
                        ?>
                        
                    </table>
               
               
        </div>

        <div  class="col-6 box32">
            <form action="salvarProduto.php" method="post" enctype="multipart/form-data">
                <h1>Cadastrar Produto</h1>
                <div class="form-group">
                    <label for="nomeProduto"> Nome do Produto</label>
                    <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto" name="nomeProduto">                   
                </div>
                <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria" class="form-control" >
                            <option disabled selected>Escolha a Categoria:</option>

                             <?php
                                require("conexao.php");
                                $sql = 'SELECT categoria_id, nome_categoria FROM categoria'; 
                                $query = $conexao->prepare( $sql);
                                $result = $query->execute();
                                $rows = $query->fetchAll(\PDO::FETCH_OBJ);
                                foreach ($rows as $row) {
                                    ?>
                                    <option value="<?php print($row->categoria_id); ?>"> <?php print($row->nome_categoria); ?></option>
                                    <?php
                                }
                            ?>
                                                                             
                        </select>
                </div>

               

                <div class="form-group">
                    <label for="descProduto"> Descrição do Produto</label>
                    <textarea class="form-control" name="descProduto" id="descProduto"></textarea>
                </div>
                <div class="form-group">
                    <label for="precoProduto">Preço do Produto</label>
                    <input type="number" step="any" class="form-control" id="precoProduto" placeholder="Preço do Produto" name="precoProduto">
                </div>

            
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" step="any" class="form-control" id="quantidade" placeholder="Quantidade em Estoque" name="quantidade">
                </div>

                <div class="form-group">
                    <label for="imgProduto"> Imagem do Produto</label>
                <input type ="file" name="imgProduto" id ="imgProduto">
                </div>

                                             
                
                <button class="btn btn-success" type="submit"> Enviar </button>

            </form>
            
        </div>

    
    <div>
       
    
    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>