<?php

    include_once('config.php');

    if(isset($_POST['excluir']))
    {
        $id = $_POST['id'];

        $sqlUpdate = "DELETE FROM hospedes WHERE idhospedes = '$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: clientes.php')
    
?>