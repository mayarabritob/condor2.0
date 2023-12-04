<?php

    include_once('config.php');

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $sqlUpdate = "DELETE FROM planos WHERE id = '$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: planos.php')
    
?>