<?php
 include '../BD.class.php';
 $conn = new BD();

 if(!empty($_POST)){
    try {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['nome_produto'])) {  
            throw new Exception(" Somente letras e espaços em branco são permitidos. ");
        }
        
        if(empty($_POST['id'])){
          $conn->inserir($_POST);
        } else {
          $conn->atualizar($_POST);
        }
        header("location: ProdutoList.php");

    } catch (Exception $e){
        $id = $_POST['id'];
        header("location: ProdutoForm.php?id=$id&erro=".$e->getMessage());
    }
 }
 if(!empty($_GET['id'])){
   $data = $conn->buscar($_GET['id']);
   //var_dump($data);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
</head>
<body>
    <form action="ProdutoForm.php" method="post">
        <h3> Formulário Cadastro de Produto</h3>
        <?php echo(!empty($_GET["erro"])? $_GET["erro"]:"") ?><br>
        <input type="hidden" name="id" value="<?php echo(!empty($data->id) ? $data->id:"")?>" />
        
        <label for="">Produto</label>
        <input type="text" name="nome_produto" value="<?php echo(!empty($data->nome_produto) ? $data->nome_produto : "" ) ?>"><br>

        <label for="">Preço</label>
        <input type="text" name="preco" value="<?php echo(!empty($data->preco) ? $data->preco : "" ) ?>"><br>

        <label for="">Quantidade</label>
        <input type="text" name="quantidade" value="<?php echo(!empty($data->quantidade) ? $data->quantidade : "" ) ?>"><br>

        <button type="submit"><?php echo(empty($_GET['id'])?"Salvar":"Atualizar")?></button><br>
        <a href="ProdutoList.php">Voltar</a><br><br>
    </form>
</body>
</html>