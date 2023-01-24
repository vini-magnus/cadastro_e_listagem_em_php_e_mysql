<?php
session_start();
ob_start();

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

<h1>Cadastrar Usuário</h1>

<?php

require './Conn.php';
require './User.php';

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($formData['SendAddUser'])){
   
    $createUser = new User();

    //passando os dados da variável para o atributo da classe User 
    $createUser->formData = $formData;

    //estanciando o método create
    $value = $createUser->create();

    if($value){
        $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso!</p>";
        header("Location: index.php");
    } else{
        echo "<p style='color: red'>Erro: Usuário não cadastrado!</p>";
    }
}


?>

<form name="CreateUser" method="POST" action="">

<label>Nome:</label>
<input type="text" name="name" placeholder="Nome completo" required /><br><br>

<label>E-mail:</label>
<input type="email" name="email" placeholder="Seu e-mail" required /><br><br>
    
<input type="submit" value="Cadastrar" name="SendAddUser">
</form>

</body>
</html>