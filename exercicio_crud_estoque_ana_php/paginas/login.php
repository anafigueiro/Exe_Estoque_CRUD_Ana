<?php

include "../BD.class.php";

$conn= new BD();

if(!empty($_POST)){
    session_start();

    $usuario= $conn-> login($_POST);

    if(
        $_POST["login"] == $usuario->login &&
        $_POST["senha"] == $usuario->senha

    ){
        $_SESSION["login"] = $_POST['login'];
        $_SESSION["senha"] = $_POST['senha'];

        header("location: main.php");
    }

} else{

    header("location: login.php?msg=Erro");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Sistema Acadêmico</h3>
    <form action="login.php" method="post">
        <label> Login </label>
        <input type="text" name="login" />
        <label> Senha </label>
        <input type="password" name="senha" />
        <button type="submit" name="login"> Logar</button>
    
</body>
</html>