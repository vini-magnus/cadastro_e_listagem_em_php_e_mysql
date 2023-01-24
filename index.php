<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Banco Dados</title>
</head>
<body>
    
<a href="./index.php">Listar</a><br>
<a href="./create.php">Cadastrar</a><br><br>

<h1>Listar Usuarios</h1>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

require './Conn.php';
require './User.php';

$listUsers = new User();

//estancia o método list() e atribui o valor deste método a variável $result_usuarios
$result_usuarios = $listUsers->list();


//para ler o valor usa-se o laço de repetição foreach para ler o arra, para que toda vez  que passar dentro do laço imprimir um único usuário
foreach($result_usuarios as $row_usuarios){
    
    extract($row_usuarios);

    // echo "ID: " . $row_usuarios['id'] . "<br>";
    echo "ID: $id <br>";

    //echo "Nome: " . $row_usuarios['nome'] . "<br>";
    echo "Nome: $name <br>";

    //echo "Email: " . $row_usuarios['email'] . "<br>";
    echo "Email: $email <br>";

    echo "<hr>";
}




?>


</body>
</html>