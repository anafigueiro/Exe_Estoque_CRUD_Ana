<?php
if(!empty($_POST)){

} elseif(!empty($_GET["sair"])){

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