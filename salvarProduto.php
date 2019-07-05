<?php
 include_once ("conexao.php");

  $nome_Produto = $_POST['nomeProduto'];
  $descricao_Produto = $_POST['descProduto'];
  $quantidade_Produto = $_POST['quantidade']; 
  $categoria_Produto = $_POST['categoria'];
  $preco_Produto = $_POST['precoProduto'];
  $imagem_Produto = $_POST['imgProduto'];

$query= $conexao ->prepare('INSERT INTO produto  (nome_produto,descricao,quantidade,categoria_produto,preco,imagen_produto)
VALUES ("'.$nome_Produto.'","'.$descricao_Produto.'",'.$quantidade_Produto.',"'.$categoria_Produto.'",'.$preco_Produto.',
        "'.$imagem_Produto.'") 

');


$resultado = $query->execute();

if ($resultado) {
    echo $resultado;
    echo " Deu tudo certo!";
} else {
    echo $resultado;
    echo "Deu tudo errado";
}
