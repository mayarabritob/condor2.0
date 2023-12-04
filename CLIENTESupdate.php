<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];

        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sqlUpdate = "UPDATE hospedes SET cpf='$cpf', nome='$nome', email='$email', telefone='$telefone'
        WHERE idhospedes='$id'";

        $result = $conexao->exec($sqlUpdate);

    }
    header('Location: clientes.php');
    
?>