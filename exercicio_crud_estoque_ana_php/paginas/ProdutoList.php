<?php
    include "../BD.class.php";

    $conn = new BD();
    $load = $conn->select();

    if(!empty($_GET['id'])){
        $conn->deletar($_GET['id']);
        header("location: ProdutoList.php");
    }

    if(!empty($_POST)){
        $load = $conn->pesquisar($_POST);
    } else {
        $load = $conn->select();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>

<form action="ProdutoList.php" method="post">
    <label> Campo </label>
    <select name="campo">
        <option value="nome_produto"> Nome </option>
        <option value="preco"> Preco </option>
        <option value="quantidade"> Preco </option>
    </select>
    <label> Valor </label>
    <input type="text" name="valor" />
    <button type="submit"> Buscar </button>

</form>
    <a href="ProdutoForm.php">Cadastrar novo produto</a><br><br>
<table border="1">
    <tr>
        <th>Nome produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        foreach($load as $item){
            echo "<tr>";
                echo "<td>".$item->nome_produto."</td>";
                echo "<td>".$item->preco."</td>";
                echo "<td>".$item->quantidade."</td>";
                 echo "<td><a href='ProdutoForm.php?id=$item->id'> Editar </a></td>";
                echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='ProdutoList.php?id=$item->id'> Deletar </a></td>";
            echo "<tr>";
        }
    ?>
</table>
</body>
</html>